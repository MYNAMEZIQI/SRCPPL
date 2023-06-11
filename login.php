<?php
//'#001 User Belum Aktif';
//'#002 User atau Password Salah'
//'#003 Status User'
//'#404 Halaman Tidak Ditemukan'
session_start();
include "zq-koneksi.php";
include "genchapcha.php";
if (isset($_SESSION['namauser'])){
   $_SESSION['kdpesan']='#004';
             $_SESSION['pesan']='Anda Sudah Login, Untuk memulai Login kembali silakan Log Out terlebih dahulu';
             $_SESSION['callback']='index.php';
           echo '<script>window.location.href = "pages-error.php";</script>'; 
}

if (isset($_GET['login'])){
$kodesaya=$_GET['username'];
$password=md5($_GET['password']);
$Verify=$_GET['txtCapcha'];

// var_dump($Verify); 
// var_dump($_SESSION["captcha"]); 
// die; 

//echo '<script>alert('.$kodesaya.');</script>';
//echo '<script>alert(a);</script>';
      $result = mysqli_query($connection, "select count(*) jml from tbl_pemakai where email='$kodesaya' and passwdapp='$password'");
      $data=mysqli_fetch_array($result);
      if ($result){
        if ($data['jml']==1){
           $query=mysqli_query($connection,"select * from tbl_pemakai where email='$kodesaya'");
           $data2=mysqli_fetch_array($query);
          
            $_SESSION['namauser']=$data2['nmuser'];
            $_SESSION['dati']=$data2['dati'];
            $_SESSION['email']=$data2['email'];
            if($Verify == $_SESSION["captcha"]) {
              echo '<script>window.location.href = "index.php";</script>'; 

            }else {
              $_SESSION['kdpesan']='#002';
              $_SESSION['pesan']='Invalid captcha';
              $_SESSION['callback']='out.php';
              echo '<script>window.location.href = "pages-error.php";</script>';  
              // session_start();
              // session_destroy();
            
            }
          }else{
            $_SESSION['kdpesan']='#002';
             $_SESSION['pesan']='User atau Password Tidak Sesuai';
             $_SESSION['callback']='login.php';
           echo '<script>window.location.href = "pages-error.php";</script>';  
            
          }

      }else{
         $_SESSION['kdpesan']='#404';
         $_SESSION['pesan']='Ops!!! Halaman Tidak Ditemukan';
        echo '<script>window.location.href = "pages-error.php";</script>';  
      
      }


//echo '<script>alert('.$tes.');</script>';
//include "simpan-input-laporan.php";
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

  <main>
    <div class="container">


      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Aplikasi Index Demokrasi Indonesia</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Masukan Username & Password Untuk Login</p>
                  </div>
                


                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required placeholder="Username">
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required placeholder="Password">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12" align="justify-content-center" style="text-align: center;">
                      
                    <?php
                     $PHPCAP->prime();
                      $PHPCAP->draw();
                    ?>
                   
                    </div>
                    <div class="col-12">
                      <!-- <label for="yourPassword" class="form-label"></label> -->
                      <input type="text" name="txtCapcha" class="form-control" id="txtCapcha" required placeholder="captcha!">
                      <div class="invalid-feedback">Please enter captcha!</div>
                    </div>



                    <!--<div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" id="login" name="login">Login</button>
                    </div>
                   <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>-->
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
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