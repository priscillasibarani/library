<div class="box">
  <div class="box-header">
    <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
  </div>
  <div class="col-md-12" style="margin-bottom: 8px;">

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
          <th>No</th>
          <th>ID Peminjam</th>
          <th>Nama Peminjam</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Tanggal Pengembalian</th>
          <th style="width:10%">Status</th>
          <th>Denda </th>
          <?php if ($this->session->userdata('group') == 'Administrator') { ?>
            <th>Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($pengembalian->result_array() as $row) : ?>
          <?php
          $anggota_id = $row['id_anggota'];
          $ang = $this->db->query("SELECT * FROM users WHERE id_anggota = '$anggota_id'")->row();

          // $tanggal_kembali = new DateTime($row['tanggal_kembali']);
          // $tanggal_sekarang = new DateTime();
          // $selisih = $tanggal_sekarang->diff($tanggal_kembali)->format("%a");
          // $denda = $selisih * 1000;

          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['id_pinjam']; ?></td>
            <td><?= $ang->nama_anggota; ?></td>
            <td><?= $row['judul_buku']; ?></td>
            <td><?= $row['tanggal_pinjam']; ?></td>
            <td><?= $row['tanggal_kembali']; ?></td>
            <td><?= $row['tanggal_pengembalian']; ?></td>
            <td><?= $row['status']; ?></td>
            <td> <b style="color: red;"><span><?= $row['denda']; ?> ,-</span></td>

            <!-- 
            <?php //if ($tanggal_kembali <= $tanggal_sekarang) {
            ?>
              <td>
                <b style="color: red;"><span>Rp <? //= $totaldenda; 
                                                ?>,-</span>
              </td>
            <?php //} elseif ($tanggal_kembali <= $tanggal_sekarang && $selisih == 0) {
            ?>
              <td>
                <b style="color: red;"><span>Tidak Denda,-</span> -->
            </td> <?php //} elseif ($tanggal_kembali >= $tanggal_sekarang or $selisih == 0) {
                  ?>
            <!-- <b style="color: red;"><span>Tidak Denda,-</span> -->
            </td>
            <?php // }
            ?>
            <?php if ($this->session->userdata('group') == 'Administrator') {
            ?>
              <td>
                <a href="<?= base_url('pengembalian/detailKembali/') . $row['id_kembali'];
                          ?>" class="btn btn-primary btn-xs">Detail</a>
                <a href="<?= base_url('pengembalian/delete/') . $row['id_kembali'];
                          ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus?')">Delete</a>
              <?php }
              ?>
              </td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
</div>