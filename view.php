<?php
include "zq-koneksi.php";

session_start();

 
 $jnsbpr=$_SESSION['jnsbpr'];
$blnlap=$_SESSION['blnlap'];

if (isset($_GET['btnback'])){
  echo '<script>window.location.href = "lap-rutin.php";</script>';  
}

if (isset($_GET['btncetak'])){
  echo '<script>window.print();</script>';  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Error</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">

             <h5 class="card-title">Jenis Laporan BPR : <?php if($jnsbpr=='1'){ echo "Konvensional";} else { echo "Syariah";}?> Bulan : <?php echo $blnlap;?> </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Regulasi</th>
                    <th scope="col">Tujuan Laporan</th>
                    <th scope="col">Batas Laporan</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Status Laporan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              
              $result = mysqli_query($connection, "select * from tbl_laporan where jnsbpr='$jnsbpr' and blnlap='$blnlap' order by id");
               $n=0;
              while($data=mysqli_fetch_array($result)){

             
              $n++;
              ?>
                  <tr>
                    <th scope="row"><?php echo $n;?></th>
                    <td> <?php echo $data['namalap'] ?></td>
                    <td><?php echo $data['namaregulasi'] ?></td>
                    <td><?php echo $data['tujuanlap'] ?></td>
                    <td><?php echo $data['bataslap'] ?></td>
                    <td><?php echo $data['tggjawab'] ?></td>
                    <td><?php if ($data['statuslap']=='1'){ echo '<span class="badge bg-success">Online</span>';} else {echo '<span class="badge bg-danger">Offline</span>';} ?></td>
                  </tr>
                <?php 
                 
                  }
                ?>
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" id="btnback" name="btnback" class="btn btn-primary">Kembali</button> -
                    <button type="submit" id="btncetak" name="btncetak" class="btn btn-warning">Cetak</button>
                  </div>


      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>