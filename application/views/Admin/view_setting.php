<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Admin/_partials/Head.php') ?>

<body>
<?php $this->load->view('Admin/_partials/Header') ?>
<?php $this->load->view('Admin/_partials/Sidebar') ?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Setting</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Setting</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">

<!-- Card with an image on top -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-center">Reset No Urut</h5>
    <p>NO Urut saat ini :</p>
    <h3><?php echo $ini->nomor_surat ?></h3>
    <div class="card-footer"> <a href="" class="btn btn-success"  data-bs-toggle="modal" title="Detail data" data-bs-target="#basicModal">Reset</a> </div>
  </div>
</div>
   <!-- Modal untuk upload data -->
   <div class="modal fade" id="basicModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Upload data nomor urut </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo site_url('Admin/Reset') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Apakah anda yakin ingin mereset no urut?</div>
                      <input type="hidden" name="nomor_surat" value="0">
                      

                    </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" >Save</button>
                      
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal untuk upload data-->
  
  </main><!-- End #main -->
 
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->

 
</script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/chart.js/chart.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/quill/quill.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?php echo base_url('NiceAdmin/assets/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('NiceAdmin/assets/js/main.js') ?>"></script>

</body>

</html>