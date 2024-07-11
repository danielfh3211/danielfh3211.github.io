<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gender = $_POST['gender'];
    $ageRange = $_POST['age'];
    $estimatedSalary = $_POST['estimatedSalary'];

    // Memasukkan file perhitungan
    include 'calculate.php';

    // Melakukan perhitungan
    $result = calculateNaiveBayes($gender, $ageRange, $estimatedSalary);

    $newData = $result['newData'];
    $posteriorYesData = $result['posteriorYesData'];
    $posteriorNoData = $result['posteriorNoData'];
    $count = $result['count'];
    $total = $result['total'];
    $prediction = $result['prediction'];

    $featureTranslation = [
        'Gender' => 'Jenis Kelamin',
        'Age' => 'Umur',
        'EstimatedSalary' => 'Perkiraan Gaji'
    ];

    echo '<div class="card mt-4">';
    echo '<h2 class="card-header">Hasil Prediksi :</h2>';
    echo '<div class="card-body">';
    echo '<div class="col-4">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-sm">';
    echo '<thead class="thead-light">';
    echo '<tr><th>Informasi Pelanggan</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($newData as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';

    echo '<h3>Data :</h3>';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light">';
    echo '<tr><th>Jumlah True</th><th>Jumlah False</th><th>Jumlah Total Data</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr><td>' . $count['yes'] . '</td><td>' . $count['no'] . '</td><td>' . $total . '</td></tr>';
    echo '</tbody>';
    echo '</table>';

    echo '<h3>Indikator Probabilitas :</h3>';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light">';
    echo '<tr><th>Fitur</th><th>True</th><th>False</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>pA</td>';
    echo '<td>' . $count['yes'] . ' / ' . $total . '</td>';
    echo '<td>' . $count['no'] . ' / ' . $total . '</td>';
    echo '</tr>';
    foreach ($newData as $feature => $value) {
        echo '<tr>';
        echo '<td>' . $featureTranslation[$feature] . '</td>';
        echo '<td>' . $posteriorYesData['indicators'][$feature] . '</td>';
        echo '<td>' . $posteriorNoData['indicators'][$feature] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo '<h3>Persentase :</h3>';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light">';
    echo '<tr><th></th><th>Persentase</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr><td>Persentase Pelanggan Membeli</td><td>' . $posteriorYesData['posterior'] . '</td></tr>';
    echo '<tr><td>Persentase Pelanggan Tidak Membeli</td><td>' . $posteriorNoData['posterior'] . '</td></tr>';
    echo '</tbody>';
    echo '</table>';

    $yesPercentage = round($posteriorYesData['posterior'] * 100, 2);
    $noPercentage = round($posteriorNoData['posterior'] * 100, 2);

    echo '<h3 class="mt-4">Kesimpulan :</h3>';
    echo '<p>Setelah melakukan perhitungan menggunakan Naive Bayes Classifier, berikut adalah rincian kesimpulan:</p>';
    echo '<p>Probabilitas pelanggan untuk membeli : ' . $yesPercentage . '%</p>';
    echo '<p>Probabilitas pelanggan untuk tidak membeli : ' . $noPercentage . '%</p>';

    if ($yesPercentage > $noPercentage) {
        echo '<p>Kesimpulan: Pelanggan diprediksi akan <span style="background-color: green; color: white; padding: 2px 5px; border-radius: 5px; display: inline-block;">Membeli</span> dengan layanan yang ada pada showroom mobil.</p>';
    } else {
        echo '<p>Kesimpulan: Pelanggan diprediksi akan <span style="background-color: red; color: white; padding: 2px 5px; border-radius: 5px; display: inline-block;">Tidak Membeli</span> dengan layanan yang ada pada showroom mobil.</p>';
    }

    echo '</div>'; // card-body
    echo '</div>'; // card
}
