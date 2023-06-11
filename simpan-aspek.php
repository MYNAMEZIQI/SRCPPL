<?php
session_start();
include "zq-koneksi.php";
//include "kirim-pesan.php";
$nama=$_GET['txtnamaaspek'];
$query=mysqli_query($connection,"select count(*)  jml from tbl_aspek order by id");
$data=mysqli_fetch_array($query);
if($data['jml']==0){
	$kode='A01';
}else{
	$counter=$data['jml']+1;
	$kode='A'.str_pad($counter, 2,'0',STR_PAD_LEFT);
}

$result = mysqli_query($connection, "insert into tbl_aspek (kode,nama) values('$kode','$nama')");

if ($result){
echo '<script>window.location.href = "input-aspek.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>