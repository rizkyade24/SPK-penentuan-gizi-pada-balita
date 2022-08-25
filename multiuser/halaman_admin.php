<!DOCTYPE html>
<html>
<head>
 <title>Halaman admin</title>
</head>
<body>
 <?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['jabatan']==""){
  header("location:index.php?pesan=gagal");
 }  

 ?>
 <h1>Ini Halaman Admin</h1>

 <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['jabatan']; ?></b>.</p>
 <a href="logout.php">LOGOUT</a>

 <br/>
 <br/>

</body>
</html>