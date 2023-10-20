<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('StaffSeksi/_partials/Head.php') ?>

<body>
<?php $this->load->view('StaffSeksi/_partials/Header') ?>
<?php $this->load->view('StaffSeksi/_partials/Sidebar') ?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Input Data Pegawai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Data Pegawai</a></li>
          <li class="breadcrumb-item active">Input Data Pegawai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pegawai</h5>
              <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
          <?php if (isset($error)) : ?>
          <div class="invalid-feedback"><?= $error ?></div>
        <?php endif; ?>
        </div>
        <?php endif; ?>
<?php echo validation_errors(); ?>
              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data"> 

              <div class="row mb-3">
                  <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('jenis_surat') ? 'is-invalid':'' ?>" name="jenis_surat" value="<?php echo $kendali->jenis_surat?>">
                    <div class="invalid-feedback"><?php echo form_error('jenis_surat') ?></div>
                  </div>
                </div>
              <div class="row mb-3">
                   <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                  <div class="col-sm-10">
                  <input type="hidden" name="no_urut" value="<?php echo $kendali->no_urut;?>">
                    <input type="text" class="form-control <?php echo form_error('nomor_surat') ? 'is-invalid':'' ?>" name="nomor_surat" value="<?php echo $kendali->nomor_surat?>">
                    <div class="invalid-feedback"><?php echo form_error('nomor_surat') ?></div>
                  </div>
                </div>       
                 <div class="row mb-3">
                   <label for="indeks" class="col-sm-2 col-form-label">Indeks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('indeks') ? 'is-invalid':'' ?>" id ="indeks" name="indeks" value="<?php echo $kendali->indeks?>">
                    <div class="invalid-feedback"><?php echo form_error('indeks') ?></div>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('kode') ? 'is-invalid':'' ?>" name="kode" value="<?php echo $kendali->kode?>">
                    <div class="invalid-feedback"><?php echo form_error('kode') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('dari') ? 'is-invalid':'' ?>" name="dari" value="<?php echo $kendali->dari?>">
                    <div class="invalid-feedback"><?php echo form_error('dari') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('kepada') ? 'is-invalid':'' ?>" name="kepada" value="<?php echo $kendali->kepada?>">
                    <div class="invalid-feedback"><?php echo form_error('kepada') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="lampiran" class="col-sm-2 col-form-label">Jenis Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('lampiran') ? 'is-invalid':'' ?>" name="lampiran" value="<?php echo $kendali->lampiran?>">
                    <div class="invalid-feedback"><?php echo form_error('lampiran') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="isi_ringkasan" class="col-sm-2 col-form-label">Jenis Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('isi_ringkasan') ? 'is-invalid':'' ?>" name="isi_ringkasan" value="<?php echo $kendali->isi_ringkasan?>">
                    <div class="invalid-feedback"><?php echo form_error('isi_ringkasan') ?></div>
                  </div>
                </div>
                <div class="row mb-3">
                   <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"  id ="tanggal" name="tanggal" value="<?php echo $kendali->tanggal?>">
                    <div class="invalid-feedback"><?php echo form_error('tanggal') ?></div>
                </div>
              </div>
              
               <div class="row mb-3">
                  <label for="pengolah" class="col-sm-2 col-form-label">pengolah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('pengolah') ? 'is-invalid':'' ?>" name="pengolah" value="<?php echo $kendali->pengolah?>">
                    <div class="invalid-feedback"><?php echo form_error('pengolah') ?></div>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="catatan" class="col-sm-2 col-form-label">catatan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control <?php echo form_error('catatan') ? 'is-invalid':'' ?>" name="catatan"><?php echo $kendali->catatan?></textarea>
                    <div class="invalid-feedback"><?php echo form_error('catatan') ?></div>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('klasifikasi') ? 'is-invalid':'' ?>" name="klasifikasi" value="<?php echo $kendali->klasifikasi?>">
                    <div class="invalid-feedback"><?php echo form_error('klasifikasi') ?></div>
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
<?php $this->load->view('StaffSeksi/_partials/Footer') ?>

</body>

</html>       