<?php

function kirim_pesan($notujuan,$pesan){
//error_reporting(0);
//include "pgkoneksi.php";

$no_hp = $notujuan;//081234567890'; // No.HP yang dikirim (No.HP Penerima)
$pesan =$pesan;
//$idpesan=$_GET['idsaya'];



$api_key   = '84f0cad348686ac60c29f431e5281cb9bc16fe87'; // API KEY Anda
$id_device = '1341'; // ID DEVICE yang di SCAN (Sebagai pengirim)
$url   = 'https://api.watsap.id/send-message'; // URL API

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_POST, 1);

$data_post = [
   'id_device' => $id_device,
   'api-key' => $api_key,
   'no_hp'   => $no_hp,
   'pesan'   => $pesan
];
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
$tes = json_decode($response);
$kode_respon=$tes->kode;

if ($kode_respon==200){
   $status_kirim=$tes->message->status;
}elseif($kode_respon==400){
   $status_kirim=$tes->message;
}elseif($kode_respon==401){
   $status_kirim=$tes->message;
}elseif ($kode_respon==402) {
   $status_kirim=$tes->message;
}elseif ($kode_respon==403) {
   $status_kirim=$tes->message;
}elseif ($kode_respon==404) {
   $status_kirim=$tes->message;
}elseif ($kode_respon==405) {
   $status_kirim=$tes->message;
}elseif ($kode_respon==406) {
   $status_kirim=$tes->message;
}else{
   $status_kirim=$tes->message;
}
//if ($kode_respon==200){
//$update=pg_query("update tagihan set stskrm='$status_kirim',cek='Y' where id_urut='$idpesan'");
//}else{
//$update=pg_query("update tagihan set stskrm='$status_kirim' where id_urut='$idpesan'");
//}


}


?>
