<?php
session_start();
include "zq-koneksi.php";
$id=$_GET['id'];

if($id != ""){
    $result = mysqli_query($connection, "delete from tbl_dati where id='$id'");
    
    // var_dump($connection); 
    // die; 

    if ($result){
    echo '<script>window.location.href = "input_dati.php";</script>';  
    }
}


