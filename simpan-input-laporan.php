<?php
session_start();
include "zq-koneksi.php";

$jnsbpr=$_GET['cmbjnsbpr'];
$namalap=$_GET['txtnamalap'];
$namaregulasi=$_GET['txtregulasi'];
$tujuanlap=$_GET['txttujuanlap'];
$bataslap=$_GET['txtbtslap'];
$tggjawab=$_GET['txttgglap'];
$blnlap=$_GET['cmbbulan'];
$statuslap=$_GET['cmbstatus'];
$kodebank=$_SESSION['kdbank'];
$result = mysqli_query($connection, "insert into tbl_laporan (jnsbpr,namalap,namaregulasi,tujuanlap,bataslap,tggjawab,blnlap,statuslap,tglinput,oprdata,sandibank) values('$jnsbpr','$namalap','$namaregulasi','$tujuanlap','$bataslap','$tggjawab','$blnlap','$statuslap',current_date,'C','$kodebank')");

if ($result){
echo '<script>window.location.href = "input-laporan.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

 

?>