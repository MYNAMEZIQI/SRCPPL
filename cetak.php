<?php

require('fpdf/fpdf.php');
include "zq-koneksi.php";
$pdf = new FPDF('L','mm','Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(350,10,'Perolehan Sumber Data Kuantitatif Aspek Kebebasan Sipil',0,1,'C');
$pdf->Cell(75,6,'Aspek',1,0,'C');
$pdf->Cell(85,6,'Variabel',1,0,'C');
$pdf->Cell(95,6,'Indikator',1,0,'C');
$pdf->Cell(60,6,'Sumber Data Kuantitatif',1,0,'C');
$pdf->Cell(25,6,'Keterangan',1,1,'C');
$pdf->Cell(15,6,'No',1,0,'C');
$pdf->Cell(35,6,'Keterangan',1,0,'C');
$pdf->Cell(15,6,'No',1,0,'C');
$pdf->Cell(70,6,'Keterangan',1,0,'C');
$pdf->Cell(15,6,'No',1,0,'C');
$pdf->Cell(80,6,'Keterangan',1,0,'C');
$pdf->Cell(20,6,'Surat Kabar',1,0,'C');
$pdf->Cell(20,6,'Televisi',1,0,'C');
$pdf->Cell(20,6,'Dokumen',1,0,'C');
$pdf->Cell(25,6,'	',1,1,'C');


$result = mysqli_query($connection, "SELECT a.nama aspek ,SUBSTR(a.kode,2,2) kds,v.nama variabel ,SUBSTR(v.kode,2,2) kdv,i.nama indikator ,SUBSTR(i.kode,2,2) kdi,i.id id_indi ,a.id id_aspek ,v.id id_var,smb_surat,smb_tv,smb_dok,ket
FROM tbl_aspek a,tbl_variabel v,tbl_indikator i,tbl_idi
WHERE id_variabel=v.id AND v.id_aspek=a.id AND i.id=id_indikator and oprdata<>'D' ORDER BY i.id
");
$n=0;
while($data=mysqli_fetch_array($result)){
$n++;
$cellWidth=80; //lebar sel
$cellHeight=5; //tinggi sel satu baris normal
//periksa apakah teksnya melibihi kolom?
	if($pdf->GetStringWidth($data['indikator']) < $cellWidth){
		//jika tidak, maka tidak melakukan apa-apa
		$line=1;
	}else{
		//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
		//dengan memisahkan teks agar sesuai dengan lebar sel
		//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
		$textLength=strlen($data['indikator']);	//total panjang teks
		$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
		$startChar=0;		//posisi awal karakter untuk setiap baris
		$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
		$textArray=array();	//untuk menampung data untuk setiap baris
		$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
		
		while($startChar < $textLength){ //perulangan sampai akhir teks
			//perulangan sampai karakter maksimum tercapai
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($data['indikator'],$startChar,$maxChar);
			}
			//pindahkan ke baris berikutnya
			$startChar=$startChar+$maxChar;
			//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
			array_push($textArray,$tmpString);
			//reset variabel penampung
			$maxChar=0;
			$tmpString='';
			
		}
		//dapatkan jumlah baris
		$line=count($textArray);
	}





$pdf->Cell(15,($line * $cellHeight),$data['kds'],1,0,'C');
$pdf->Cell(60,($line * $cellHeight),$data['aspek'],1,0,'J');
$pdf->Cell(15,($line * $cellHeight),$data['kdv'],1,0,'C');
$pdf->Cell(70,($line * $cellHeight),$data['variabel'],1,0,'J');
$pdf->Cell(15,($line * $cellHeight),$data['kdi'],1,0,'C');

//memanfaatkan MultiCell sebagai ganti Cell
	//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
	//ingat posisi x dan y sebelum menulis MultiCell
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth,$cellHeight,$data['indikator'],1);
//kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
	$pdf->SetXY($xPos + $cellWidth , $yPos);
//$pdf->MultiCell(80,6,$data['indikator'],1,'J',0);
$pdf->Cell(20,($line * $cellHeight),$data['smb_surat'],1,0,'C');
$pdf->Cell(20,($line * $cellHeight),$data['smb_tv'],1,0,'C');
$pdf->Cell(20,($line * $cellHeight),$data['smb_dok'],1,0,'C');
$pdf->multicell(25,15,$data['ket'],1,'L');
}


$pdf->Output();

?>