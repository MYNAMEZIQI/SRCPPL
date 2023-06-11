<?php
session_start();
$dati=$_SESSION['dati'];
include "../zq-koneksi.php";
$pilih_aspek=$_SESSION['aspek'];

if (isset($_GET['btncetak'])){
  echo '<script>window.print();</script>';  

}




$cekdata=mysqli_query($connection,"select count(*) jml from tbl_idi where id_aspek='$pilih_aspek'");
$data2=mysqli_fetch_array($cekdata);

if($data2['jml']==0){
	echo '<script>alert("Data Tidak Ditemukan")</script>';
	echo '<script>window.location.href = "../laporan-sumber-data.php";</script>';  
	return;
}

$ambil=mysqli_query($connection,"select * from tbl_aspek where id='$pilih_aspek'");
$dataambil=mysqli_fetch_array($ambil);


$result = mysqli_query($connection, "SELECT a.nama aspek ,SUBSTR(a.kode,2,2) kds,v.nama variabel ,SUBSTR(v.kode,2,2) kdv,i.nama indikator ,SUBSTR(i.kode,2,2) kdi,i.id id_indi ,a.id id_aspek ,v.id id_var,smb_surat,smb_tv,smb_dok,smb_ket
FROM tbl_aspek a,tbl_variabel v,tbl_indikator i,tbl_idi d
WHERE id_variabel=v.id AND v.id_aspek=a.id AND i.id=id_indikator and oprdata<>'D' and  d.id_aspek='$pilih_aspek' and dati='$dati' ORDER BY i.id
");
$n=0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Sumber Data</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<script type="text/javascript" src="lib/js/jquery.js"></script>
	<script type="text/javascript" src="lib/js/bootstrap.js"></script>
</head>
<body>
	<h1></h1>
	<form>
	<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th colspan="10" align="center">Perolehan Sumber Data Kuantitatif Aspek <?php echo $dataambil['nama'];?></th>
			</tr>
			<tr>

				<th colspan="2" align="center">Aspek</th>
				<th colspan="2">Variabel</th>
				<th align="center" colspan="2">Indikator</th>
				<th colspan="3">Sumber Data Kuantitatif</th>
				<th rowspan="2">Keterangan</th>	

			</tr>
			<tr>
				<th>No</th>
				<th>Keterangan</th>
				<th>No</th>
				<th>Keterangan</th>
				<th>No</th>
				<th align="center">Keterangan</th>
				<th align="center">Surat Kabar</th>
				<th>Televisi</th>
				<th>Dokumen</th>
			</tr>

		</thead>
		<tbody>
			<?php
				while($data=mysqli_fetch_array($result)){
				$n++;
				//echo '<script>alert("'.$data['kdi'].'")</script>';
			?>

			<tr>
				<td align="center"><?php echo $data['kds'];?></td>
				<td><?php echo $data['aspek'];?></td>
				<td><?php echo $data['kdv'];?></td>
				<td><?php echo $data['variabel'];?></td>
				<td><?php echo $data['kdi'];?></td>
				<td><?php echo $data['indikator'];?></td>
				<td><?php if($data['smb_surat']==1){ echo "<img src='ceklist.png' width='20' height='20'>";}else{echo "";};?></td>
				<td align="center"><?php if($data['smb_tv']==1){ echo "<img src='ceklist.png' width='20' height='20'>";}else{echo "";};?></td>
				<td align="center"><?php if($data['smb_dok']==1){ echo "<img src='ceklist.png' width='20' height='20'>";}else{echo "";};?></td>
				<td><?php echo $data['smb_ket'];?></td>
			</tr>

		<?php 
			}

		?>
		</tbody>
	</table>
</form>
	 <button type="submit" id="btncetak" name="btncetak" class="btn btn-warning">Cetak</button>
</div>
</body>
</html>






