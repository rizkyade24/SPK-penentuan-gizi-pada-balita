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

$query = mysqli_query($koneksi, "SELECT * FROM databalita WHERE NIK = '2345678'");
$row_query = mysqli_fetch_array($query);

$beratBadan = $row_query['berat_badan'];

// fuzzyfikasi Berat Badan 

if ($beratBadan <= 12){
    $bbRingan = (13 - $beratBadan) / 6;
}
if ($beratBadan >= 7 && $beratBadan <= 13){
    $bbSedang = ($beratBadan - 7) / 6;
} else if ($beratBadan >13 && $beratBadan <=19){
    $bbSedang = (19 - $beratBadan) / 6;
}
if ($beratBadan >= 13){
    $bbBerat = ($beratBadan - 13) / 6;
} 

// Hasil fuzzyfikasi berat badan 
if ($beratBadan <= 12){
    $bb1 = $bbRingan;
    echo "Berat badan ringan : ";
    echo $bb1;
    echo "<br>";
}
if ($beratBadan >= 7 && $beratBadan <= 13){
    $bb2 = $bbSedang;
    echo "Berat badan sedang : ";
    echo $bb2;
    echo "<br>";
}
if ($beratBadan >13 && $beratBadan <=19){
    $bb3 = $bbSedang;
    echo "Berat badan sedang : ";
    echo $bb3;
    echo "<br>";
}
if ($beratBadan >= 13) {
    $bb4 = $bbBerat;
    echo "Berat badan berat : ";
    echo $bb4;
    echo "<br>"; 
}

?>