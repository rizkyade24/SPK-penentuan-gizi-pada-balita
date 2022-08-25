<?php 

$tinggiBadan = 85; 

// fuzzyfikasi Tinnggi Badan 

if ($tinggiBadan <= 75){
    $tbRendah = (75 - $tinggiBadan) / 26;
}
if ($tinggiBadan >= 49 && $tinggiBadan <75){
    $tbSedang = ($tinggiBadan - 49) / 26;
} else if ($tinggiBadan >75 && $tinggiBadan <= 101){
    $tbSedang = (101 - $tinggiBadan) / 26;
}
if ($tinggiBadan >= 75){
    $tbTinggi = ($tinggiBadan - 75) / 26;
}

//Hasil fuzzyfikasi tinggi badan
if ($tinggiBadan <= 75){
    $tb1 = $tbRendah;
    echo "Tinggi badan rendah : ";
    echo $tb1;
    echo "<br>";
}
if ($tinggiBadan >= 49 && $tinggiBadan <75){
    $tb2 = $tbSedang;
    echo "Tinggi badan sedang : ";
    echo $tb2;
    echo "<br>";
}
if ($tinggiBadan >75 && $tinggiBadan <= 101){
    $tb3 = $tbSedang;
    echo "Tinggi badan sedang : ";
    echo $tb3;
    echo "<br>";
}
if ($tinggiBadan >= 75){
    $tb4 = $tbTinggi;
    echo "Tinggi badan tinggi : ";
    echo $tb4;
    echo "<br>";
}


?>