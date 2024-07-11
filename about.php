<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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

    <div class="container" style='margin-top:25px'>
        <div class="row">

            <div class="col-12 mt-5">
                <center>
                    <h2 class="tebal mb-5">Anggota Kelompok 3</h2>
                </center>
                <hr>

                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/img1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>Pipin Anjarwati</b><br>
                                    210103140
                                    <br><br>
                                    - Ketua -
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/img1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>Arif Budi Suryono</b><br>
                                    210103090
                                    <br><br>
                                    - Anggota 1 -
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/img1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>Daniel Ferdinand Hafith</b><br>
                                    210103211
                                    <br><br>
                                    - Anggota 2 -
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h3 class="text-center text-abu1 mt-4">'' <b>Bermimpilah besar</b> dan berani gagal. ''</h3>
            </div>
        </div>
    </div><!-- end container -->

    <footer class="footer">
        <div class="container py-3">
            <span>Naive Bayes Classifier &copy; 2024 - Kelompok 3</span>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>