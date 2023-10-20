<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('KasubagTU/_partials/Head.php') ?>

<body>
<?php $this->load->view('KasubagTU/_partials/Header') ?>
<?php $this->load->view('KasubagTU/_partials/Sidebar') ?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Tambah Hak Akses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Hak Akses</a></li>
          <li class="breadcrumb-item active">Tambah Hak akses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Hak Akses</h5>
              <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
<?php echo validation_errors(); ?>
              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data"> 
              <input type="hidden" value="<?php echo $hakakses->id_user?>" name="id_user">
                      <div class="row mb-3">
                       <label class="col-sm-2 col-form-label">NIP</label>
                       <div class="col-sm-10">
                         <input type="readonly" readonly class="form-control"  name="NIP" value="<?php echo $hakakses->NIP ?>">
                      </div>
                      </div>
                      <div class="row mb-3">
                       <label class="col-sm-2 col-form-label">Password</label>
                       <div class="col-sm-10">
                         <input type="readonly" readonly class="form-control"  name="password" value="<?php echo $hakakses->NIP ?>">
                      </div>
                   </div>
                   <div class="row mb-3">
                  <label for="hak_akses" class="col-sm-2 col-form-label">Hak Akses</label>
                  <div class="col-sm-10">
                     <select class="form-select" aria-label="Default select example" name="hak_akses">
                      <option value="1">Kepala Kantor</option>
                      <option value="2">Kasubag TU</option>
                      <option selected value="3">Staff TU</option>
                      <option value="4">Kepala Seksi</option>
                      <option value="5">Staff Seksi</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form>
             

  </main><!-- End #main -->
<?php $this->load->view('KasubagTU/_partials/Footer') ?>

</body>

</html>