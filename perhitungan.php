<?php 

$umur = "";
$beratBadan = "";
$tinggiBadan = "";

// variabel umur 
// if($umur <= 12) { //fase 1 
//     (12 - $umur ) / 12;
// } else if ($umur >= 6 && $umur <12){
//     ($umur - 6) / 12;
// } else if ($umur >=12 && $umur <24){
//     ($umur - 12) / 12;
// } else if ($umur >= 24 && $umur <36){
//     ($umur - 24) / 12;
// } else if ($umur >= 36 && $umur <48){
//     ($umur - 36) / 12;
// } else if ($umur >= 48){
//     ($umur - 48) / 12;
// }

if($fase1 <=12){ //Fase 1
    (12 - $umur) / 12;
} else if ($umur >=6 && $umur <24){ //Fase 2
    if ($umur <=12){
        ($umur - 6) / 12;
    } else if ($umur >12){
        (24 - $umur) / 12;
    }
} else if ($umur >=12 && $umur <36){ //Fase 3
    if ($umur <= 24){
        ($umur - 12) / 12;
    } else if ($umur > 24){
        (36 - $umur) / 12;
    }
} else if ($umur >= 24 && $umur <48){ //Fase 4
    if ($umur <=36){
        ($umur - 24) / 12;
    } else if ($umur >36){
        (48 - $umur) / 12;
    }
} else if ($umur >= 36){ //Fase 5
    (26 - $umur) / 12;
}

//variable umur hitungan 2
if($fase1 <=12){ //Fase 1
    $fase1 = (12 - $umur) / 12;
} else if ($umur >=6 && $umur <24){ //Fase 2
    $fase2 = ($umur >=6 && $umur <24);
    if ($fase1 <=12){
        ($fase2 - 6) / 12;
    } else if ($fase2 >12){
        (24 - $fase2) / 12;
    }
} else if ($umur >=12 && $umur <36){ //Fase 3
    $fase3 = ($umur >=12 && $umur <36);
    if ($fase3 <= 24){
        ($fase3 - 12) / 12;
    } else if ($fase3 > 24){
        (36 - $fase3) / 12;
    }
} else if ($umur >= 24 && $umur <48){ //Fase 4
    $fase4 = ($umur >= 24 && $umur <48);
    if ($fase4 <=36){
        ($fase4 - 24) / 12;
    } else if ($fase4 >36){
        (48 - $fase4) / 12;
    }
} else if ($umur >= 36){ //Fase 5
    $fase5 = (26 - $umur) / 12;
}


// Variabel Berat Badan
if ($beratBadan >= 13){ //Berat badan ringan
    (13 - $beratBadan) / 6;
} else if ($beratBadan >= 7 && $beratBadan <19){ //Berat badan sedang
    if ($beratBadan <=13){
        ($umur - 7) / 6;
    } else if($beratBadan >13){
        (19 - $umur) / 6;
    }
} else if ($beratBadan >13){ //Berat badan berat
    ($umur - 13) / 13;
}

//Variable Berat Badan Hitungan 2
if ($beratBadan >= 13){ //Berat badan ringan
    $bbRingan = (13 - $beratBadan) / 6;
} else if ($beratBadan >= 7 && $beratBadan <19){ //Berat badan sedang
    $bbSedang = ($beratBadan >= 7 && $beratBadan <19);
    if ($bbSedang <=13){
        ($umur - 7) / 6;
    } else if($bbSedang >13){
        (19 - $umur) / 6;
    }
} else if ($beratBadan >13){ //Berat badan berat
    $bbBerat = ($umur - 13) / 13;
}

// Variabel Tinggi Badan
if ($tinggiBadan <= 75){ //Tinggi badan rendah
    (75 - $umur) / 26;
} else if ($tinggiBadan >= 49 && $tinggiBadan <101){ //Tinggi badan sedang
    
    if ($tbSedang <75){
        ($umur - 49) / 26;
    } else if ($tbSedang >75){ 
        (101 - $umur) / 26;
    }
} else if ($tinggiBadan >= 75){ //Tinggi badan tinggi
    ($umur - 75) / 26;
}

?>