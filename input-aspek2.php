<?php

if (isset($_GET['btnsimpan'])){

include "simpan-input-laporan.php";
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
      <h1>Form Input</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Input Aspek</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rutin</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" novalidate>
              <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Jenis BPR</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbjnsbpr" name="cmbjnsbpr" required>
                     <option value="" <?php if($_SESSION['jenisbank']==' '){ echo "selected";}else{ echo "";}?>>-Pilih Salah Satu-</option>
                      <option value="1" <?php if($_SESSION['jenisbank']=='1'){ echo "selected";}else{ echo "";}?>>Konvensional</option>
                      <option value="2" <?php if($_SESSION['jenisbank']=='2'){ echo "selected";}else{ echo "";}?>>Syariah</option>
                    </select>
                    <div class="invalid-feedback">Jenis BPR Tidak Boleh Kosong</div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Laporan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnamalap" name="txtnamalap" required>
                    <div class="invalid-feedback">Nama Laporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Regulasi/Dasar Pelaporan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" id="txtregulasi" name="txtregulasi" required></textarea>
                    <div class="invalid-feedback">Regulasi/Dasar Pelaporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan Pelaporan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txttujuanlap" name="txttujuanlap" required>
                    <div class="invalid-feedback">Tujuan Pelaporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Batas Pelaporan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" id="txtbtslap" name="txtbtslap" required></textarea>
                    <div class="invalid-feedback">Batas Pelaporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Penaggung Jawab Pelaporan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txttgglap" name="txttgglap" required>
                    <div class="invalid-feedback">Penanggung Jawab Laporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Bulan Pelaporan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="cmbbulan" name="cmbbulan" required>
                      <option value="">-Pilih Salah Satu-</option>
                      <?php
                        for ($x = 1; $x <= 12; $x++) {

                        echo "<option value=".$x.">".$x."</option>";
                      }
                      ?>

                      
                    </select>
                    <div class="invalid-feedback">Bulan Laporan Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status Pelaporan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="cmbstatus" name="cmbstatus" required>
                      <option value="">-Pilih Salah Satu-</option>
                       <option value="1">Online</option>
                      <option value="2">Offline</option>
                    </select>
                    <div class="invalid-feedback">Status Laporan Tidak Boleh Kosong</div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-primary">Simpan</button> -
                    <button type="reset" id="btnbatal" name="btnbatal" class="btn btn-warning">Reset</button>
                  </div>

                    
                  
                </div>

              </form><!-- End General Form Elements -->

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
