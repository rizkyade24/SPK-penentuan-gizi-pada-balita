<?php
error_reporting(0);

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "balita";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    // cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$umur = 11;
$beratBadan = 24;
$tinggiBadan = 70;

// fuzzyfikasi fase umur 
if ($umur < 12) {
    $fase1 = (12 - $umur) / 12;
}
if ($umur >= 6 && $umur < 12) {
    $fase2 = ($umur - 6) / 12;
}
if ($umur > 12 && $umur <= 24) {
    $fase2 = (24 - $umur) / 12;
}
if ($umur >= 12 && $umur < 24) {
    $fase3 = ($umur - 12) / 12;
}
if ($umur >= 24 && $umur < 36) {
    $fase3 = (36 - $umur) / 12;
}
if ($umur > 24 && $umur < 36) {
    $fase4 = ($umur - 24) / 12;
}
if ($umur >= 36 && $umur < 48) {
    $fase4 = (48 - $umur) / 12;
}
if ($umur >= 36) {
    $fase5 = ($umur - 36) / 12;
}

// Hasil fuzzyfikasi umur 
if ($umur < 12) {
    $U1 = $fase1;
}
if ($umur >= 6 && $umur < 12) {
    $U2 = $fase2;
}
if ($umur > 12 && $umur <= 24) {
    $U2 = $fase2;
}
if ($umur >= 12 && $umur < 24) {
    $U3 = $fase3;
}
if ($umur >= 24 && $umur < 36) {
    $U3 = $fase3;
}
if ($umur > 24 && $umur < 36) {
    $U4 = $fase4;
}
if ($umur > 36 && $umur <= 48) {
    $U4 = $fase4;
}
if ($umur >= 36) {
    $U5 = $fase5;
}

// fuzzyfikasi Berat Badan 

if ($beratBadan <= 13) {
    $bbRingan = (13 - $beratBadan) / 6;
}
if ($beratBadan >= 7 && $beratBadan <= 13) {
    $bbSedang = ($beratBadan - 7) / 6;
} else if ($beratBadan > 13 && $beratBadan <= 19) {
    $bbSedang = (19 - $beratBadan) / 6;
}
if ($beratBadan >= 13) {
    $bbBerat = ($umur - 13) / 6;
}

// Hasil fuzzyfikasi berat badan 
if ($beratBadan <= 13) {
    $bb1 = $bbRingan;
}
if ($beratBadan >= 7 && $beratBadan <= 13) {
    $bb2 = $bbSedang;
}
if ($beratBadan > 13 && $beratBadan <= 19) {
    $bb3 = $bbSedang;
}
if ($beratBadan >= 13) {
    $bb4 = $bbBerat;
}

// fuzzyfikasi Tinnggi Badan 

if ($tinggiBadan <= 75) {
    $tbRendah = (75 - $tinggiBadan) / 26;
}
if ($tinggiBadan >= 49 && $tinggiBadan < 75) {
    $tbSedang = ($tinggiBadan - 49) / 26;
} else if ($tinggiBadan > 75 && $tinggiBadan <= 101) {
    $tbSedang = (101 - $tinggiBadan) / 26;
}
if ($tinggiBadan >= 75) {
    $tbTinggi = ($tinggiBadan - 75) / 26;
}

//Hasil fuzzyfikasi tinggi badan
if ($tinggiBadan <= 75) {
    $tb1 = $tbRendah;
}
if ($tinggiBadan >= 49 && $tinggiBadan < 75) {
    $tb2 = $tbSedang;
}
if ($tinggiBadan > 75 && $tinggiBadan <= 101) {
    $tb3 = $tbSedang;
}
if ($tinggiBadan >= 75) {
    $tb4 = $tbTinggi;
}


// inferensi umur < 12
// NO 1 gizi Normal 
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan <= 75) {
    $R2 = min($U1, $bb1, $tb1);
    $RR = $R2;
}
// No 2 Gizi Normal
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U1, $bb1, $tb2);
    $RR = $R2;
}
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U1, $bb1, $tb3);
    $RR = $R2;
}

// No 3 Gizi Kurang
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan >= 75) {
    $R1 = min($U1, $bb1, $tb4);
    $RR = $R1;
}
// No 4 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75) {
    $R3 = min($U1, $bb2, $tb1);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan <= 75) {
    $R3 = min($U1, $bb3, $tb1);
    $RR = $R3;
}
// No 5 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U1, $bb2, $tb2);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U1, $bb2, $tb3);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U1, $bb3, $tb2);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U1, $bb3, $tb3);
    $RR = $R3;
}
// No 6 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75) {
    $R3 = min($U1, $bb2, $tb4);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 75) {
    $R3 = min($U1, $bb3, $tb4);
    $RR = $R3;
}
// No 7 Gizi Lebih
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan <= 75) {
    $R3 = min($U1, $bb4, $tb1);
    $RR = $R3;
}
// No 8 Gizi Lebih
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U1, $bb4, $tb2);
    $RR = $R3;
}
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U1, $bb4, $tb3);
    $RR = $R3;
}
// No 9 Gizi Obesitas
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan >= 75) {
    $R4 = min($U1, $bb4, $tb4);
    $RR = $R4;
}

