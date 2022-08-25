<?php 
error_reporting(0);
$tb = $_POST['tinggiBadan'];
$bb = $_POST['beratBadan'];
$umur = $_POST['umur'];

$value_pendek = "";
$value_normal = "";
$value_tinggi = "";

$valeu_kurang = "";
$valeu_bbnormal = "";  
$valeu_lebih = ""; 

$bbKurang = "";
$bbNormal = "";
$bbLebih = "";
$bbObesitas = "";

$tbPendek = "";
$tbNormal = "";
$tbTinggi = "";
if($tb <= 0 || $bb <= 0) {
    $z = "";
} else {
    // berat badan kurang
    if ($bb <= 7){
        $bbKurang  = 1;
    } else if ($bb > 7 && $bb <= 13) {
        $bbKurang = (13 - $bb)/(13 - 7);
    } else if ($bb >= 13){
        $bbKurang = 0;
    }

    // berat badan normal
    if ($bb > 13 && $bb <= 19){
        $bbNormal = (19 - $bb)/(19 - 13);
    } 
}
?>