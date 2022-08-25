// inferensi umur < 12
// NO 1 gizi Normal 
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R2 = min($U1, $bb1, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "no 1 Gizi Normal ";
    echo $RR2;
}
// No 2 Gizi Normal
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U1, $bb1, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "no 2 Gizi Normal ";
    echo $RR2;
} 
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U1, $bb1, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "no 2 Gizi Normal ";
    echo $RR2;
}

// No 3 Gizi Kurang
if ($umur < 12 && $beratBadan <= 12 && $tinggiBadan >= 75){
    $R1 = min($U1, $bb1, $tb4);
    $RR1 = $R1;
    echo "<br>";
    echo "no 3 Gizi Kurang ";
    echo $RR1;
}
// No 4 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75){
    $R3 = min($U1, $bb2, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "no 4 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan <= 75){
    $R3 = min($U1, $bb3, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "no 4 Gizi Lebih ";
    echo $RR3;
}
// No 5 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U1, $bb2, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "no 5 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U1, $bb2, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "no 5 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U1, $bb3, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "no 5 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U1, $bb3, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "no 5 Gizi Lebih ";
    echo $RR3;
}
// No 6 Gizi Lebih
if ($umur < 12 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75){
    $R3 = min($U1, $bb2, $tb4);
    $RR3 = $R3;
    echo "<br>";
    echo "No 6 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 75){
    $R3 = min($U1, $bb3, $tb4);
    $RR3 = $R3; 
    echo "<br>";
    echo "No 6 Gizi Lebih ";
    echo $RR3;
}
// No 7 Gizi Lebih
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan <= 75){
    $R3 = min($U1, $bb4, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "No 7 Gizi Lebih ";
    echo $RR3;
}
// No 8 Gizi Lebih
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U1, $bb4, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "No 8 Gizi Lebih ";
    echo $RR3;
}
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U1, $bb4, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "No 8 Gizi Lebih ";
    echo $RR3;
}
// No 9 Gizi Obesitas
if ($umur < 12 && $beratBadan >= 13 && $tinggiBadan >= 75){
    $R4 = min($U1, $bb4, $tb4);
    $RR4 = $R4;
    echo "<br>";
    echo "No 9 Gizi Obesitas ";
    echo $RR4;
}

