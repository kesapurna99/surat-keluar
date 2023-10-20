 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
    <a href="<?php echo site_url('KasubagTu')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  </li><!-- End Tables Nav -->
  
    <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo site_url('Admin/datakendalisurat'); ?>">
      <i class="ri-account-box-line"></i>
      <span>Surat Keluar</span>
    </a>
  </li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo site_url('Admin/Datauser'); ?>">
      <i class="ri-account-box-line"></i>
      <span>Data User</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo site_url('Admin/Setting'); ?>">
      <i class="ri-key-2-fill"></i>
      <span>Setting</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo site_url('login/logout'); ?>">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->