<?php
include"zq-koneksi.php";
$id_idi=$_GET['indikator'];




$query=mysqli_query($connection,"update tbl_idi set oprdata='D' where sha1(id_indikator)='$id_idi'");
if($query){

	echo '<script>window.location.href = "view-idi.php";</script>';  
}

?>