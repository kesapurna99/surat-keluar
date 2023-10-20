<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Admin/_partials/Head.php') ?>

<body>
<?php $this->load->view('Admin/_partials/Header') ?>
<?php $this->load->view('Admin/_partials/Sidebar') ?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Input Data user</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Data user</a></li>
          <li class="breadcrumb-item active">Input Data user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data user</h5>
              <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          
        </div>
        <?php endif; ?>
<?php echo validation_errors(); ?>
              <!-- General Form Elements -->
              <form action="<?php echo site_url('Admin/tambahuser') ?>" method="post" enctype="multipart/form-data" > 
                <div class="row mb-3">
                  <label for="NIP" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('NIP') ? 'is-invalid':'' ?>" name="NIP">
                    <div class="invalid-feedback"><?php echo form_error('NIP') ?></div>
                  </div>
                </div>
                
                <div class="row mb-3">
                   <label for="nama" class="col-sm-2 col-form-label">nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama">
                    <div class="invalid-feedback">
                  <?php echo form_error('nama') ?>
                  </div>
                </div>
                
                </div>
                <div class="row mb-3">
                  <label for="NIP" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" name="password">
                    <div class="invalid-feedback"><?php echo form_error('pasword') ?></div>
                  </div>
                </div>
                <fieldset class="row mb-3">
                   <legend for="jenis_kelamin" class="col-sm-2 col-form-label">jenis kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L">
                    <label class="form-check-label">Laki - Laki</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P">
                    <label class="form-check-label">Perempuan</label>
                  </div>
                  </div>
                </fieldset>

                 <div class="row mb-3">
                   <label for="ttl" class="col-sm-2 col-form-label">Tempat tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id ="ttl" name="ttl" >
                </div>
              </div>
            
                 <div class="row mb-3">
                  <label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp">
                    <div class="invalid-feedback"><?php echo form_error('no_hp') ?></div>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="textarea" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat">
                    <div class="invalid-feedback"><?php echo form_error('alamat') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>" name="jabatan">
                    <div class="invalid-feedback"><?php echo form_error('jabatan') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('divisi') ? 'is-invalid':'' ?>" name="divisi">
                    <div class="invalid-feedback"><?php echo form_error('divisi') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="hak_akses" class="col-sm-2 col-form-label">Hak Akses</label>

                  <div class="col-sm-10">
                     <select class="form-select" aria-label="Default select example" name="hak_akses">
                     <option selected value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                    <div class="invalid-feedback"><?php echo form_error('hak_akses') ?></div>
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
<?php $this->load->view('Admin/_partials/Footer') ?>

</body>

</html>