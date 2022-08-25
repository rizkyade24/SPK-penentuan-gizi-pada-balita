<?php 



// fase 1 
if ($umur >12 && $beratBadan <= 12 && $tinggiBadan <= 75){
    $R = min($U, $bb, $tb);
    echo "Rule no 1 : ";
    echo $R;
}
if ($umur >12 && $beratBadan <= 12 &&$tinggiBadan >= 49 && $tinggiBadan <= 101){
    $R = min($U, $bb, $tb);
    echo "Rule no 2 : ";
    echo $R;
}




?>