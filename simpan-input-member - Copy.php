<?php
session_start();
include "zq-koneksi.php";
include "kirim-pesan.php";
$jnsbpr=$_GET['cmbjnsbpr'];
$sandi=$_GET['txtsandi'];
$nama=$_GET['txtnama'];
$pic=$_GET['txtpic'];
$wa=$_GET['txtwa'];
$waadmin='082234751240';
$pesan='Terdapat Permintaan Pendaftaran Member Dengan Sandi Bank '.$sandi.' Nama BPR '.$nama.' PIC atas Nama :'.$pic;
$result = mysqli_query($connection, "insert into tbl_pakai (jnsbpr,kode,nama,nmpic,aktif,nmbpr,statususer,nohp) values('$jnsbpr','$sandi','$nama','$pic','0','$nama','1','$wa')");

if ($result){
	kirim_pesan($waadmin,$pesan);
	kirim_pesan($wa,'Permintaan Ada Sedang Kami Proses Tunggu Beberapa Saat');
echo '<script>window.location.href = "input-member.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>