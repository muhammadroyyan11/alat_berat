<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">APP SEWA ALAT BERAT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SAB</a>
          </div>
          <ul class="sidebar-menu">
            <?php
            if ($this->session->userdata('role_id') != 2) { ?>
              <li><a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/data_alat_berat') ?>"><i class="fas fa-snowplow"></i> <span>Data Alat Berat</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/data_type') ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Type</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/data_customer') ?>"><i class="fas fa-users"></i> <span>Data Customer</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/laporan/') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>

            <?php } else { ?>
              <li><a class="nav-link" href="<?php echo base_url('admin/laporan/') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>
            <?php }
            ?>


            <li><a class="nav-link" href="<?php echo base_url('auth/logout/') ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url('auth/ganti_password') ?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li>
          </ul>
        </aside>
      </div>