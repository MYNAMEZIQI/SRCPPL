<?php
include "zq-koneksi.php";
$id_aspek=$_GET['aspek'];
$id_variabel=$_GET['variabel'];
$id_indikator=$_GET['indikator'];

//ambil data aspek
$query=mysqli_query($connection,"select * from tbl_aspek where sha1(id)='$id_aspek'");
$data1=mysqli_fetch_array($query);

//ambil data variabel
$query=mysqli_query($connection,"select * from tbl_variabel where sha1(id)='$id_variabel'");
$data2=mysqli_fetch_array($query);

//ambil data indikator

$query=mysqli_query($connection,"select * from tbl_indikator where sha1(id)='$id_indikator'");
$data3=mysqli_fetch_array($query);


if (isset($_GET['btnsimpan'])){

include "simpan-idi.php";
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
          <li class="breadcrumb-item">Indikator Demokrasi Indonesia</li>
          <li class="breadcrumb-item active">Input Perolehan Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input Perolehan Data</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" novalidate>

               <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Aspek</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbaspek" name="cmbaspek" disabled>
                     <option value="" ><?php echo $data1['nama'];?></option>
                    </select>
                    <div class="invalid-feedback">Aspek Tidak Boleh Kosong</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Variabel</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbvar" name="cmbvar" disabled>
                     <option value="" ><?php echo $data2['nama'];?></option>
                    </select>
                    <div class="invalid-feedback">Variabel Tidak Boleh Kosong</div>
                  </div>
                </div>

              <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Indikator</label>
                  <div class="col-sm-10" >
                    <select class="form-select" aria-label="Default select example" id="cmbindi" name="cmbindi" disabled>
                     <option value="" ><?php echo $data3['nama'];?></option>
                    </select>
                    <div class="invalid-feedback">Indikator Tidak Boleh Kosong</div>
                  </div>
                </div>

              


                

                <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">SUMBER DATA</label>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-10">
                     <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="smb_surat" name="smb_surat">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Surat Kabar</label>
                    </div>
                  </div>

                  <div class="col-sm-10">
                     <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="smb_tv" name="smb_tv">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Televisi</label>
                    </div>

                  </div>

                  <div class="col-sm-10">
                     <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="smb_dok" name="smb_dok">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Dokumen</label>
                    </div>
                  </div>
                </div>
 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Ket. Sumber Data</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ketsumber" name="ketsumber" required value="">
                    <div class="invalid-feedback">Tidak Boleh Kosong</div>
                  </div>
                </div>

               <div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">DATA KUANTITATIF</label>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Surat Kabar</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="tstsurat" name="txtsurat" required value="0" min="0">
                    <div class="invalid-feedback">Isian Tidak Diijinkan</div>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Televisi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="txttv" name="txttv" required value="0" min="0">
                    <div class="invalid-feedback">Isian Tidak Diijinkan</div>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Dokumen</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="txtdoc" name="txtdoc" required value="0" min="0">
                    <div class="invalid-feedback">Isian Tidak Diijinkan</div>
                  </div>
                </div>

<div class="row mb-3">
                  <label for="col-sm-2 col-form-label" class="col-sm-2 col-form-label">DATA KUALITATIF</label>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Focus Group Discussion</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="tfgd" name="tfgd" required value="0" min="0">
                    <div class="invalid-feedback">Isian Tidak Diijinkan</div>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Wawancara Mendalam</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="tedd" name="tedd" required value="0" min="0">
                    <div class="invalid-feedback">Isian Tidak Diijinkan</div>
                  </div>
                </div>
            

                 

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-primary">Simpan</button> -
                    <button type="reset" id="btnbatal" name="btnbatal" class="btn btn-warning">Reset</button>
                  </div>

                    
                  
                </div>

<div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="aspek" name="aspek" required value="<?php echo sha1($data1['id']);?>">
                    <div class="invalid-feedback">ASpek</div>
                  </div>
                </div>

                 <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="variabel" name="variabel" required value="<?php echo sha1($data2['id']);?>">
                    <div class="invalid-feedback">Variabel</div>
                  </div>
                </div>

               <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="indikator" name="indikator" required value="<?php echo sha1($data3['id']);?>">
                    <div class="invalid-feedback">Indikator</div>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="txtindi" name="txtindi" required value="<?php echo $data3['id'];?>">
                    <div class="invalid-feedback">Indikator</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="txtvar" name="txtvar" required value="<?php echo $data2['id'];?>">
                    <div class="invalid-feedback">Variabel</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="txtaspek" name="txtaspek" required value="<?php echo $data1['id'];?>">
                    <div class="invalid-feedback">ASpek</div>
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