// inferensi umur >= 6 & umur <24
// No 10 Gizi Kurang
if ($umur >= 6 && $umur < 24 && $beratBadan <= 12 && $tinggiBadan <= 75) {
    $R1 = min($U2, $bb1, $tb1);
    $RR = $R1;
}
// No 11 Gizi Kurang
if ($umur >= 6 && $umur < 24 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R1 = min($U2, $bb1, $tb2);
    $RR = $R1;
}
if ($umur >= 6 && $umur < 24 && $beratBadan <= 12 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R1 = min($U2, $bb1, $tb3);
    $RR = $R1;
}
// No 12 Gizi Kurang 
if ($umur >= 6 && $umur < 24 && $beratBadan <= 12 && $tinggiBadan >= 75) {
    $R1 = min($U2, $bb1, $tb4);
    $RR = $R1;
}
// No 13 Gizi Normal
if ($umur >= 6 && $umur < 24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75) {
    $R2 = min($U2, $bb2, $tb1);
    $RR = $R2;
}
if ($umur >= 6 && $umur < 24 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan <= 75) {
    $R2 = min($U2, $bb3, $tb1);
    $RR = $R2;
}
// No 14 Gizi Normal
if ($umur >= 6 && $umur < 24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U2, $bb2, $tb2);
    $RR = $R2;
}
if ($umur >= 6 && $umur < 24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U2, $bb2, $tb3);
    $RR = $R2;
}
if ($umur >= 6 && $umur < 24 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U2, $bb3, $tb2);
    $RR = $R2;
}
if ($umur >= 6 && $umur < 24 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U2, $bb3, $tb3);
    $RR = $R2;
}
// No 15 Gizi Normal
if ($umur >= 6 && $umur < 24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75) {
    $R2 = min($U2, $bb2, $tb4);
    $RR = $R2;
}
if ($umur >= 6 && $umur < 24 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 75) {
    $R2 = min($U2, $bb3, $tb4);
    $RR = $R2;
}
// No 16 Gizi Lebih
if ($umur >= 6 && $umur < 24 && $beratBadan >= 13 && $tinggiBadan <= 75) {
    $R3 = min($U2, $bb4, $tb1);
    $RR = $R3;
}
// No 17 Gizi Lebih
if ($umur >= 6 && $umur < 24 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U2, $bb4, $tb2);
    $RR = $R3;
}
if ($umur >= 6 && $umur < 24 && $beratBadan >= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U2, $bb4, $tb3);
    $RR = $R3;
}
// No 18 Gizi Obesitas
if ($umur >= 6 && $umur < 24 && $beratBadan >= 13 && $tinggiBadan >= 75) {
    $R4 = min($U2, $bb4, $tb4);
    $RR = $R4;
}

// inferensi umur >=12 & umur < 36
// No 19 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan <= 75) {
    $R5 = min($U3, $bb1, $tb1);
    $RR = $R5;
}
// No 20 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R5 = min($U3, $bb1, $tb2);
    $RR = $R5;
}
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R5 = min($U3, $bb1, $tb3);
    $RR = $R5;
}
// No 21 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan >= 75) {
    $R5 = min($U3, $bb1, $tb4);
    $RR = $R5;
}
// No 22 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75) {
    $R2 = min($U3, $bb2, $tb1);
    $RR = $R2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan <= 75) {
    $R2 = min($U3, $bb3, $tb1);
    $RR = $R2;
}
// No 23 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U3, $bb2, $tb2);
    $RR = $R2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U3, $bb2, $tb3);
    $RR = $R2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U3, $bb3, $tb2);
    $RR = $R2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U3, $bb3, $tb3);
    $RR = $R2;
}
// No 24 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75) {
    $R2 = min($U3, $bb2, $tb4);
    $RR = $R2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 75) {
    $R2 = min($U3, $bb3, $tb4);
    $RR = $R2;
}
// No 25 Gizi Lebih
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan <= 75) {
    $R3 = min($U3, $bb3, $tb1);
    $RR = $R3;
}
// No 26 Gizi lebih
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U3, $bb3, $tb2);
    $RR = $R3;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U3, $bb4, $tb3);
    $RR = $R3;
}
// No 27 Gizi Obesitas
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan >= 75) {
    $R4 = min($U3, $bb4, $tb4);
    $RR = $R4;
}

