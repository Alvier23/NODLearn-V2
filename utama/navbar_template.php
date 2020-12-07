<?php

include 'koneksi.php';
// INSERT DATA KELAS
if (isset($_POST["submit"])) {
    $idkelas = $_POST["idkls"];
    $namakelas = $_POST["namakelas"];
    $deskrip = $_POST["deskripsi"];
    $kode_kelas = $_POST["kodekls"];
    $iduser = $_POST["iduser"];
    // kueri
    $kuerikelas = "INSERT INTO kelas VALUES ('$idkelas', '$namakelas', '$deskrip', '$kode_kelas', '$iduser')";
    // var_dump($kuerikelas);
    mysqli_query($konek, $kuerikelas);
    if (mysqli_affected_rows($konek) > 0) {
        echo "<script>
            alert('data berhasil di tambahkan');
            document.location.href = 'home.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal di tambahkan');
            document.location.href = 'home.php';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="home.php" class="navbar-brand">
                    <span class="brand-text font-weight-light">NODlearn</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kelas </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#buatModal">Buat Kelas </a></li>
                                <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#gabungModal">Gabung Kelas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hai, <?= $_SESSION['nama_user']; ?> </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="btn btn-warning">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <?php
        // membuat id kelas berurutan 
        // mengambil data terbesar
        $query = mysqli_query($konek, "SELECT max(id_kelas) as idTerbesar FROM kelas");
        $data = mysqli_fetch_array($query);
        $kode = $data['idTerbesar'];
        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kode, 3, 3);
        // nambah bilangan urutan
        $urutan++;
        // membentuk kode baru
        $huruf = "NOD";
        $kode = $huruf . sprintf("%03s", $urutan);

        // membuat kode acak
        $izin_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        function generate_str($masukin, $kuat = 10)
        {
            $masuk = strlen($masukin);
            $random_str = '';
            for ($i = 0; $i < $kuat; $i++) {
                $random_char = $masukin[mt_rand(0, $masuk - 1)];
                $random_str .= $random_char;
            }
            return $random_str;
        }
        $hasilacak = generate_str($izin_chars, 8);
        ?>

        <!-- Modal buat kelas-->
        <div class="modal fade bd-example-modal-lg" id="buatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat kelas baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="text" name="idkls" value="<?= $kode; ?>" hidden>
                            <input type="text" name="kodekls" value="<?= $hasilacak; ?>" hidden>
                            <input type="text" name="iduser" value="<?= $_SESSION['id']; ?>" hidden>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namakelas" placeholder="Nama Kelas" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Buat Kelas</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal gabung kelas -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="gabungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gabung Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode">Masukan Kode Kelas :</label>
                            <input type="text" class="form-control" name="kodekelas" id="kode" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Gabung</button>
                    </div>
                </div>
            </div>
        </div>