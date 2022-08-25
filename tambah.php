<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "balita";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$NIK = "";
$nama_balita = "";
$tempat_lahir = "";
$jenis_kelamin = "";
$alamat = "";
$ortu = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $NIK     = $_GET['NIK'];
    $sql1    = "select * from databalita where NIK = '$NIK'"; 
    $q1      = mysqli_query($koneksi, $sql1);
    $r1      = mysqli_fetch_array($q1);
    $NIK =              $r1['NIK'];
    $nama_balita =      $r1['nama_balita'];
    $tempat_lahir =     $r1['tempat_lahir'];
    $jenis_kelamin =    $r1['jenis_kelamin'];
    $alamat =           $r1['alamat'];
    $ortu =             $r1['ortu'];

    if ($NIK = '') {
        $error = "Data tidak di temukan";
    }
}

if(isset($_POST['simpan'])){
    $NIK = $_POST['NIK'];
    $nama_balita = $_POST['nama_balita'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $ortu = $_POST['ortu'];

    if($NIK && $nama_balita && $tempat_lahir && $jenis_kelamin && $alamat && $ortu){
        if ($op == 'edit') {
            $sql1 = "Update databalita set NIK = '$NIK', nama_balita = '$nama_balita', tempat_lahir = '$tempat_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', ortu = '$ortu'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil di update";
            } else {
                $error = "Data gagal di update";
            }
        } else {
            $sql1 = "insert into databalita(NIK,nama_balita,tempat_lahir,jenis_kelamin,alamat,ortu) values ('$NIK', '$nama_balita', '$tempat_lahir', '$jenis_kelamin', '$alamat', '$ortu')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                header('location:tables.php');
                echo "sukses";
            } else {
                $error = "Gagal memasukan data";
            }
        }
    } else {
        $error = "";
    }
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SPK penentuan gizi pada balita - tambah data balita</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-login-image2 {
    background: url(img/posterstunting.png);
    background-position: center;
    background-size: cover;
}
    </style>

</head>

<body class="bg-gradient-primary2">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image2"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php 
                                    if($error){
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error ?>
                                        </div>
                                    <?php
                                    }
                                    
                                    ?>
                                    <?php 
                                    if($sukses){
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $sukses ?>
                                        </div>
                                    <?php
                                    }
                                    
                                    ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><strong>Tambah data balita</strong></h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="NIK" aria-describedby="emailHelp" valeu="<?php echo $NIK ?>" name="NIK"
                                                placeholder="Masukan NIK">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama_balita" valeu="<?php echo $nama_balita ?>" name="nama_balita" placeholder="Masukan nama balita">
                                        </div>
                                        <div class="form-groub" style="margin-bottom: 20px;">
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="">-- Pilih jenis kelamin --</option> 
                                                <option value="laki-laki" <?php if($jenis_kelamin == "laki-laki") echo "selected"?> >Laki-Laki</option>
                                                <option value="perempuan" <?php if($jenis_kelamin == "perempuan") echo "selected"?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir?>" aria-describedby="emailHelp"
                                                placeholder="Masukan tampat lahir">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="alamat" name="alamat" value="<?php echo $alamat ?>" placeholder="Masukan Alamat">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="ortu" name="ortu" value="<?php echo $ortu ?>" aria-describedby="emailHelp"
                                                placeholder="Masukan Nama orang tua">
                                        </div>
                                        <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary btn-user btn-block">
                                        <a href="proyek2/index.php"><button class="btn btn-warning btn-user btn-block" style="margin-top: 20px;">Kembali</button></a>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>