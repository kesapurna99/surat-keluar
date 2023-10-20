<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Admin/_partials/Head.php') ?>
<body>
<?php $this->load->view('Admin/_partials/Header') ?>
<?php $this->load->view('Admin/_partials/Sidebar') ?>

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kendalli Surat</h5>

             <div class="row mb-3">
             </div>
             <div class="row justify-content-end">
             <div class="col-md-5">
              <a href="<?php echo site_url('Admin/tambahkendalisurat'); ?>" class="btn btn-primary"  type="button">Tambah <i class="ri-add-circle-line"></i></a>
              </div>
                <div class="col-md-3 ">
                    <input type="date" name="tgl_awal" class="form-control">
                    <div class="invalid-feedback"><?php echo form_error('tgl_awal') ?></div>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tgl_akhir" class="form-control">
                    <div class="invalid-feedback"><?php echo form_error('tgl_akhir') ?></div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success"><i class="ri-search-line"></i></button>
                </div>
                </form>
              </div>
          <div class="row mb-3 mt-3">
               <!-- Table with stripped rows -->
               <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php elseif($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>
        </div>
          
             
     
             <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    
                    <th>No. Surat</th>
                    <th>Indeks</th>
                    <th>Tanggal</th>
                    <th>Pengolah</th>
                    <th>Catatan</th>
                    <th>Klasifikasi</th>
                    <th>Upload</th>

                  </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach ($Kendali as $kendali): $i++?>
                  <tr>
                  
                    <td>
                      
                      <?php echo $kendali->nomor_surat ?>
                    </td>
                    <td>
                      <?php echo $kendali->indeks ?>
                    </td>
                      <td>
                      <?php echo $kendali->tanggal ?>
                    </td>
                      <td>
                      <?php echo $kendali->pengolah ?>
                    </td>
                    <td>
                      <?php echo $kendali->catatan ?>
                    </td>
                    <td>
                      <?php echo $kendali->klasifikasi ?>
                    </td>
                      <td>
                      <?php 
                      if($kendali->file == NULL){
                        ?> <a href="" class="btn btn-danger" data-bs-toggle="modal" title="Detail data" data-bs-target="#basicModal<?php echo $kendali->no_urut ?>"><i class="ri-upload-2-line"></i></a> <?php
                      }else{
                        ?> <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" title="Detail data" data-bs-target="#modaldetail<?php echo $kendali->no_urut ?>"><i class="ri-eye-line"></i></a> <?php
                      }
                      ?></td>
                    
                  </tr>
               <!-- Modal untuk upload data -->
                  <div class="modal fade" id="basicModal<?php echo $kendali->no_urut ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Upload data nomor urut <?php echo $kendali->nomor_surat ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo site_url('Admin/upload_data') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-lg-3 col-md-4 label ">Upload file</div>
                      <input type="hidden" name="no_urut" value="<?php echo $kendali->no_urut;?>">
                      
                      <div class="col-lg-9 col-md-8"><input type="file" name="file"></div>
                      <i class="text-danger">Max 3MB</i>
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

              <!-- Modal untuk upload data -->
              <div class="modal fade" id="modaldetail<?php echo $kendali->no_urut ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Lihat data nomor urut <?php echo $kendali->nomor_surat ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                      <div class="col-4">
                          NO Surat
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col-6">
                          <?php echo $kendali->nomor_surat; ?>
                        </div>
                    </div>


                        <div class="row">
                      <div class="col-4">
                          Jenis Surat
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->jenis_surat; ?>
                        </div>

                        </div>
                        <div class="row">
                      <div class="col-4">
                          Indeks
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->indeks; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Tanggal Keluar
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->tanggal; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Pengolah
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->pengolah; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Catatan
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->catatan; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Klasifikasi
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->klasifikasi; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Kode
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->kode; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Dari
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->dari; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Kepada
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->kepada; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Isi Ringkasan
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->isi_ringkasan; ?>
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-4">
                          Lampiran
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->lampiran; ?>
                        </div>
                        </div>
                        
                        <div class="row">
                      <div class="col-4">
                          tanggal upload
                        </div>
                        <div class="col-md-auto">
                          :
                        </div>
                        <div class="col">
                          <?php echo $kendali->log_insert; ?>
                        </div>
                        </div>
                        <br>
                     <iframe src="<?php echo base_url('uploads/'.$kendali->file) ?>" width="700" height="1000"></iframe>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" >Save</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- End Modal untuk upload data-->
                  <?php endforeach; ?>

                </tbody>
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