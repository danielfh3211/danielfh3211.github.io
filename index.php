<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naive Bayes Classifier</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            margin-top: auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .card-body {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1.25rem;
        }

        table {
            text-align: center;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
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

    <div class="container mb-5 mt-4">
        <h1 class="mb-4">Naive Bayes Classifier</h1>
        <p style="text-align: justify; font-size: 1.2em;">
            Naive Bayes classifier (NBC) adalah metode pembelajaran mesin yang memanfaatkan perhitungan
            probabilitas dan statistik yang dikemukakan oleh ilmuwan Inggris, Thomas Bayes. Metode ini
            memprediksi probabilitas masa depan berdasarkan pengalaman di masa lalu.
            Metode Naive Bayes sering diterapkan dalam bidang studi Teknik Informatika untuk menyelesaikan
            berbagai masalah yang berhubungan dengan database besar. Sistem kerja algoritma Naive Bayes
            classifier melakukan pengklasifikasian melalui dataset yang tertampung dalam sebuah database.
            Naive Bayes classifier juga dapat digunakan untuk memprediksi keputusan berdasarkan jumlah dataset
            yang dimiliki dalam database. Semakin banyak data yang digunakan, semakin akurat hasil prediksi
            menggunakan algoritma ini. Sumber <a href="https://id.wikipedia.org/wiki/Naive_Bayes_classifier">Wikipedia</a>.
        </p>
        <div class="card">
            <h2 class="card-header">Simulasi Probabilitas Pembelian Pelanggan di Showroom Mobil :</h2>
            <div class="card-body">
                <form method="post" action="index.php">
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-9">
                            <select id="gender" name="gender" class="form-control" style="max-width: 350px;">
                                <option value="" disabled selected hidden>Pilih Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Umur :</label>
                        <div class="col-sm-9">
                            <select id="age" name="age" class="form-control" style="max-width: 350px;">
                                <option value="" disabled selected hidden>Pilih Usia</option>
                                <option value="Dibawah 30 tahun">Dibawah 30 tahun</option>
                                <option value="30-40 tahun">30-40 tahun</option>
                                <option value="40-50 tahun">40-50 tahun</option>
                                <option value="Diatas 50 tahun">Diatas 50 tahun</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estimatedSalary" class="col-sm-3 col-form-label">Perkiraan Gaji :</label>
                        <div class="col-sm-9">
                            <select id="estimatedSalary" name="estimatedSalary" class="form-control" style="max-width: 350px;">
                                <option value="" disabled selected hidden>Pilih Gaji</option>
                                <option value="Rendah">Rendah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        // Memasukkan file perhitungan dan tampilan hasil
        include 'result.php';
        ?>

    </div> <!-- container -->

    <footer class="footer">
        <div class="container py-3">
            <span>Naive Bayes Classifier &copy; 2024 - Kelompok 3</span>
        </div>
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>