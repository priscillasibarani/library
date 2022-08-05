<?php
if ($this->session->userdata('group') == 'Administrator') { ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <p> St. Thomas 4 Binjai</p>
          </a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="active">
          <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li><a href="<?= base_url('users') ?>"><i class="fa fa-users"></i> Data Pengguna</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?= base_url('buku'); ?>"><i class="fa fa-circle-o"></i> Buku</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-area-chart"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('peminjaman'); ?>"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
            <li><a href="<?= base_url('pengembalian'); ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('laporan'); ?>"><i class="fa fa-circle-o"></i> Laporan Peminjaman</a></li>
            <li><a href="<?= base_url('laporankembali'); ?>"><i class="fa fa-circle-o"></i> Laporan Pengembalian</a></li>
          </ul>
        </li>

        <hr>
        <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?php }
if ($this->session->userdata('group') == 'Super Admin') { ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/dist/img/avatar5.png" class="img-circle" alt="User Image"></a>
        </div>
        <div class="pull-left info">
          <p>Super Admin</p>
          <p>SMA St. Thomas 4 Binjai</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="active">
          <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li><a href="<?= base_url('users') ?>"><i class="fa fa-users"></i> Data Pengguna</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('laporan'); ?>"><i class="fa fa-circle-o"></i> Laporan Peminjaman</a></li>
            <li><a href="<?= base_url('laporankembali'); ?>"><i class="fa fa-circle-o"></i> Laporan Pengembalian</a></li>

          </ul>
        </li>

        <hr>
        <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>

      </ul>
    </section>
  </aside>


<?php }
if ($this->session->userdata('group') == 'Siswa') { ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/dist/img/avatar5.png" class="img-circle" alt="User Image"></a>
        </div>
        <div class="pull-left info">
          <p>SISWA</p>
          <p>SMA St. Thomas 4 Binjai</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li class="active">
          <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

  
            <li><a href="<?= base_url('buku'); ?>"><i class="fa fa-circle-o"></i> Buku</a></li>
          


        <li><a href="<?= base_url('peminjaman'); ?>"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
        <li><a href="<?= base_url('pengembalian'); ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>



        <hr>
        <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>

      </ul>
    </section>
  </aside>
  <!-- /.sidebar -->
<?php } ?>