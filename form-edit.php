<i?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
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
        .form-container {
            margin: 80px auto;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            max-width: 500px;
        }
        .form-container form {
            text-align: left;
        }
        label {
            font-weight: bold;
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
                        <a class="nav-link" href="list-siswa.php">Daftar Murid</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="text-center py-5 bg-dark text-white" style="margin-top: 65px;">
        <h3>Edit Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <div class="form-container">
        <form action="proses-edit.php" method="POST">
            
        <fieldset>
            <div class="mb-1">
                <label for="file">FOTO:</label>
                <img id="image-preview" src="" alt="Image Preview" width="150" height="150">
            </div>

        <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
                <div class="mb-2">
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['nama'] ?>" />
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat: </label>
                   <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
              </div>
                <div class="mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin: </label>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
                   <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
                </div>
                <div class="mb-3">
                    <label for="agama">Agama:</label>
                    <?php $agama = $siswa['agama']; ?>
                    <select name="agama">
                        <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                        <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                        <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                        <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sekolah_asal">Sekolah Asal:</label>
                    <input type="text" name="sekolah_asal" placeholder="nama sekolah" class="form-control" value="<?php echo $siswa['sekolah_asal'] ?>" />
                </div>
                <div class="mb-3 text-center">
                <input type="submit" value="Simpan" name="simpan" class="btn btn-primary"/>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const image = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        image.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    imagePreview.src = reader.result;
                    imagePreview.hidden = false;
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
