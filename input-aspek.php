<?php


if (isset($_GET['btnsimpan'])){

include "simpan-aspek.php";
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
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Input Aspek</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input Aspek</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" novalidate>
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Aspek</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnamaaspek" name="txtnamaaspek" required>
                    <div class="invalid-feedback">Nama Aspek</div>
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

Daftar Aspek
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Namas Aspek</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              
              $result = mysqli_query($connection, "select * from tbl_aspek  order by id");
               $n=0;
              while($data=mysqli_fetch_array($result)){

             
              $n++;
              ?>
               <tr>
                    <th scope="row"><?php echo $n;?></th>
                    <td> <?php echo $data['kode'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                     <td><span class="badge bg-danger"><a href="">Edit</a></span>|<span class="badge bg-warning"><a href="">Hapus</a></span></td>
                  </tr>
               <?php 
                 
                  }
                ?>
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
