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
};

if (isset($_GET['NIK'])) {
    $NIK    = $_GET['NIK'];
} else {
    die("Error. No ID Selected!");
};
if (isset($_GET['tgl_pengukuran'])) {
    $tgl_pengukuran = $_GET['tgl_pengukuran'];
}else {
    die("Error. No ID Selected!");
};


$query    = mysqli_query($koneksi, "SELECT * FROM hasil_gizi WHERE NIK='$NIK' and tgl_pengukuran='$tgl_pengukuran'");
$result    = mysqli_fetch_array($query);

$query1    = mysqli_query($koneksi, "SELECT * FROM databalita WHERE NIK='$NIK'");
$result1 = mysqli_fetch_array($query1);

$umur = $result['umur'];
$beratBadan = $result['berat_badan'];
$tinggiBadan = $result['tinggi_badan'];

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
    $bbBerat = ($beratBadan - 13) / 6;
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

if ($RR = $R5) {
    $t = [$RR];
    $max5 = max($t);
}
if ($RR = $R1) {
    $t = [$RR];
    $max1 = max($t);
}
if ($RR = $R2) {
    $t = [$RR];
    $max2 = max($t);
}
if ($RR = $R3) {
    $t = [$RR];
    $max3 = max($t);
}
if ($RR = $R4) {
    $t = [$RR];
    $max4 = max($t);
}

$hitung1 = $max5 * $z1 + $max1 * $z2 + $max2 * $z3 + $max3 * $z4 + $max4 * $z5;
$hitung2 = $max5 + $max1 + $max2 + $max3 + $max4;
$total = $hitung1 / $hitung2;

$hasilGizi = "";

