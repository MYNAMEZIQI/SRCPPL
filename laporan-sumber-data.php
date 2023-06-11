<?php

session_start();
$dati=$_SESSION['dati'];

if (isset($_GET['btnsimpan'])){
$_SESSION['aspek']=$_GET['cmbaspek'];
echo '<script>window.location.href="report/lap-sumber-idi.php";</script>';

//include "report/lap-sumber-idi.php";
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

    <div class="pagetitle">
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Sumber Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Sumber Data <?php echo $dati;?></h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" novalidate>

               <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Nama Aspek</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbaspek" name="cmbaspek" required>
                     <option value="" >-Pilih Salah Satu-</option>
                     <?php
                      $result = mysqli_query($connection, "select * from tbl_aspek  order by id");
                      while($data2=mysqli_fetch_array($result)){
                        ?>
                      <option value="<?php echo $data2['id'];?>" ><?php echo $data2['nama'];?></option>
                      <?php
                      }
                      ?>

                    </select>
                    <div class="invalid-feedback">Aspek Tidak Boleh Kosong</div>
                  </div>
                </div>
 

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-primary">Tampilkan</button> -
                    <button type="reset" id="btnbatal" name="btnbatal" class="btn btn-warning">Reset</button>
                  </div>

                    
                  
                </div>

              </form><!-- End General Form Elements -->
                </tbody>
              </table>
            </div>
          </div>

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
