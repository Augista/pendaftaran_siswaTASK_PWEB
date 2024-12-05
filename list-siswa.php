<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('image/school.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }
        table {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            color: white !important; 
        }
        tbody td {
            color: white !important;
        }
        .container h3 {
            color: white;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
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
                        <a class="nav-link active" href="list-siswa.php">Daftar Murid</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-5 bg-dark text-white" style="margin-top: 80px;">
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <nav class="mb-3">
            <a href="form-daftar.php" class="btn btn-custom">[+] Tambah Baru</a>
            <a href="pdf.php" class="btn btn-custom">Download PDF data siswa</a>
        </nav>

        <table class="table table-bordered table-striped text-white">
            <thead class="text-white">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);

                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
        
                    echo "<td><img src='image/".$siswa['foto']."' width=100 height=100 /></td>";
                    echo "<td>".$siswa['id']."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";
                    echo "<td>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<a href='hapus.php?id=".$siswa['id']."' class='btn btn-danger btn-sm'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p class="text-white bg-dark">Total Siswa Terdaftar : <?php echo mysqli_num_rows($query) ?> siswa</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
