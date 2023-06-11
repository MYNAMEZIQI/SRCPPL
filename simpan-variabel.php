<?php
session_start();
include "zq-koneksi.php";
//include "kirim-pesan.php";
$nama=$_GET['txtnamavariabel'];
$aspek=$_GET['cmbaspek'];
$query=mysqli_query($connection,"select count(*)  jml from tbl_variabel order by id");
$data=mysqli_fetch_array($query);
if($data['jml']==0){
	$kode='V01';
}else{
	$counter=$data['jml']+1;
	$kode='V'.str_pad($counter, 2,'0',STR_PAD_LEFT);
}

$result = mysqli_query($connection, "insert into tbl_variabel (id_aspek,kode,nama) values('$aspek','$kode','$nama')");

if ($result){
echo '<script>window.location.href = "input-variabel.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>