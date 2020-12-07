<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../logerror.php");
    exit;
}
include 'koneksi.php';
include 'navbar_template.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelas Anda</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- menampilkan kelas berdasarkan id user -->
                <?php
                $userid = $_SESSION['id'];
                $result = mysqli_query($konek, "SELECT * FROM kelas, user WHERE id_user=$userid AND kelas.id_user=user.id ORDER BY id_kelas DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_kelas'];
                    $namakelas = $row['nama_kelas'];
                    // menampilkan tidaka lebih dari 35 huruf
                    $deskripsi = $row['deskripsi'];
                    if (strlen($deskripsi) > 50) {
                        $deskripsi = substr($deskripsi, 0, 35) . "...";
                    }
                    $namauser = $row['nama_user'];

                ?>
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline" style="width: 21rem;">
                            <div class="card-header">
                                <h5 class="card-title m-0" style="text-transform: uppercase; font-weight:bold"><?= $namakelas; ?></h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Guru : <?= $namauser; ?></h6>
                                <br><br>
                                <p class="card-text"><?= $deskripsi; ?></p>
                                <a href="#" class="btn btn-primary">Cek Kelas</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                <?php } ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script src="../assets/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>