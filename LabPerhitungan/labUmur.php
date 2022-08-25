<?php 
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "balita";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$query    =mysqli_query($koneksi, "SELECT * FROM databalita WHERE NIK='2345678'");;

$umur = 25;

// fuzzyfikasi fase umur 
if($umur < 12) {
	$fase1 = (12 - $umur) / 12;
} 
if ($umur >= 6 && $umur < 12) {
    $fase2 = ($umur - 6) / 12;
}
if ($umur >12 && $umur <=24){
    $fase2 = (24 - $umur) / 12;
}
if ($umur >= 12 && $umur < 24){
    $fase3 = ($umur - 12) / 12;
}
if ($umur >=24 && $umur < 36){
    $fase3 = (36 - $umur) / 12;
}
if ($umur > 24 && $umur < 36){
    $fase4 = ($umur - 24) / 12;
}
if ($umur >=36 && $umur <48){
    $fase4 = (48 - $umur) / 12;
} 
if ($umur >= 36){
    $fase5 = ($umur - 36) / 12;
}


// Hasil fuzzyfikasi umur 
if ($umur <12){
    $U1 = $fase1;
    echo "Fase 1 : ";
    echo $U1;
    echo "<br>";
} 
if ($umur >= 6 && $umur < 12) {
    $U2 = $fase2;
    echo "Fase 2 : ";
    echo $U2;
    echo "<br>";
}
if ($umur >12 && $umur <=24){
    $U3 = $fase2;
    echo "Fase 2 : ";
    echo $U3;
    echo "<br>";
}
if ($umur >= 12 && $umur < 24){
    $U4 = $fase3;
    echo "Fase 3 : ";
    echo $U4;
    echo "<br>";
}
if ($umur >=24 && $umur < 36){
    $U5 = $fase3;
    echo "Fase 3 : ";
    echo $U5;
    echo "<br>";
}
if ($umur > 24 && $umur < 36){
    $U6 = $fase4;
    echo "Fase 4 : ";
    echo $U6;
    echo "<br>";
}
if ($umur >=36 && $umur <48){
    $U7 = $fase4;
    echo "Fase 4 : ";
    echo $U7;
    echo "<br>";
}
if ($umur >= 36){
    $U8 = $fase5;
    echo "Fase 5 : ";
    echo $U8;
    echo "<br>";
}






?>