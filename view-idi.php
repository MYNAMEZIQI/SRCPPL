<?php

session_start();
$dati=$_SESSION['dati'];
if (isset($_GET['btnsimpan'])){

include "simpan-indikator.php";
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
             
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Aspek</th>
                    <th scope="col"></th>
                    <th scope="col">Variabel</th>
                    <th scope="col"></th>
                    <th scope="col">Indikator</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              
              $result = mysqli_query($connection, "sELECT a.nama aspek ,substr(a.kode,2,2) kds,v.nama variabel ,substr(v.kode,2,2) kdv,i.nama indikator ,substr(i.kode,2,2) kdi,i.id id_indi ,a.id id_aspek ,v.id id_var
FROM tbl_aspek a,tbl_variabel v,tbl_indikator i
WHERE id_variabel=v.id AND id_aspek=a.id order by i.id
");
               $n=0;
              while($data=mysqli_fetch_array($result)){

             $src_idi=$data['kdi'];
              $n++;
              ?>
               <tr>
                    <th scope="row"><?php echo $n;?></th>
                    <td scope="row"> <?php echo $data['kds'] ?></td>
                    <td scope="row"> <?php echo $data['aspek'] ?></td>
                    <td scope="row"> <?php echo $data['kdv'] ?></td>
                    <td scope="row"><?php echo $data['variabel'] ?></td>
                    <td scope="row"> <?php echo $data['kdi'] ?></td>
                    <td scope="row"><?php echo $data['indikator'] ?></td>
                    <?php 
                    $result2=mysqli_query($connection,"select count(*) jml from tbl_idi where oprdata<>'D' and id_indikator='$src_idi' and dati='$dati'");
                     $data2=mysqli_fetch_array($result2);
                    ?>
                    <?php
                    if ($data2['jml']==0){


                    ?>
                    <td scope="row"><span class="badge bg-warning"><a href="input-idi.php?aspek=<?php echo sha1($data['id_aspek']);?>&variabel=<?php echo sha1($data['id_var']);?>&indikator=<?php echo sha1($data['id_indi']);?>">Input</a></span></td>
                    <?php 
                      }else {
                    ?>
 <td scope="row"><span class="badge bg-info"><a href="ubah-idi.php?aspek=<?php echo sha1($data['id_aspek']);?>&variabel=<?php echo sha1($data['id_var']);?>&indikator=<?php echo sha1($data['id_indi']);?>">Ubah</a></span>|<span class="badge bg-danger"><a href="hapus-idi.php?indikator=<?php echo sha1($data['id_indi']);?>">Hapus</a></span></td>

<?php }?>

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
