<?php
session_start();
include "zq-koneksi.php";

//echo '<script>alert('.$_SESSION['jnsbpr'].');</script>';  
//echo '<script>alert('.$_SESSION['blnlap'].');</script>';  



//if (isset($_GET['btnback'])){
//  echo '<script>window.location.href = "lap-rutin.php";</script>';  
//}

//if (isset($_GET['btncetak'])){
 // echo '<script>window.print();</script>';  
//}

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
              <h5 class="card-title">Daftar Member</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sandi Bank</th>
                    <th scope="col">Nama Bank</th>
                    <th scope="col">Nama PIC</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              
              $result = mysqli_query($connection, "select * from tbl_pakai order by id");
               $n=0;
              while($data=mysqli_fetch_array($result)){

             
              $n++;
              $id=sha1($data['id'].'elaporan');
              ?>
                  <tr>
                    <th scope="row"><?php echo $n;?></th>
                    <td> <?php echo $data['kode'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['nmpic']?></td>
                    <td><?php if($data['aktif']=='0'){echo "Belum Aktif";}else{echo "Aktif";}?></td>
                    <td><?php if ($data['aktif']=='0'){ echo "<span class='badge bg-warning'><a href='aktivasi.php?tokenid=".$id."'>Aktivasi</a></span>";} else {echo '';} ?></td>
                  </tr>
                <?php 
                 
                  }
                ?>
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                 
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