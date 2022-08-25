<?php 

$tinggiBadan = 85;
$beratBadan = 12;
$umur = 25;

$bbRingan = "";
$bbSedang = "";
$bbBerat = "";

$tbRendah = "";
$tbSedang = "";
$tbTinggi = "";

$fase1 = "";
$fase2 = "";
$fase3 = "";
$fase4 = "";
$fase5 = "";

// proses fuzzyfikasi umur
if($umur <= 12){
    $fase1 = (12 - $umur) / 12;
} else if ($umur >= 6 && $umur < 12) {
    $fase2 = ($umur - 6) / 12;
} else if ($umur >12 && $umur <=24){
    $fase2 = (24 - $umur) / 12;
} else if ($umur >= 12 && $umur < 24){
    $fase3 = ($umur - 12) / 12;
} else if ($umur >=24 && $umur < 36){
    $fase3 = (36 - $umur) / 12;
} else if ($umur > 24 && $umur < 36){
    $fase4 = ($umur - 24) / 12;
} else if ($umur >=36 && $umur <48){
    $fase4 = (48 - $umur) / 12;
} else if ($umur >= 36){
    $fase5 = (36 - $umur) / 12;
}

// proses fuzzyfikasi berat badan
if ($beratBadan <= 12){
    $bbRingan = (13 - $beratBadan) / 6;
} else if ($beratBadan >= 7 && $beratBadan <= 13){
    $bbSedang = ($beratBadan - 7) / 6;
} else if ($beratBadan >13 && $beratBadan <=19){
    $bbSedang = (19 - $beratBadan) / 6;
} else if ($beratBadan >= 13){
    $bbBerat = ($umur - 13) / 6;
} 

// proses fuzzyfikasi tinggi badan
if ($tinggiBadan <= 75){
    $tbRendah = (75 - $tinggiBadan) / 26;
} else if ($tinggiBadan >= 49 && $tinggiBadan <75){
    $tbSedang = ($tinggiBadan - 49) / 26;
} else if ($tinggiBadan >75 && $tinggiBadan <= 101){
    $tbSedang = (101 - $tinggiBadan) / 26;
} else if ($tinggiBadan >= 75){
    $tbTinggi = ($tinggiBadan - 75) / 26;
}

$z1 = 43; //Gizi buruk  
$z2 = 49; //Gizi kurang
$z3 = 53; //Gizi normal
$z4 = 70; //Gizi lebih
$z5 = 82; //Obesitas

// Rules fuzzyfikasi
if ($umur > 12){
        $R1 = min($fase1, $bbRingan, $tbRendah); //Gizi Normal
        $R2 = min($fase1, $bbRingan, $tbSedang); //Gizi Normal
        $R3 = min($fase1, $bbRingan, $tbTinggi); //Gizi Kurang
        $R4 = min($fase1, $bbSedang, $tbRendah); //Gizi Lebih
        $R5 = min($fase1, $bbSedang, $tbSedang); //Gizi Lebih
        $R6 = min($fase1, $bbSedang, $tbTinggi); //Gizi Lebih
        $R7 = min($fase1, $bbBerat, $tbRendah); //Gizi Lebih
        $R8 = min($fase1, $bbBerat, $tbSedang); //Gizi Lebih
        $R9 = min($fase1, $bbBerat, $tbTinggi); //Gizi Obesitas
} else if ($umur >= 6 && $umur <24){
    $R10 = min($fase2, $bbRingan, $tbRendah); //Gizi Kurang
    $R11 = min($fase2, $bbRingan, $tbSedang); //Gizi Kurang
    $R12 = min($fase2, $bbRingan, $tbTinggi); //Gizi Kurang
    $R13 = min($fase2, $bbSedang, $tbRendah); //Gizi Normal
    $R14 = min($fase2, $bbSedang, $tbSedang); //Gizi Normal
    $R15 = min($fase2, $bbSedang, $tbTinggi); //Gizi Normal
    $R16 = min($fase2, $bbBerat, $tbRendah); //Gizi Lebih
    $R17 = min($fase2, $bbBerat, $tbSedang); //Gizi Lebih
    $R18 = min($fase2, $bbBerat, $tbTinggi); //Gizi Obesitas
} else if ($umur >= 12 && $umur <36){
    $R19 = min($fase3, $bbRingan, $tbRendah); //Gizi Buruk
    $R20 = min($fase3, $bbRingan, $tbSedang); //Gizi Buruk
    $R21 = min($fase3, $bbRingan, $tbTinggi); //Gizi Buruk
    $R22 = min($fase3, $bbSedang, $tbRendah); //Gizi Normal
    $R23 = min($fase3, $bbSedang, $tbSedang); //Gizi Normal
    $R24 = min($fase3, $bbSedang, $tbTinggi); //Gizi Normal
    $R25 = min($fase3, $bbBerat, $tbRendah); //Gizi Lebih
    $R26 = min($fase3, $bbBerat, $tbSedang); //Gizi Lebih
    $R27 = min($fase3, $bbBerat, $tbTinggi); //Gizi Obesitas
} else if ($umur >24 && $umur <=48){
    $R28 = min($fase4, $bbRingan, $tbRendah); //Gizi Kurang
    $R29 = min($fase4, $bbRingan, $tbSedang); //Gizi Kurang
    $R30 = min($fase4, $bbRingan, $tbTinggi); //Gizi Kurang
    $R31 = min($fase4, $bbSedang, $tbRendah); //Gizi Normal
    $R32 = min($fase4, $bbSedang, $tbSedang); //Gizi Normal
    $R33 = min($fase4, $bbSedang, $tbTinggi); //Gizi Normal
    $R34 = min($fase4, $bbBerat, $tbRendah); //Gizi Lebih
    $R35 = min($fase4, $bbBerat, $tbSedang); //Gizi Lebih
    $R36 = min($fase4, $bbBerat, $tbTinggi); //Gizi Normal
} else if ($umur >48) {
    $R37 = min($fase5, $bbRingan, $tbRendah); //Gizi Buruk
    $R38 = min($fase5, $bbRingan, $tbSedang); //Gizi Buruk
    $R39 = min($fase5, $bbRingan, $tbTinggi); //Gizi Buruk
    $R40 = min($fase5, $bbSedang, $tbRendah); //Gizi Kurang
    $R41 = min($fase5, $bbSedang, $tbSedang); //Gizi Kurang
    $R42 = min($fase5, $bbSedang, $tbTinggi); //Gizi Kurang
    $R43 = min($fase5, $bbBerat, $tbRendah); //Gizi Lebih
    $R44 = min($fase5, $bbBerat, $tbSedang); //Gizi Lebih
    $R45 = min($fase5, $bbBerat, $tbTinggi); //Gizi Normal
}










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