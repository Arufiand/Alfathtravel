<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url()?>Aset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url()?>Aset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item"><!-- Dashboard -->
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview"><!-- Pengiriman -->
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-truck"></i>
            <p>
              Pengiriman
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Pengiriman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tracking Pengiriman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cetak Laporan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview"><!-- Rental -->
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-car"></i>
            <p>
              Rental
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Rental</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengawasan Rental</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cetak Laporan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview"><!-- Travel -->
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-bus"></i>
            <p>
              Travel
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Travel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Booking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cetak Laporan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Konfirmasi Kendaraan</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Kelola E-Travel
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="kelolaTrayek.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Trayek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kelolaJadwalTravel.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Jadwal Travel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kelolaStaff.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Staff</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kelolaKendaraan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Kendaraan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kelolaCustomer.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Customer</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-header">KELOLA KONTEN WEBSITE</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Kelola Konten
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="kelolaBerita.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Berita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kelolaPengumuman.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Pengumuman</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
