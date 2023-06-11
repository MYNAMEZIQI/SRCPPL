<?php
session_start();
include "zq-koneksi.php";
//include "kirim-pesan.php";
$id_indi=$_GET['txtindi'];
$id_var=$_GET['txtvar'];
$id_aspek=$_GET['txtaspek'];
$var_surat=$_GET['txtsurat'];
$var_tv=$_GET['txttv'];
$var_doc=$_GET['txtdoc'];
$var_fgd=$_GET['tfgd'];
$var_edd=$_GET['tedd'];
$var_idi=$_GET['txtidi'];
$var_dati=$_SESSION['dati'];
$sumber=$_GET['ketsumber'];
if(isset($_GET['smb_surat'])){
	$smb_srt=$_GET['smb_surat'];
}else{
	$smb_srt='off';
}

if(isset($_GET['smb_tv'])){
	$smb_tv=$_GET['smb_tv'];
}else{
	$smb_tv='off';
}

if(isset($_GET['smb_dok'])){
	$smb_dok=$_GET['smb_dok'];
}else{
	$smb_dok='off';
}
if($smb_srt=='on'){
	$var_smb_srt=1;
}else{
	$var_smb_srt=0;
}

if($smb_tv=='on'){
	$var_smb_tv=1;
}else{
	$var_smb_tv=0;
}

if($smb_dok=='on'){
	$var_smb_dok=1;
}else{
	$var_smb_dok=0;
}


//cek-data
if($var_smb_srt==1){
	if($var_surat==0){
		echo '<script>alert("Sumber Data Dari Surat Kabar telah Dipilih, Maka Data Kuantitatif Surat Kabar Harus Di isi")</script>';
		return;
	}
}else{
	if($var_surat<>0){
		echo '<script>alert("Data Kuantitatif Surat Kabar Lebih Dari 0, Maka Sumber Data Dari Surat Kabar Harus Di isi")</script>';
		return;
	}
}


if ($var_idi==0){

$result = mysqli_query($connection, "insert into tbl_idi (id_indikator,id_var,id_aspek,kuan_srt_kabar,kuan_tv,kuan_dok,kual_fdg,kual_wdd,tahun,oprdata,smb_surat,smb_tv,smb_dok,smb_ket,dati) values('$id_indi','$id_var','$id_aspek','$var_surat','$var_tv','$var_doc','$var_fgd','$var_edd','2023','C','$var_smb_srt','$var_smb_tv','$var_smb_dok','$sumber','$var_dati')");
}else {
	$result = mysqli_query($connection, "update tbl_idi set kuan_srt_kabar='$var_surat',kuan_tv='$var_tv',kuan_dok='$var_doc',kual_fgd='$var_fgd',kual_wdd='$var_edd',oprdata='U',smb_surat='$var_smb_srt',smb_tv='$var_smb_tv',smb_dok='$var_smb_dok',ket='$sumber' where id='$var_idi'");
}
if ($result){

	if ($var_idi==0){
		echo '<script>alert("IDI Berhasil Ditambahkan")</script>';
	}else{
		echo '<script>alert("IDI Berhasil Diubah")</script>';
	}
	//echo '<script>alert("'.$error.'")</script>';
		echo '<script>window.location.href = "view-idi.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>