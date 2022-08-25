<?php
session_start();

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "balita";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$NIK = "";
$nama_balita = "";
$tempat_lahir = "";
$jenis_kelamin = "";
$alamat = "";
$ortu = "";
$umur = "";
$berat_badan = "";
$tinggi_badan = "";


if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $NIK    = $_GET['NIK'];
    $sql1   = "delete * from databalita where NIK = '$NIK'";
    $q1     = mysqli_query($koneksi, $sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $NIK     = $_GET['NIK'];
    $sql1    = "select * from databalita where NIK = '$NIk'"; 
    $q1      = mysqli_query($koneksi, $sql1);
    $r1      = mysqli_fetch_array($q1);
    $NIK = $r1['NIK'];
    $nama_balita = $r1['nama_balita'];
    $tempat_lahir = $r1['tempat_lahir'];
    $jenis_kelamin = $r1['jenis_kelamin'];
    $alamat = $r1['alamat'];
    $ortu = $r1['ortu'];
    $umur = $r1['umur'];
    $berat_badan = $r1['berat_badan'];
    $tinggi_badan = $r1['tinggi_badan'];

    if ($NIK = '') {
        $error = "Data tidak di temukan";
    }
}

if (isset($_POST['simpan'])) {
    $NIK = $_POST['NIK'];
    $nama_balita = $_POST['nama_balita'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $ortu = $_POST['ortu'];
    $umur = $_POST['umur'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];

    if ($NIK && $nama_balita && $tempat_lahir && $jenis_kelamin && $alamat && $ortu && $umur && $berat_badan && $tinggi_badan) {

        if ($op == 'edit') {
            $sql1 = "update databalita set NIK = '$NIK', nama_balita = '$nama_balita', tempat_lahir = '$tempat_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', ortu = '$ortu', umur = '$umur', berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil di update";
            } else {
                $error = "Data gagal di update";
            }
        } else {
            $sql1 = "insert into databalita(NIK,nama_balita,tempat_lahir,jenis_kelamin,alamat,ortu,umur,berat_badan,tinggi_badan) values ('$NIK', '$nama_balita', '$tempat_lahir', '$jenis_kelamin', '$alamat', '$ortu', '$umur', '$berat_badan', '$tinggi_badan')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukan data baru";
            } else {
                $error = "Gagal memasukan data";
            }
        }
    } else {
        $error = "";
    }
}

$data_balita = mysqli_query($koneksi,"SELECT * FROM databalita");
$jumlah_balita = mysqli_num_rows($data_balita);
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK penentuan gizi pada balita - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .bg-gradient-primary1{
        background-color: #16B3AC;
    }
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary1 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="http://technology-indonesia.com/wp-content/uploads/2018/01/www.technology-indonesia.com_images_1%20kemenkes.jpg" style="width: 100px;">
                </div>
                
            </a>
            <div class="sidebar-brand-text mx-3" style="color: white; font-weight: bold; text-align: center"><strong>SPK GIZI BALITA</strong></div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php 
            $jabatan = $_SESSION['jabatan'] == 'admin';
            if($jabatan){
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data balita
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Balita</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data balita :</h6>
                        <a class="collapse-item" href="tambah.php">Tambah balita</a>
                        <a class="collapse-item" href="tables.php">Data balita</a>
                    </div>
                </div>
            </li>   
            <?php }?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Hasil
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="register.php">Register</a>
                        <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.php">404 Page</a>
                        <a class="collapse-item" href="blank.php">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tableshasil.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Hasil Gizi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="logout.php" id="userDropdown" >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel data balita</h1>
                    <p class="mb-4"></a>Data balita di bawah ini telah melewati proses pemilihan oleh badan pengolah data dan penyajian informasi dinas kesehatan kabupaten lumajang</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Balita</th>
                                            <th>Tempat Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Nama Orang tua</th> 
                                            <th>Aksi</th>
                                            <th>Tambah data perhitungan</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php 
                                    
                                    $sql2 = "select * from databalita where periode = 0";
                                    $result = mysqli_query($koneksi, $sql2);
                                    if($result){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $NIK = $row['NIK'];
                                            $nama_balita = $row['nama_balita'];
                                            $tempat_lahir = $row['tempat_lahir'];
                                            $jenis_kelamin = $row['jenis_kelamin'];
                                            $alamat = $row['alamat'];
                                            $ortu = $row['ortu'];
                                            echo '
                                            <tr>
                                                <td>'.$NIK.'</td>
                                                <td>'.$nama_balita.'</td>
                                                <td>'.$tempat_lahir.'</td>
                                                <td>'.$jenis_kelamin.'</td>
                                                <td>'.$alamat.'</td>
                                                <td>'.$ortu.'</td>
                                            <td>
                                                <a href="update.php?updateNIK='.$NIK.'"><button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Edit</button></a>
                                                <a href="delete.php?deleteNIK='.$NIK.'"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                            <td>
                                                <a href="updateData.php?updateDataNIK='.$NIK.'"><button type="button" class="btn btn-success" style="margin-bottom: 10px;">Tambah</button></a>
                                            </td>
                                        </tr>
                                            ';
                                        }
                                    } 
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>