// inferensi umur >= 6 & umur <24
// No 10 Gizi Kurang
if ($umur >= 6 && $umur <24 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R1 = min($U2, $bb1, $tb1);
    $RR1 = $R1;
    echo "<br>";
    echo "No 10 Gizi Kurang";
    echo $RR1;
}
// No 11 Gizi Kurang
if ($umur >= 6 && $umur <24 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R1 = min($U2, $bb1, $tb2);
    $RR1 = $R1;
    echo "<br>";
    echo "No 11 Gizi Kurang";
    echo $RR1;
}
if ($umur >= 6 && $umur <24 && $beratBadan <= 12 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R1 = min($U2, $bb1, $tb3);
    $RR1 = $R1;
    echo "<br>";
    echo "No 11 Gizi Kurang";
    echo $RR1;
}
// No 12 Gizi Kurang 
if ($umur >= 6 && $umur <24 && $beratBadan <= 12 && $tinggiBadan >= 75){
    $R1 = min($U2, $bb1, $tb4);
    $RR1 = $R1;
    echo "<br>";
    echo "No 12 Gizi Kurang";
    echo $RR1;
}
// No 13 Gizi Normal
if ($umur >= 6 && $umur <24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75){
    $R2 = min($U2, $bb2, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 13 Gizi Normal";
    echo $RR2;
}
if ($umur >= 6 && $umur <24 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan <= 75){
    $R2 = min($U2, $bb3, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 13 Gizi Normal";
    echo $RR2;
}
// No 14 Gizi Normal
if ($umur >= 6 && $umur <24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U2, $bb2, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 14 Gizi Normal";
    echo $RR2;
}
if ($umur >= 6 && $umur <24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U2, $bb2, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 14 Gizi Normal";
    echo $RR2;
}
if ($umur >= 6 && $umur <24 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U2, $bb3, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 14 Gizi Normal";
    echo $RR2;
}
if ($umur >= 6 && $umur <24 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U2, $bb3, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 14 Gizi Normal";
    echo $RR2;
}
// No 15 Gizi Normal
if ($umur >= 6 && $umur <24 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >=75){
    $R2 = min($U2, $bb2, $tb4);
    $RR2 = $R;
    echo "<br>";
    echo "No 15 Gizi Normal";
    echo $RR2;
}
if ($umur >= 6 && $umur <24 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >=75){
    $R2 = min($U2, $bb3, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 15 Gizi Normal";
    echo $RR2;
}
// No 16 Gizi Lebih
if ($umur >= 6 && $umur <24 && $beratBadan >= 13 && $tinggiBadan <= 75){
    $R3 = min($U2, $bb4, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "No 16 Gizi Lebih";
    echo $RR3;
} 
// No 17 Gizi Lebih
if ($umur >= 6 && $umur <24 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U2, $bb4, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "No 17 Gizi Lebih ";
    echo $RR3;
}
if ($umur >= 6 && $umur <24 && $beratBadan >= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U2, $bb4, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "No 17 Gizi Lebih ";
    echo $RR3;
}
// No 18 Gizi Obesitas
if ($umur >= 6 && $umur <24 && $beratBadan >= 13 && $tinggiBadan >= 75){
    $R4 = min($U2, $bb4, $tb4);
    $RR4 = $R4;
    echo "<br>";
    echo "No 18 Gizi Obesitas ";
    echo $RR4;
} 

// inferensi umur >=12 & umur < 36
// No 19 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R5 = min($U3, $bb1, $tb1);
    $RR5 = $R5;
    echo "<br>";
    echo "No 19 Gizi Buruk ";
    echo $RR5;
}
// No 20 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R5 = min($U3, $bb1, $tb2);
    $RR = $R5;
    echo "<br>";
    echo "No 20 Gizi Buruk ";
    echo $RR;
}
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R5 = min($U3, $bb1, $tb3);
    $RR5 = $R5;
    echo "<br>";
    echo "No 20 Gizi Buruk ";
    echo $RR5;
}
// No 21 Gizi Buruk
if ($umur >= 12 && $umur < 36 && $beratBadan <= 12 && $tinggiBadan >= 75){
    $R5 = min($U3, $bb1, $tb4);
    $RR5 = $R5;
    echo "<br>";
    echo "No 21 Gizi Buruk ";
    echo $RR5;   
}
// No 22 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75){
    $R2 = min($U3, $bb2, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 22 Gizi Normal ";
    echo $RR2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan <= 75){
    $R2 = min($U3, $bb3, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 22 Gizi Normal ";
    echo $RR2;
} 
// No 23 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U3, $bb2, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 23 Gizi Normal ";
    echo $RR2;
} 
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U3, $bb2, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 23 Gizi Normal ";
    echo $RR2;
} 
if ($umur >= 12 && $umur < 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U3, $bb3, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 23 Gizi Normal ";
    echo $RR2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U3, $bb3, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 23 Gizi Normal ";
    echo $RR2;
}
// No 24 Gizi Normal
if ($umur >= 12 && $umur < 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75){
    $R2 = min($U3, $bb2, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 24 Gizi Normal ";
    echo $RR2;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 75){
    $R2 = min($U3, $bb3, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 24 Gizi Normal ";
    echo $RR2;
}
// No 25 Gizi Lebih
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan <= 75){
    $R3 = min($U3, $bb3, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "No 25 Gizi Lebih ";
    echo $RR3;
}
// No 26 Gizi lebih
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U3, $bb3, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "No 26 Gizi Lebih ";
    echo $RR3;
}
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U3, $bb4, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "No 26 Gizi Lebih ";
    echo $RR3;
}
// No 27 Gizi Obesitas
if ($umur >= 12 && $umur < 36 && $beratBadan >= 13 && $tinggiBadan >= 75){
    $R4 = min($U3, $bb4, $tb4);
    $RR4 = $R4;
    echo "<br>";
    echo "No 27 Gizi Obesitas ";
    echo $RR4;
}

// inferensi umur > 24 & umur <= 48
// No 28 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R1 = min($U4, $bb1, $tb1);
    $RR1 = $R1;
    echo "<br>";
    echo "No 28 Gizi Kurang ";
    echo $RR1;
}
// No 29 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R1 = min($U4, $bb1, $tb2);
    $RR1 = $R1;
    echo "<br>";
    echo "No 29 Gizi Kurang ";
    echo $RR1;
}
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R1 = min($U4, $bb1, $tb3);
    $RR1 = $R1;
    echo "<br>";
    echo "No 29 Gizi Kurang ";
    echo $RR1;
}
// No 30 Gizi Kurang
if ($umur > 24 && $umur <= 48 && $beratBadan <= 12 && $tinggiBadan >=75){
    $R1 = min($U4, $bb1, $tb4);
    $RR1 = $R1;
    echo "<br>";
    echo "No 30 Gizi Kurang ";
    echo $RR1;
} 
// No 31 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75){
    $R2 = min($U3, $bb2, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 31 Gizi Normal ";
    echo $RR2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan <= 75){
    $R2 = min($U3, $bb3, $tb1);
    $RR2 = $R2;
    echo "<br>";
    echo "No 31 Gizi Normal ";
    echo $RR2;
} 
// No 32 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U3, $bb2, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 32 Gizi Normal ";
    echo $RR2;
} 
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U3, $bb2, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 32 Gizi Normal ";
    echo $RR2;
} 
if ($umur > 24 && $umur <= 48 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U3, $bb3, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 32 Gizi Normal ";
    echo $RR2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R2 = min($U3, $bb3, $tb3);
    $RR2 = $R2;
    echo "<br>";
    echo "No 32 Gizi Normal ";
    echo $RR2;
}
// No 33 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75){
    $R2 = min($U3, $bb2, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 33 Gizi Normal ";
    echo $RR2;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 75){
    $R2 = min($U3, $bb3, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 33 Gizi Normal ";
    echo $RR2;
}
// No 34 Gizi Lebih
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan <= 75){
    $R3 = min($U4, $bb4, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "No 34 Gizi Lebih ";
    echo $RR3;
}
// No 35 Gizi Lebih
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U3, $bb3, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "No 35 Gizi Lebih ";
    echo $RR3;
}
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U3, $bb4, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "No 35 Gizi Lebih ";
    echo $RR3;
}
// No 36 Gizi Normal
if ($umur > 24 && $umur <= 48 && $beratBadan >= 13 && $tinggiBadan >= 75){
    $R3 = min($U4, $bb4, $tb4);
    $RR3 = $R3;
    echo "<br>";
    echo "No 36 Gizi Lebih ";
    echo $RR3;
}

