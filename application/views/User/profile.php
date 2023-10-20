<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('User/_partials/Head.php') ?>

<body>
<?php $this->load->view('User/_partials/Header') ?>
<?php $this->load->view('User/_partials/Sidebar') ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="http://cdn.onlinewebfonts.com/svg/img_568657.png" alt="Profile" class="rounded-circle">
          <h2><?php echo $this->session->userdata('nama') ?></h2>
          <h3><?php echo $this->session->userdata('jabatan') ?></h3>
          <div class="social-links mt-2">
           
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">NIP</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('NIP') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('nama') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis kelamin</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('jenis_kelamin') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tempat, Tanggal lahir</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('ttl') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No HP</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('no_hp') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('alamat') ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jabatan</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('jabatan') ?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Divisi</div>
                <div class="col-lg-9 col-md-8"><?php echo $this->session->userdata('divisi') ?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
             

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

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