// inferensi umur > 24 & umur <= 48
// No 28 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan <= 75) {
    $R1 = min($U4, $bb1, $tb1);
    $RR = $R1;
}
// No 29 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R1 = min($U4, $bb1, $tb2);
    $RR = $R1;
}
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R1 = min($U4, $bb1, $tb3);
    $RR = $R1;
}
// No 30 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan >= 75) {
    $R1 = min($U4, $bb1, $tb4);
    $RR = $R1;
}
// No 31 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75) {
    $R2 = min($U3, $bb2, $tb1);
    $RR = $R2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan <= 75) {
    $R2 = min($U3, $bb3, $tb1);
    $RR = $R2;
}
// No 32 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U3, $bb2, $tb2);
    $RR = $R2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U3, $bb2, $tb3);
    $RR = $R2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U3, $bb3, $tb2);
    $RR = $R2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R2 = min($U3, $bb3, $tb3);
    $RR = $R2;
}
// No 33 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75) {
    $R2 = min($U3, $bb2, $tb4);
    $RR = $R2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 75) {
    $R2 = min($U3, $bb3, $tb4);
    $RR = $R2;
}
// No 34 Gizi Lebih
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan <= 75) {
    $R3 = min($U4, $bb4, $tb1);
    $RR = $R3;
}
// No 35 Gizi Lebih
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U3, $bb3, $tb2);
    $RR = $R3;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U3, $bb4, $tb3);
    $RR = $R3;
}
// No 36 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan >= 75) {
    $R3 = min($U4, $bb4, $tb4);
    $RR = $R3;
}

// inferensi umur >48 
// No 37 Gizi Buruk
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan <= 75) {
    $R5 = min($U5, $bb1, $tb1);
    $RR = $R5;
}
// No 38 Gizi Kurang
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R5 = min($U5, $bb1, $tb2);
    $RR = $R5;
}
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R5 = min($U5, $bb1, $tb3);
    $RR = $R5;
}
// No 39 Gizi Kurang
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan >= 75) {
    $R5 = min($U5, $bb1, $tb4);
    $RR = $R5;
}
// No 40 Gizi Kurang
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75) {
    $R1 = min($U5, $bb2, $tb1);
    $RR = $R1;
}
if ($umur >= 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan <= 75) {
    $R1 = min($U5, $bb3, $tb1);
    $RR = $R1;
}
// No 41 Gizi Normal
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R2 = min($U5, $bb2, $tb2);
    $RR = $R2;
}
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R1 = min($U5, $bb2, $tb3);
    $RR = $R1;
}
if ($umur >= 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R1 = min($U5, $bb3, $tb2);
    $RR = $R1;
}
if ($umur >= 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R1 = min($U5, $bb3, $tb3);
    $RR = $R1;
}
// No 42 Gizi Normal
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75) {
    $R3 = min($U5, $bb2, $tb4);
    $RR = $R3;
}
if ($umur >= 36 && $beratBadan > 13 && $beratBadan <= 19 && $tinggiBadan >= 75) {
    $R2 = min($U5, $bb3, $tb4);
    $RR = $R2;
}
// No 43 Gizi Lebih
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan <= 75) {
    $R3 = min($U5, $bb4, $tb1);
    $RR = $R3;
}
// No 44 Gizi Lebih
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan < 75) {
    $R3 = min($U5, $bb3, $tb2);
    $RR = $R3;
}
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan > 75 && $tinggiBadan <= 101) {
    $R3 = min($U5, $bb3, $tb3);
    $RR = $R3;
}
// No 45 Gizi Normal
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan >= 75) {
    $R2 = min($U5, $bb4, $tb4);
    $RR = $R2;
}

$z1 = 43; //Gizi buruk  
$z2 = 49; //Gizi kurang
$z3 = 53; //Gizi normal
$z4 = 70; //Gizi lebih
$z5 = 82; //Obesitas

if($RR = $R5){
    $t = [$RR];
    $max5 = max($t);
} 
if($RR = $R1){
    $t = [$RR];
    $max1 = max($t);
} 
if($RR = $R2){
    $t = [$RR];
    $max2 = max($t);
}
if($RR = $R3){
    $t = [$RR];
    $max3 = max($t);
} 
if($RR = $R4){
    $t = [$RR];
    $max4 = max($t);
}

$hitung1 = $max5 * $z1 + $max1 * $z2 + $max2 * $z3 + $max3 * $z4 + $max4 * $z5;
$hitung2 = $max5 + $max1 + $max2 + $max3 + $max4;
$total = $hitung1 / $hitung2;

$hasilGizi = "";

if ($total > 43 && $total <48){
    $hasilGizi = "Gizi Buruk";
    echo $hasilGizi;
} else if ($total >48 && $total < 53){
    $hasilGizi = "Gizi Kurang";
    echo $hasilGizi;
} else if ($total >53 && $total < 70){
    $hasilGizi = "Gizi Normal";
    echo $hasilGizi;
} else if ($total > 70 && $total < 83){
    $hasilGizi = "Gizi Lebih";
    echo $hasilGizi;
} else {
    $hasilGizi = "Gizi Obesitas";
    echo $hasilGizi;
}

// $itung1 = $RR * $z1 + $RR * $z3 + $RR * $z2;
// $itung2 = $RR + $RR + $RR;
// $total = $itung1 / $itung2;
// echo "<br>";
// echo "<br>";
// echo "hasil gizi : ";
// echo $total;
