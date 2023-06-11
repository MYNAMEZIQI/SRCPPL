<?php
//session_start();
 
           // echo '<script>window.location.href = "pages-error.php";</script>';  

if (isset($_GET['btnsimpan'])){

include "simpan-input-member.php";
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
      <h1>Form Input Member</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Daftar Member</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Member</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" novalidate>
              <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Jenis BPR</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbjnsbpr" name="cmbjnsbpr" required>
              
                      <option value="" selected>-Pilih Salah Satu-</option>
                      <option value="1">Konvensional</option>
                      <option value="2">Syariah</option>
                        

                     
                    </select>
                    <div class="invalid-feedback">Jenis BPR Tidak Boleh Kosong</div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Sandi BPR (9 Digit)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtsandi" name="txtsandi" maxlength="9"  required>
                    <div class="invalid-feedback">Sandi BPR Tidak Boleh Kosong</div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama BPR</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnama" name="txtnama" required>
                    <div class="invalid-feedback">Nama BPR Tidak Boleh Kosong</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama PIC</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtpic" name="txtpic" required>
                    <div class="invalid-feedback">Nama PIC Tidak Boleh Kosong</div>
                  </div>
                </div>
<?php
 $_SESSION['kdpesan']='#005';
              $_SESSION['pesan']='Diminta No.Wa (aktif) karena kami akan mengirimkan data user dan password melalui No.Wa tersebut';
              $_SESSION['callback']='input-member.php';

?>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"><a href="pages-error.php">No.HP PIC ( WA AKTIF ) kenapa diminta no.wa klik saya</a></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtwa" name="txtwa" required>
                    <div class="invalid-feedback">No.HP Tidak Boleh Kosong</div>
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
