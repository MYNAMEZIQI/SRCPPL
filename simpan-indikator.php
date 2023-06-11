<?php
session_start();
include "zq-koneksi.php";
//include "kirim-pesan.php";
$nama=$_GET['txtnamaindikator'];
$kdvar=$_GET['cmbvar'];
$query=mysqli_query($connection,"select count(*)  jml from tbl_indikator order by id");
$data=mysqli_fetch_array($query);
if($data['jml']==0){
	$kode='I01';
}else{
	$counter=$data['jml']+1;
	$kode='I'.str_pad($counter, 2,'0',STR_PAD_LEFT);
}

$result = mysqli_query($connection, "insert into tbl_indikator (id_variabel,kode,nama) values('$kdvar','$kode','$nama')");

if ($result){
echo '<script>window.location.href = "input-indikator.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>