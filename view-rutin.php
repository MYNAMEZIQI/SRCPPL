<?php
include "zq-koneksi.php";
session_start();
//echo '<script>alert('.$_SESSION['jnsbpr'].');</script>';  
//echo '<script>alert('.$_SESSION['blnlap'].');</script>';  

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
  <?php
  include "zq-meta.php";
  ?>
</head>

<body>

  <?php
 include "zq-header.php";
 include "zq-menu.php";
 ?>

  <main id="main" class="main">

    

    <section class="section">
      <div class="row">
       

        <div class="col-lg-12">
<form>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nama BPR : <?php echo $_SESSION['namabank'];?> <br> Jenis Laporan BPR : <?php if($jnsbpr=='1'){ echo "Konvensional";} else { echo "Syariah";}?> Bulan : <?php echo $blnlap;?></h5>

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
                    <th scope="col">Aksi</th>
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
                    <td><span class="badge bg-warning"><a href="">kerjakan</a></span></td>
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

            </div>
          </div>


 </div>            
 </form>       
        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php
  include "zq-footer.php";
  ?>
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