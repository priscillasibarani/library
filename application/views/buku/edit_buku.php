<?php if ($this->session->userdata('group') == 'Administrator') { ?>

  <!-- right column -->
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="<?= base_url('buku/updateBuku'); ?>">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nomor Buku</label>
            <div class="col-sm-10">
              <input type="text" name="nomor_buku" value="<?= $buku['nomor_buku'] ?>" class="form-control" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>

            <div class="col-sm-10">
              <input type="text" name="judul_buku" value="<?= $buku['judul_buku'] ?>" class="form-control" placeholder="Judul buku..." required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nama Pengarang</label>

            <div class="col-sm-10">
              <input type="text" name="nama_pengarang" value="<?= $buku['nama_pengarang'] ?>" class="form-control" placeholder="Judul buku..." required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nama Penerbit</label>

            <div class="col-sm-10">
              <input type="text" name="nama_penerbit" value="<?= $buku['nama_penerbit'] ?>" class="form-control" placeholder="Judul buku..." required>
            </div>
          </div>


          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
            <div class="col-sm-10">
              <select name="tahun_terbit" id="" class="form-control select2" required>
                <option value="">-Pilih Tahun-</option>
                <?php for ($tahun = 2000; $tahun <= 2020; $tahun++) {
                  if ($buku['tahun_terbit'] == $tahun) { ?>
                    <option value="<?= $tahun ?>" selected><?= $tahun; ?></option>
                  <?php } else { ?>
                    <option value="<?= $tahun ?>"><?= $tahun; ?></option>
                <?php }
                } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" name="jumlah" value="<?= $buku['jumlah'] ?>" class="form-control" placeholder="Jumlah..." required>
            </div>
          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <a href="<?= base_url('buku'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
<?php } ?>