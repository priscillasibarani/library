<div class="box">
  <div class="box-header">
  </div>
  <div class="col-md-12" style="margin-bottom: 8px;">
    <a href="<?= base_url('peminjaman/tambahPeminjaman') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>

    <?php if (!empty($this->session->flashdata('info'))) { ?>
      <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 8px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('info'); ?>
      </div>
    <?php } ?>

  </div>


  <div class="box">
    <div class="box-header">
    </div>
    <div class="col-md-12" style="margin-bottom: 8px;">
      <?php if ($this->session->userdata('group') == 'Siswa') { ?>
        <a href="<?= base_url('peminjaman/tambahPeminjaman') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
      <?php } ?>
      <?php if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 8px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('info'); ?>
        </div>
      <?php } ?>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id Peminjaman</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Nomor Buku</th>
            <th style="width:10%">Status</th>
            <th>Tanggal Pinjam</th>
            <th>Keterangan</th>
            <th>Tanggal Kembali</th>
            <?php if ($this->session->userdata('group') == 'Administrator') { ?>
              <th>Aksi</th> <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($peminjaman->result_array()  as $row) {
            $anggota_id = $row['id_anggota'];
            $ang = $this->db->query("SELECT * FROM users WHERE id_anggota = '$anggota_id'")->row();
            $id_pinjam = $row['id_pinjam'];
            // $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
            // $total_denda = $denda->row(); 
            $tanggal_kembali = new DateTime($row['tanggal_kembali']);
            $tanggal_sekarang = new DateTime();
            $selisih = $tanggal_sekarang->diff($tanggal_kembali)->format("%a");
          ?>
            <tr>
              <td><?= $row['id_pinjam']; ?></td>
              <td><?= $row['id_anggota']; ?></td>
              <td><?= $ang->nama_anggota; ?></td>
              <td><?= $row['nomor_buku']; ?></td>
              <td><?= $row['status']; ?></td>
              <td><?= $row['tanggal_pinjam']; ?></td>
              <td>
                <?php if ($tanggal_kembali <= $tanggal_sekarang or $selisih == 0) { ?>

                  <span class="label label-warning">Belum dikembalikan</span>

                  Telat <b style="color: red;"><?= $selisih; ?></b> Hari <br>
                  <!-- <span class="label label-danger">Denda perhari = Rp. 1000,-</span> -->


                <?php } else { ?>
                  <span class="label label-warning">Belum dikembalikan</span>

                <?php  }  ?>
              </td>
              <td><?= $row['tanggal_kembali']; ?></td>

              <?php if ($this->session->userdata('group') == 'Administrator') { ?>

                <td>
                  <a href="<?= base_url('peminjaman/editPinjam/') . $row['id_pinjam'] ?>" class="btn btn-success btn-xs"">Edit</a>
              <a href=" <?= base_url('peminjaman/kembalikan/') . $row['id_pinjam'] ?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin mau dikembalikan?')">Kembalikan</a>

                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>