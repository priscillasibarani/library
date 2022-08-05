<?php if ($this->session->userdata('group') == 'Administrator') { ?>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $users; ?></h3>

            <p>Anggota</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?= base_url('users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $buku; ?></h3>

            <p>Buku</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?= base_url('buku') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $peminjaman; ?></h3>

            <p>Peminjaman</p>
          </div>
          <div class="icon">
            <i class="fa fa-expand"></i>
          </div>
          <a href="<?= base_url('peminjaman') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= $pengembalian; ?></h3>

            <p>Pengembalian</p>
          </div>
          <div class="icon">
            <i class="fa fa-compress"></i>
          </div>
          <a href="<?= base_url('pengembalian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
<?php } ?>


<?php if ($this->session->userdata('group') == 'Super Admin') { ?>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $users; ?></h3>

            <p>Anggota</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?= base_url('users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $peminjaman; ?></h3>

            <p>Peminjaman</p>
          </div>
          <div class="icon">
            <i class="fa fa-expand"></i>
          </div>
          <a href="<?= base_url('peminjaman') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= $pengembalian; ?></h3>

            <p>Pengembalian</p>
          </div>
          <div class="icon">
            <i class="fa fa-compress"></i>
          </div>
          <a href="<?= base_url('pengembalian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
<?php } ?>



<?php if ($this->session->userdata('group') == 'Siswa') { ?>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $buku; ?></h3>
            <p>Buku</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?= base_url('buku') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $peminjaman; ?></h3>

            <p>Peminjaman</p>
          </div>
          <div class="icon">
            <i class="fa fa-expand"></i>
          </div>
          <a href="<?= base_url('peminjaman') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= $pengembalian; ?></h3>

            <p>Pengembalian</p>
          </div>
          <div class="icon">
            <i class="fa fa-compress"></i>
          </div>
          <a href="<?= base_url('pengembalian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

      </div>
      <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
<?php } ?>



<?php if ($this->session->userdata('group') == 'Super Admin') { ?>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->


    </div>
  </section>
  <!-- /.content -->
<?php } ?>