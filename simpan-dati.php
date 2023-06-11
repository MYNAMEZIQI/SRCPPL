<?php
session_start();
include "zq-koneksi.php";
$nama=$_GET['txtNama'];
$id=$_GET['txtid'];

$query=mysqli_query($connection,"select count(*)  jml from tbl_dati order by id");
$data=mysqli_fetch_array($query);
if($data['jml']==0){
	$kode='V01';
}else{
	$counter=$data['jml']+1;
	$kode='V'.str_pad($counter, 2,'0',STR_PAD_LEFT);
}

if($id == ""){

    $result = mysqli_query($connection, "insert into tbl_dati (kode,nama) values('$kode','$nama')");

    if ($result){
    echo '<script>window.location.href = "input_dati.php";</script>';  
    }
}else {
    $result = mysqli_query($connection, "update tbl_dati set nama='$nama' where id='$id'");
    // var_dump($connection); 
    // die; 

    if ($result){
    echo '<script>window.location.href = "input_dati.php";</script>';  
    }
}


//echo '<script>alert("'.$error.'")</script>';
 

 

?>