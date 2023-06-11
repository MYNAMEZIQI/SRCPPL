<?php
include "zq-koneksi.php";

if (isset($_GET['btnsimpan'])){

include "simpan-dati.php";
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
          <li class="breadcrumb-item active">Input DATI</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input DATI</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" id="form-dati" novalidate>
                <!-- <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kode :</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="txtkode" name="txtkode" required>
                        <div class="invalid-feedback">Kode</div>
                    </div>
                </div> -->
                <input type="hidden" class="form-control" id="txtid" name="txtid">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txtNama" name="txtNama" required>
                        <div class="invalid-feedback">Nama</div>
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-primary btn-sm">Simpan</button> 
                    <button type="reset" id="btnbatal" name="btnbatal" class="btn btn-warning btn-sm">Reset</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
              <div>Daftar Dati</div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
            <?php
              
              $result = mysqli_query($connection, "select id,kode, nama from tbl_dati ORDER BY id");
            //   var_dump($connection); 
            //   die; 
              $n=0;
              while($data=mysqli_fetch_array($result)){
              $n++;
            ?>
               <tr>
                    <th scope="row"><?php echo $n;?></th>
                    <td> <?php echo $data['kode'] ;?></td>
                    <td> <?php echo $data['nama'] ; ?></td>
                    <td><span class="btn badge bg-danger btnEdit" data-nama="<?php echo $data['nama'] ; ?>" data-id="<?php echo $data['id'];?>">Edit</span>|<span class="badge bg-warning"><a href="delete_dati.php?id=<?php echo $data['id'];?>">Hapus</a></span></td>
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

<script>
$( document ).ready(function() {
    // console.log( "ready!" );
    $(document).on("click", ".btnEdit", function(e){
        var id = $(this).data("id"); 
        var nama = $(this).data("nama"); 
        console.log(id); 
        $("#txtid").val(id); 
        $("#txtNama").val(nama); 
    }); 
    $(document).on("click", "#btnbatal", function(e){
        $("#txtid").val(''); 
    }); 
});
</script>


</body>

</html>
