<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background: url('image/school.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .container h4, .list-group-item a {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image/bgg.png" alt="Logo" class="me-2" style="height: 40px;">
                SMK Coding
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-daftar.php">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-siswa.php">Daftar Murid</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-5 bg-dark mx-5" style="margin-top: 80px;">
    <h3 class="animate__animated animate__fadeInDown">Pendaftaran Siswa Baru</h3>
    <h1 class="animate__animated animate__fadeInUp">SMK Coding</h1>
    <p class="animate__animated animate__fadeIn mt-3">Selamat datang di portal pendaftaran SMK Coding!</p>
    </header>


    <!-- Menu -->
    <div class="container text-center my-5">
        <h4 class="mb-4 animate__animated animate__fadeIn">Menu</h4>
        <nav>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent">
                    <a href="form-daftar.php" class="btn btn-success btn-lg animate__animated animate__zoomIn">Daftar Baru</a>
                </li>
                <li class="list-group-item bg-transparent mt-3">
                    <a href="list-siswa.php" class="btn btn-info btn-lg animate__animated animate__zoomIn">Pendaftar</a>
                </li>
            </ul>
        </nav>

        <!-- Status -->
        <?php if (isset($_GET['status'])): ?>
        <div class="alert mt-4 animate__animated animate__pulse <?= $_GET['status'] == 'sukses' ? 'alert-success' : 'alert-danger' ?>" role="alert">
            <?php
                if ($_GET['status'] == 'sukses') {
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
            ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
