<?php

include 'dbconn.php';
if(isset($_GET['deleteNIK'])){
    $NIK=$_GET['deleteNIK'];

    $sql="delete from `databalita` where NIK=$NIK";
    $result=mysqli_query($koneksi,$sql);
    if($result){
        header('location:tables.php');
        echo "Delete Succesfull";
    } else {
        die(mysqli_error($con));
    }
}



?>