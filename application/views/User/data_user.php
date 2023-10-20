<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Admin/_partials/Head.php') ?>

<body>
<?php $this->load->view('Admin/_partials/Header') ?>
<?php $this->load->view('Admin/_partials/Sidebar') ?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center" >Data User</h5>
             <a href="<?php echo site_url('Admin/tambahuser'); ?>" class="btn btn-success"  type="button">Tambah <i class="ri-add-circle-line"></i></a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    
                    <th>Jabatan</th>
                    <th>Hak Akses</th>
           
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($user as $user): $i++ ?>
                  <tr>
                    <td>
                      <?php echo $i?>
                    </td>
                    <td>
                      <?php echo $user->NIP?>
                    </td>
                    <td>
                      <?php echo $user->nama ?>
                    </td>
                      <td>
                      <?php echo $user->jabatan ?>
                    </td>
                    
                    <td>            
                        <?php echo $user->hak_akses ?>
                    </td>
                   
                    <td>
                      <a href="<?php echo site_url('Admin/edituser/'.$user->NIP);?>" class="btn btn-small"><i class="ri-pencil-fill"></i></a>
                      <a href="<?php echo site_url('Admin/deleteuser/'.$user->NIP);?>" class="btn btn-small" ><i class="ri-delete-bin-6-line"></i></a>
                      <button class="btn btn-small" data-bs-toggle="modal" data-bs-target="#basicModal<?php echo $user->NIP ?>"><i class="ri-eye-line"></i></button>
                    </td>
            
                    
                  </tr>
                  <!-- Basic Modal -->
              <div class="modal fade" id="basicModal<?php echo $user->NIP ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Detail data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <div class="row">
                <div class="col-lg-3 col-md-4 label ">NIP</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->NIP ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nama</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->nama ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis kelamin</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->jenis_kelamin ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tempat, Tanggal lahir</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->ttl ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No HP</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->no_hp ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->alamat ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jabatan</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->jabatan ?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Divisi</div>
                <div class="col-lg-9 col-md-8"><?php echo $user->divisi ?></div>
              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
            
                  <?php endforeach; ?>
                
                </tbody>
              </table>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  
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