if ($total > 43 && $total < 48) {
    $hasilGizi = "Gizi Buruk";
} else if ($total > 48 && $total < 53) {
    $hasilGizi = "Gizi Kurang";
} else if ($total > 53 && $total < 70) {
    $hasilGizi = "Gizi Normal";
} else if ($total > 70 && $total < 83) {
    $hasilGizi = "Gizi Lebih";
} else {
    $hasilGizi = "Gizi Obesitas";
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>user profile details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <div class="container">
        <div class="team-single">
            <div class="row">
                <div class="col-lg-5 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" style="display: block; margin-left: auto; margin-right: auto;">
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600" style="text-transform: uppercase;"><?php echo $result1['nama_balita'] ?></h4>
                        <h3><?php echo $hasilGizi; ?></h3>
                        <p class="sm-width-95 sm-margin-auto"></p>
                    </div>
                    <table class="table table-sm">
                        <thead cellpadding=10 cellspacing=15>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Variabel</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">Derajat keanggotaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Umur</td>
                                <?php
                                echo "<td>";
                                if ($umur < 12) {
                                    echo "Fase 1";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 6 && $umur < 12) {
                                    echo "Fase 2";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 12 && $umur <= 24) {
                                    echo "Fase 2";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 12 && $umur < 24) {
                                    echo "Fase 3";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 24 && $umur < 36) {
                                    echo "Fase 3";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 24 && $umur < 36) {
                                    echo "Fase 4";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 36 && $umur <= 48) {
                                    echo "Fase 4";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 36) {
                                    echo "Fase 5";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>";
                                ?>
                                <?php
                                echo "<td>";
                                if ($umur < 12) {
                                    $U1 = $fase1;
                                    echo $U1;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 6 && $umur < 12) {
                                    $U2 = $fase2;
                                    echo $U2;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 12 && $umur <= 24) {
                                    $U2 = $fase2;
                                    echo $U2;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 12 && $umur < 24) {
                                    $U3 = $fase3;
                                    echo $U3;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 24 && $umur < 36) {
                                    $U3 = $fase3;
                                    echo $U3;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 24 && $umur < 36) {
                                    $U4 = $fase4;
                                    echo $U4;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur > 36 && $umur <= 48) {
                                    $U4 = $fase4;
                                    echo $U4;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($umur >= 36) {
                                    $U5 = $fase5;
                                    echo $U5;
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>";
                                ?>
                            </tr>
                            <tr>
                                <td>
                                    01
                                </td>
                                <td>Tinggi Badan</td>
                                <?php
                                echo "<td>";
                                if ($tinggiBadan <= 75) {
                                    echo "Tinggi badan rendah";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan >= 49 && $tinggiBadan < 75) {
                                    echo "Tinggi badan sedang";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan > 75 && $tinggiBadan <= 101) {
                                    echo "Tinggi badan sedang";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan >= 75) {
                                    echo "Tinggi badan tinggi";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>"; ?>

                                <?php
                                echo "<td>";
                                if ($tinggiBadan <= 75) {
                                    $tb1 = $tbRendah;
                                    echo $tb1;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan >= 49 && $tinggiBadan < 75) {
                                    $tb2 = $tbSedang;
                                    echo $tb2;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan > 75 && $tinggiBadan <= 101) {
                                    $tb3 = $tbSedang;
                                    echo $tb3;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($tinggiBadan >= 75) {
                                    $tb4 = $tbTinggi;
                                    echo $tb4;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>";
                                ?>
                            </tr>
                            <tr>
                                <td>
                                    02
                                </td>
                                <td>Berat Badan</td>
                                <?php
                                echo "<td>";
                                if ($beratBadan <= 13) {
                                    echo "Berat badan ringan";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan >= 7 && $beratBadan <= 13) {
                                    echo "Berat badan sedang";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan > 13 && $beratBadan <= 19) {
                                    echo "Berat badan ringan";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan >= 13) {
                                    echo "Berat badan berat";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>";
                                ?>

                                <?php
                                echo "<td>";
                                if ($beratBadan <= 13) {
                                    $bb1 = $bbRingan;
                                    echo $bb1;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan >= 7 && $beratBadan <= 13) {
                                    $bb2 = $bbSedang;
                                    echo $bb2;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan > 13 && $beratBadan <= 19) {
                                    $bb3 = $bbSedang;
                                    echo $bb;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                if ($beratBadan >= 13) {
                                    $bb4 = $bbBerat;
                                    echo $bb4;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                                echo "</td>";
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    <img style="width: 400px; margin-top: 10px;" src="img/gizi.PNG">
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">Detail Gizi Balita</h4>
                        <p class="no-margin-bottom">Data hasil di bawah ini menggunakan perhitungan fuzzy logic, Defuzzifikasi menggunakan model Sugeno dengan mengkonversi himpunan fuzzy keluaran ke bentuk crips dengan metode perhitungan rata-rata terbobot (Weighted Average) :</p>
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left text-blue">NIK :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p id="NIK" name="NIK"><?php echo $result['NIK'] ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left text-blue">Jenis Kelamin :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result1['jenis_kelamin'] ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left text-blue">Alamat :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result1['alamat'] ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left xs-margin-four-left text-blue">Nama orang tua :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result1['ortu'] ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left xs-margin-four-left text-blue">Umur :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result['umur'] ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left xs-margin-four-left text-blue">Berat Badan :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result['berat_badan'] ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <strong class="margin-10px-left xs-margin-four-left text-blue">Tinggi Badan :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $result['tinggi_badan'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            font-size: 16px;
            color: #6f6f6f;
            font-weight: 400;
            line-height: 28px;
            letter-spacing: 0.8px;
            margin-top: 20px;
        }

        .font-size38 {
            font-size: 38px;
        }

        .team-single-text .section-heading h4,
        .section-heading h5 {
            font-size: 36px
        }

        .team-single-text .section-heading.half {
            margin-bottom: 20px
        }

        @media screen and (max-width: 1199px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 32px
            }

            .team-single-text .section-heading.half {
                margin-bottom: 15px
            }
        }

        @media screen and (max-width: 991px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 28px
            }

            .team-single-text .section-heading.half {
                margin-bottom: 10px
            }
        }

        @media screen and (max-width: 767px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 24px
            }
        }


        .team-single-icons ul li {
            display: inline-block;
            border: 1px solid #02c2c7;
            border-radius: 50%;
            color: #86bc42;
            margin-right: 8px;
            margin-bottom: 5px;
            -webkit-transition-duration: .3s;
            transition-duration: .3s
        }

        .team-single-icons ul li a {
            color: #02c2c7;
            display: block;
            font-size: 14px;
            height: 25px;
            line-height: 26px;
            text-align: center;
            width: 25px
        }

        .team-single-icons ul li:hover {
            background: #02c2c7;
            border-color: #02c2c7
        }

        .team-single-icons ul li:hover a {
            color: #fff
        }

        .team-social-icon li {
            display: inline-block;
            margin-right: 5px
        }

        .team-social-icon li:last-child {
            margin-right: 0
        }

        .team-social-icon i {
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 15px;
            border-radius: 50px
        }

        .padding-30px-all {
            padding: 30px;
        }

        .bg-light-gray {
            background-color: #f7f7f7;
        }

        .text-center {
            text-align: center !important;
        }

        img {
            max-width: 100%;
            height: auto;
        }


        .list-style9 {
            list-style: none;
            padding: 0
        }

        .list-style9 li {
            position: relative;
            padding: 0 0 15px 0;
            margin: 0 0 15px 0;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
        }

        .list-style9 li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0
        }


        .text-sky {
            color: #02c2c7
        }

        .text-orange {
            color: #e95601
        }

        .text-green {
            color: #5bbd2a
        }

        .text-yellow {
            color: #f0d001
        }

        .text-pink {
            color: #ff48a4
        }

        .text-purple {
            color: #9d60ff
        }

        .text-lightred {
            color: #ff5722
        }

        a.text-sky:hover {
            opacity: 0.8;
            color: #02c2c7
        }

        a.text-orange:hover {
            opacity: 0.8;
            color: #e95601
        }

        a.text-green:hover {
            opacity: 0.8;
            color: #5bbd2a
        }

        a.text-yellow:hover {
            opacity: 0.8;
            color: #f0d001
        }

        a.text-pink:hover {
            opacity: 0.8;
            color: #ff48a4
        }

        a.text-purple:hover {
            opacity: 0.8;
            color: #9d60ff
        }

        a.text-lightred:hover {
            opacity: 0.8;
            color: #ff5722
        }

        .custom-progress {
            height: 10px;
            border-radius: 50px;
            box-shadow: none;
            margin-bottom: 25px;
        }

        .progress {
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }


        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #e95601
        }

        .bg-green {
            background-color: #5bbd2a
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #9d60ff
        }

        .bg-lightred {
            background-color: #ff5722
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>