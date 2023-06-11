<?php
session_start();
include "zq-koneksi.php";

    
    $email=$_GET['txtemail'];
    $nmuser=$_GET['txtnamauser'];
    $passwdapp=md5($_GET['txtpassword']);
    $dati=$_GET['txtdati'];

$result = mysqli_query($connection, "insert into tbl_pemakai (email,nmuser,paswdapp,dati) values ('$email','$nmuser','$passwdapp','$dati')");

if ($result){
echo '<script>window.location.href = "input-user.php";</script>';  
}

//echo '<script>alert("'.$error.'")</script>';
 

?>
