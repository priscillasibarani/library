<!-- right column -->
<div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $title; ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <!-- <form class="form-horizontal" method="post" action="<?php //base_url('peminjaman/simpan'); 
                                                              ?>"> -->
    <?php echo form_open('peminjaman/simpan') ?>
    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Id Peminjaman</label>
        <div class="col-sm-10">
          <input type="text" name="id_pinjam" value="<?= $id_pinjam ?>" class="form-control" readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Peminjam</label>
        <div class="col-sm-10">
          <select name="id_anggota" class="form-control select2" id="">
            <option value="">-Pilih Peminjam-</option>
            <?php foreach ($peminjam as $row) : ?>
              <option value="<?= $row->id_anggota ?>"><?= $row->id_anggota; ?>- <?= $row->nama_anggota; ?> </option>
            <?php endforeach ?>
          </select>
          <?= form_error('id_anggota', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Buku</label>
        <div class="col-sm-10">
          <select name="nomor_buku" class="form-control select2" id="">
            <option value="">-Pilih Buku-</option>
            <?php foreach ($buku as $row) : ?>
              <option value="<?= $row->nomor_buku ?>"><?= $row->nomor_buku; ?>- <?= $row->judul_buku; ?></option>
            <?php endforeach ?>
          </select>
          <?= form_error('nomor_buku', '<small style="color:red">', '</small>'); ?>

        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Pinjam</label>
        <div class="col-sm-10">
          <input type="date" name="tanggal_pinjam" class="form-control">
          <?= form_error('tanggal_pinjam', '<small style="color:red">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Kembali</label>
        <div class="col-sm-10">
          <input type="date" name="tanggal_kembali" class="form-control">
          <?= form_error('tanggal_kembali', '<small style="color:red">', '</small>'); ?>

        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <a href="<?= base_url('peminjaman'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.box-footer -->
    <!-- </form> -->
    <?php echo form_close() ?>
  </div>
</div>