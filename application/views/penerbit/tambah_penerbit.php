<!-- right column -->
<div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $title; ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <!-- <form class="form-horizontal" method="post" action="<?php //base_url('penerbit/simpan'); 
                                                              ?>"> -->
    <?php echo form_open('penerbit/simpanPenerbit') ?>
    <div class="box-body">

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Nama Penerbit</label>

        <div class="col-sm-10">
          <input type="text" name="nama_penerbit" class="form-control" placeholder="Nama penerbit...">
          <?= form_error('nama_penerbit', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <a href="<?= base_url('penerbit'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.box-footer -->
    <!-- </form> -->
    <?php echo form_close() ?>
  </div>
</div>