// inferensi umur >48 
// No 37 Gizi Buruk
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R5 = min($U5, $bb1, $tb1);
    $RR5 = $R5;
    echo "<br>";
    echo "No 37 Gizi Buruk ";
    echo $RR5;
}
// No 38 Gizi Kurang
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R5 = min($U5, $bb1, $tb2);
    $RR5 = $R5;
    echo "<br>";
    echo "No 38 Gizi Buruk ";
    echo $RR5;
}
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R5 = min($U5, $bb1, $tb3);
    $RR5 = $R5;
    echo "<br>";
    echo "No 38 Gizi Buruk ";
    echo $RR5;
}
// No 39 Gizi Kurang
if ($umur >= 36 && $beratBadan <= 12 && $tinggiBadan >=75){
    $R5 = min($U5, $bb1, $tb4);
    $RR5 = $R5;
    echo "<br>";
    echo "No 39 Gizi Buruk ";
    echo $RR5;
} 
// No 40 Gizi Kurang
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan <= 75){
    $R1 = min($U5, $bb2, $tb1);
    $RR1 = $R1;
    echo "<br>";
    echo "No 40 Gizi Kurang ";
    echo $RR1;
}
if ($umur >= 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan <= 75){
    $R1 = min($U5, $bb3, $tb1);
    $RR1 = $R1;
    echo "<br>";
    echo "No 40 Gizi Kurang ";
    echo $RR1;
} 
// No 41 Gizi Normal
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R2 = min($U5, $bb2, $tb2);
    $RR2 = $R2;
    echo "<br>";
    echo "No 41 Gizi Kurang ";
    echo $RR2;
} 
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R1 = min($U5, $bb2, $tb3);
    $RR1 = $R1;
    echo "<br>";
    echo "No 41 Gizi Kurang ";
    echo $RR1;
} 
if ($umur >= 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R1 = min($U5, $bb3, $tb2);
    $RR1 = $R1;
    echo "<br>";
    echo "No 32 Gizi Kurang ";
    echo $RR1;
}
if ($umur >= 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R1 = min($U5, $bb3, $tb3);
    $RR1 = $R1;
    echo "<br>";
    echo "No 32 Gizi Kurang ";
    echo $RR1;
}
// No 42 Gizi Normal
if ($umur >= 36 && $beratBadan >= 7 && $beratBadan <= 13 && $tinggiBadan >= 75){
    $R3 = min($U5, $bb2, $tb4);
    $RR3 = $R3;
    echo "<br>";
    echo "No 42 Gizi Lebih ";
    echo $RR3;
}
if ($umur >= 36 && $beratBadan >13 && $beratBadan <=19 && $tinggiBadan >= 75){
    $R2 = min($U5, $bb3, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 42 Gizi Normal ";
    echo $RR2;
}
// No 43 Gizi Lebih
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan <= 75){
    $R3 = min($U5, $bb4, $tb1);
    $RR3 = $R3;
    echo "<br>";
    echo "No 43 Gizi Lebih ";
    echo $RR3;
}
// No 44 Gizi Lebih
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan >= 49 && $tinggiBadan <75){
    $R3 = min($U5, $bb3, $tb2);
    $RR3 = $R3;
    echo "<br>";
    echo "No 44 Gizi Lebih ";
    echo $RR3;
}
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan >75 && $tinggiBadan <= 101){
    $R3 = min($U5, $bb3, $tb3);
    $RR3 = $R3;
    echo "<br>";
    echo "No 44 Gizi Lebih ";
    echo $RR3;
}
// No 45 Gizi Normal
if ($umur >= 36 && $beratBadan >= 13 && $tinggiBadan >= 75){
    $R2 = min($U5, $bb4, $tb4);
    $RR2 = $R2;
    echo "<br>";
    echo "No 45 Gizi Normal ";
    echo $RR2;
}