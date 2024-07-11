<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Latih</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            margin-top: auto;
        }

        .label-yes {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .label-no {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">Naive Bayes Classifier</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Perhitungan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data.php">Data Latih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Data Latih</h1>
        <p style="text-align: justify; font-size: 1.2em;">Berikut ini adalah data latih yang digunakan dalam simulasi prediksi pembelian pengunjung showroom mobil dengan
            metode Naive Bayes. Data ini diambil dari situs Kaggle dan dapat diakses melalui tautan berikut:
            <a href="https://www.kaggle.com/datasets/arishmam/sales-data">Sales Data on Kaggle</a>.
        </p>
        <?php
        // Memuat data JSON dari file
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true);

        // Menentukan jumlah data per halaman
        $perPage = 40;
        // Menentukan halaman saat ini
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        // Menghitung total halaman
        $totalPages = ceil(count($data) / $perPage);
        // Menghitung indeks awal dan akhir untuk data yang akan ditampilkan
        $startIndex = ($page - 1) * $perPage;
        $endIndex = $startIndex + $perPage - 1;

        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">';
        echo '<tr><th>User ID</th><th>Jenis Kelamin</th><th>Umur</th><th>Perkiraan Gaji</th><th>Pembelian</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        for ($i = $startIndex; $i <= $endIndex && $i < count($data); $i++) {
            echo '<tr>';
            foreach ($data[$i] as $key => $value) {
                if ($key === 'Age') {
                    echo '<td>' . $value . ' tahun</td>'; // Menambahkan "tahun" di sini
                } elseif ($key === 'Purchased') {
                    $class = $value === 'yes' ? 'label-yes' : 'label-no';
                    $label = $value === 'yes' ? 'Yes' : 'No';
                    echo '<td><span class="' . $class . '">' . $label . '</span></td>';
                } else {
                    echo '<td>' . $value . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        // Menampilkan navigasi halaman jika lebih dari satu halaman
        if ($totalPages > 1) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';
            for ($p = 1; $p <= $totalPages; $p++) {
                echo '<li class="page-item ' . ($page == $p ? 'active' : '') . '"><a class="page-link" href="?page=' . $p . '">' . $p . '</a></li>';
            }
            echo '</ul>';
            echo '</nav>';
        }
        ?>
    </div> <!-- container -->

    <footer class="footer">
        <div class="container py-3">
            <span>Naive Bayes Classifier &copy; 2024 - Kelompok 3</span>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>