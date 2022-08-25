<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM balita WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 // cek jika user login sebagai admin
 if($data['jabatan']=="admin"){

  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['jabatan'] = "admin";
  // alihkan ke halaman dashboard admin
  header("location:halaman_admin.php");

 // cek jika user login sebagai pegawai
 }else if($data['jabatan']=="ketua"){
  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['jabatan'] = "ketua";
  // alihkan ke halaman dashboard pegawai
  header("location:halaman_pimpinan.php");

 }else{

  // alihkan ke halaman login kembali
  header("location:index.php?pesan=gagal");
 } 
}else{
 header("location:index.php?pesan=gagal");
}

?>