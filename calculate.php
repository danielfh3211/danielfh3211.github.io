<?php
function calculateNaiveBayes($gender, $ageRange, $estimatedSalary)
{
    // Memuat data JSON dari file
    $jsonData = file_get_contents('data.json');
    if ($jsonData === false) {
        die('Gagal memuat data dari file data.json');
    }
    $data = json_decode($jsonData, true);

    // Mengubah umur ke dalam range
    function getAgeRange($age)
    {
        if ($age < 30) {
            return 'Dibawah 30 tahun';
        } elseif ($age >= 30 && $age <= 40) {
            return '30-40 tahun';
        } elseif ($age > 40 && $age <= 50) {
            return '40-50 tahun';
        } else {
            return 'Diatas 50 tahun';
        }
    }

    foreach ($data as &$row) {
        $row['Age'] = getAgeRange($row['Age']);
    }

    // Inisialisasi count
    $count = ['yes' => 0, 'no' => 0];
    $likelihood = [
        'yes' => ['Gender' => [], 'Age' => [], 'EstimatedSalary' => []],
        'no' => ['Gender' => [], 'Age' => [], 'EstimatedSalary' => []]
    ];

    // Hitung probabilitas prior dan likelihood
    foreach ($data as $row) {
        $satisfied = $row['Purchased'];
        if (!isset($count[$satisfied])) {
            $count[$satisfied] = 0;
        }
        $count[$satisfied]++;
        foreach (['Gender', 'Age', 'EstimatedSalary'] as $feature) {
            if (!isset($likelihood[$satisfied][$feature][$row[$feature]])) {
                $likelihood[$satisfied][$feature][$row[$feature]] = 0;
            }
            $likelihood[$satisfied][$feature][$row[$feature]]++;
        }
    }

    // Input data baru
    $newData = ['Gender' => $gender, 'Age' => $ageRange, 'EstimatedSalary' => $estimatedSalary];

    // Hitung probabilitas posterior
    function calculatePosterior($class, $newData, $count, $likelihood, $total)
    {
        $prior = $count[$class] / $total;
        $posterior = $prior;
        $indicators = [];
        foreach ($newData as $feature => $value) {
            $indicator = $likelihood[$class][$feature][$value] ?? 0;
            $posterior *= $indicator > 0 ? $indicator / $count[$class] : 0;
            $indicators[$feature] = $indicator . ' / ' . $count[$class];
        }
        return ['posterior' => $posterior, 'indicators' => $indicators];
    }

    $total = $count['yes'] + $count['no'];
    $posteriorYesData = calculatePosterior('yes', $newData, $count, $likelihood, $total);
    $posteriorNoData = calculatePosterior('no', $newData, $count, $likelihood, $total);

    // Hasil prediksi
    $prediction = $posteriorYesData['posterior'] > $posteriorNoData['posterior'] ? 'yes' : 'no';

    return [
        'newData' => $newData,
        'posteriorYesData' => $posteriorYesData,
        'posteriorNoData' => $posteriorNoData,
        'count' => $count,
        'total' => $total,
        'prediction' => $prediction
    ];
}
