<?php 

$tinggiBadan = 100;
$beratBadan = 20;
$umur = 1;

$value_pendek = "";
$value_normal = "";
$value_tinggi = "";

$valeu_kurang = "";
$valeu_bbnormal = "";  
$valeu_lebih = ""; 

$gizinormal = "";
// proses fuzzyfikasi berat badan
if ($tinggiBadan < 45){
    $value_pendek = 1;
    $value_normal = 0;
    $value_tinggi = 0;
} else if ($tinggiBadan >= 45 && $tinggiBadan <= 75){
    $valeu_pendek = (75 - $tinggiBadan)/(75 - 45);
    $valeu_normal = ($tinggiBadan - 75)/(75 - 45);
    $valeu_tinggi = 0;
} else if ($tinggiBadan == 75){
    $valeu_pendek = 0;
    $valeu_normal = 1;
    $valeu_tinggi = 0; 
} else if ($tinggiBadan >= 75 && $tinggiBadan <= 101){
    $valeu_pendek = 0;
    $valeu_normal = (101 - $tinggiBadan)/(101 - 75);
    $valeu_tinggi = ($tinggiBadan - 75)/(101 - 75);
} else if ($tinggiBadan >= 101){
    $valeu_pendek = 0;  
    $valeu_normal = (101 - $tinggiBadan)/(101 - 75);
    $valeu_tinggi = ($tinggiBadan - 75)/(101 - 75);
}

// proses fuzzyfikasi berat badan 
if ($beratBadan < 7){
    $valeu_kurang = 1; 
    $valeu_bbnormal = 0; 
    $valeu_lebih = 0;
} else if ($beratBadan > 7 && $beratBadan){
    $valeu_kurang = (13 - $beratBadan)/(13 - 7);
    $valeu_bbnormal = ($beratBadan - 7)/(13 - 7);
    $valeu_lebih = 0;
} else if ($beratBadan == 13){
    $valeu_kurang = 0;
    $valeu_bbnormal = 1;
    $valeu_lebih = 0;
} else if ($beratBadan > 13 && $beratBadan < 19){
    $valeu_kurang = 0;
    $valeu_bbnormal = (19 - $beratBadan)/(19 - 13);
    $valeu_lebih = ($beratBadan - 13)/(19 - 13);
} else if ($beratBadan > 19){
    $valeu_kurang = 0; 
    $valeu_bbnormal = 0;
    $valeu_lebih = 1;
}

$z1 = 43; //Gizi buruk
$z2 = 48; //Gizi kurang
$z3 = 53; //Gizi normal
$z4 = 70; //Gizi lebih
$z5 = 83; //Obesitas

