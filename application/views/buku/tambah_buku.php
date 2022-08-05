<!-- right column -->
<div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $title; ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <!-- <form class="form-horizontal" method="post" action="<?php //base_url('buku/simpanBuku');  
                                                              ?>"> -->
    <?php echo form_open('buku/simpanBuku') ?>

    <div class="box-body">


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nomor Buku</label>
        <div class="col-sm-10">
          <input type="text" name="nomor_buku" value="<?= $nomor_buku ?>" class="form-control" readonly>
          <?= form_error('nomor_buku', '<small style="color:red">', '</small>'); ?>
        </div>

      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
        <div class="col-sm-10">
          <input type="text" name="judul_buku" class="form-control" placeholder="Judul buku...">
          <?= form_error('judul_buku', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Pengarang</label>
        <div class="col-sm-10">
          <input type="text" name="nama_pengarang" class="form-control" placeholder="Nama Pengarang...">
          <?= form_error('nama_pengarang', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
        <div class="col-sm-10">
          <input type="text" name="nama_penerbit" class="form-control" placeholder="Nama Penerbit..." ? <?= form_error('nama_penerbit', '<small style="color:red">', '</small>'); ?> </div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
        <div class="col-sm-10">
          <select name="tahun_terbit" class="form-control select2" id="">
            <option value="">-Pilih tahun-</option>
            <?php for ($tahun = 2000; $tahun <= 2020; $tahun++) { ?>
              <option value="<?= $tahun ?>"><?= $tahun; ?></option>
            <?php } ?>
          </select>
          <?= form_error('tahun_terbit', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

        <div class="col-sm-10">
          <input type="number" name="jumlah" class="form-control">
          <?= form_error('jumlah', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <a href="<?= base_url('buku'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.box-footer -->
    <?php echo form_close() ?>
  </div>
</div>