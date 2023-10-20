<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Admin/_partials/Head.php') ?>

<body>
<?php $this->load->view('Admin/_partials/Header') ?>
<?php $this->load->view('Admin/_partials/Sidebar') ?>
  <main id="main" class="main">

   

  <div class="pagetitle">
      <h1>Edit Data user</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data user</a></li>
          <li class="breadcrumb-item active">Edit Data user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data user</h5>
              <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
<?php echo validation_errors(); ?>
              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data"> 
                <div class="row mb-3">
                  <label for="NIP" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" name="NIP" value="<?php echo $user->NIP ?>">
                    <div class="invalid-feedback"><?php echo form_error('NIP')?></div>
                  </div>
                </div>
                <div class="row mb-3">
                   <label for="nama" class="col-sm-2 col-form-label">nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama" value="<?php echo $user->nama ?>">
                    <div class="invalid-feedback">
                  <?php echo form_error('nama') ?>
                  </div>
                </div>
                </div>
                <fieldset class="row mb-3">
                   <legend for="jenis_kelamin" class="col-sm-2 col-form-label">jenis kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" <?php if($user->jenis_kelamin == "L"){echo "checked";} ?> >
                    <label class="form-check-label">Laki - Laki</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" <?php if($user->jenis_kelamin == "P"){echo "checked";} ?> >
                    <label class="form-check-label">Perempuan</label>
                  </div>
                  </div>
                </fieldset>

                 <div class="row mb-3">
                   <label for="ttl" class="col-sm-2 col-form-label">TTL </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id ="ttl" name="ttl" value="<?php echo $user->ttl ?>">
                </div>
            
              </div>
               
                 <div class="row mb-3">
                  <label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp" value="<?php echo $user->no_hp ?>">
                    <div class="invalid-feedback"><?php echo form_error('no_hp') ?></div>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" value="<?php echo $user->alamat ?>">
                    <div class="invalid-feedback"><?php echo form_error('alamat') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>" name="jabatan" value="<?php echo $user->jabatan ?>">
                    <div class="invalid-feedback"><?php echo form_error('jabatan') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('divisi') ? 'is-invalid':'' ?>" name="divisi" value="<?php echo $user->divisi ?>">
                    <div class="invalid-feedback"><?php echo form_error('divisi') ?></div>
                  </div>
                 
                </div>
               
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form>
             

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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