$hasil_output = $umur;
 if ($hasil_output >= 0 && $hasil_output <= 1){
    $R1 = min($valeu_kurang, $value_pendek); //Gizi normal
    $R2 = min($valeu_kurang, $value_normal); // Gizi normal
    $R3 = min($valeu_kurang, $value_tinggi); //Gizi kurang
    $R4 = min($valeu_bbnormal, $value_pendek); //Gizi lebih
    $R5 = min($valeu_bbnormal, $value_tinggi); //Gizi lebih     
    $R6 = min($valeu_bbnormal, $value_tinggi); //Gizi lebih 
    $R7 = min($valeu_lebih, $value_pendek); //Gizi lebih 
    $R8 = min($valeu_lebih, $value_normal); //Gizi lebih 
    $R9 = min($valeu_lebih, $value_tinggi); //Obesitas

    $total_RiZi = ($R1*$z3)+($R2*$z3)+($R3*$z2)+($R4*$z3)+($R5*$z3)+($R6*$z4)+($R7*$z4)+($R8*$z4)+($R9*$z5);
    $total_z1 = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9;
    $total_r = $total_RiZi / $total_z1;

    echo ($total_r); 
    echo ($R1); 

} else if ($hasil_output >= 1 && $hasil_output <= 2){
    $R1 = min($value_kurang, $value_pendek); //Gizi kurang
    $R2 = min($value_kurang, $valuenormal); //Gizi kurang 
    $R3 = min($value_kurang, $value_tinggi); //Gizi kurang
    $R4 = min($value_bbnormal, $value_pendek); //Gizi normal
    $R5 = min($value_bbnormal, $value_normal); //Gizi normal
    $R6 = min($value_bbnormal, $value_kurang); //Gizi normal
    $R7 = min($value_lebih, $value_pendek); //Gizi lebih
    $R8 = min($value_lebih, $value_normal);  //Gizi lebih
    $R9 = min($value_lebih, $value_tinggi); //Obesitas

    $total_RiZi = ($R1*$z2)+($R2*$z2)+($R3*$z2)+($R4*$z3)+($R5*$z3)+($R6*$z3)+($R7*$z4)+($R8*$z4)+($R9*$z5);
    $total_z1 = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9;
    $total_r = $total_RiZi / $total_r;

    echo ($total_r); 

} else if ($hasil_output >= 2 && $hasil_output <= 3){
    $R1 = min($valeu_kurang, $valeu_pendek); //Gizi buruk
    $R2 = min($valeu_kurang, $valeu_normal); //Gizi buruk
    $R3 = min($valeu_kurang, $valeu_tinggi); //Gizi normal
    $R4 = min($valeu_bbnormal, $valeu_pendek); //Gizi normal
    $R5 = min($valeu_bbnormal, $valeu_normal); //Gizi normal
    $R6 = min($valeu_bbnormal, $valeu_tinggi); //Gizi normal
    $R7 = min($valeu_lebih, $valeu_pendek); //Gizi lebih
    $R8 = min($valeu_lebih, $valeu_normal); //Gizi lebih
    $R9 = min($valeu_lebih, $valeu_tinggi); //Obesitas

    $total_RiZi = ($R1*$z2)+($R2*$z2)+($R3*$z2)+($R4*$z3)+($R5*$z3)+($R6*$z3)+($R7*$z4)+($R8*$z4)+($R9*$z5);
    $total_z1 = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9;
    $total_r = $total_RiZi / $total_r;

    echo ($total_r); 

} else if ($hasil_output >= 3 && $hasil_output <= 4){
    $R1 = min($valeu_kurang, $valeu_pendek); //Gizi kurang
    $R2 = min($valeu_kurang, $valeu_normal); //Gizi kurang
    $R3 = min($valeu_kurang, $valeu_tinggi); //Gizi kurang
    $R4 = min($valeu_bbnormal, $valeu_pendek); //Gizi normal
    $R5 = min($valeu_bbnormal, $valeu_normal); //Gizi normal
    $R6 = min($valeu_bbnormal, $valeu_tinggi); //Gizi normal
    $R7 = min($valeu_lebih, $valeu_pendek); //Gizi lebih
    $R8 = min($valeu_lebih, $valeu_normal); //Gizi lebih
    $R9 = min($valeu_lebih, $valeu_tinggi); //Gizi normal

    $total_RiZi = ($R1*$z2)+($R2*$z2)+($R3*$z2)+($R4*$z3)+($R5*$z3)+($R6*$z3)+($R7*$z4)+($R8*$z4)+($R9*$z3);
    $total_z1 = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9;
    $total_r = $total_RiZi / $total_r;

    echo ($total_r);

} else if ($hasil_output >= 4 && $hasil_output <= 5){
    $R1 = min($valeu_kurang, $valeu_pendek); //Gizi buruk
    $R2 = min($valeu_kurang, $valeu_normal); //Gizi buruk
    $R3 = min($valeu_kurang, $valeu_tinggi); //Gizi buruk
    $R4 = min($valeu_bbnormal, $valeu_pendek); //Gizi kurang
    $R5 = min($valeu_bbnormal, $valeu_normal); //Gizi kurang
    $R6 = min($valeu_bbnormal, $valeu_tinggi); //Gizi kurang 
    $R7 = min($valeu_lebih, $valeu_pendek); //Gizi lebih
    $R8 = min($valeu_lebih, $valeu_normal); //Gizi lebih 
    $R9 = min($valeu_lebih, $valeu_tinggi); //Gizi normal

    $total_RiZi = ($R1*$z1)+($R2*$z1)+($R3*$z1)+($R4*$z2)+($R5*$z2)+($R6*$z2)+($R7*$z4)+($R8*$z4)+($R9*$z3);
    $total_zi = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9;
    $total_r = $total_RiZi / $total_zi;

    echo ($total_r);
    echo $R1;
    echo "<br>";
    echo $R2; 
    echo "<br>";
    echo $R3; 
    echo "<br>";
    echo $R4; 
    echo "<br>";
    echo $R5; 
    echo "<br>";
    echo $R6; 
    echo "<br>";
    echo $R7; 
    echo "<br>";
    echo $R8; 
    echo "<br>";
    echo $R9; 
}








?>