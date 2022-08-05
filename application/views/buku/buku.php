<div class="box">
  <div class="box-header">
    <!-- <h3 class="box-title">Data Buku</h3> -->
  </div>
  <div class="col-md-12" style="margin-bottom: 8px;">
    <?php if ($this->session->userdata('group') == 'Administrator') { ?>
      <a href="<?= base_url('buku/createBuku') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Buku</a>
    <?php } ?>
    <?php if (!empty($this->session->flashdata('info'))) : ?>
      <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 8px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('info'); ?>
      </div>
    <?php endif; ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nomor Buku</th>
          <th>Judul Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Jumlah</th>
          <th>Dipinjam</th>
          <?php if ($this->session->userdata('group') == 'Administrator') { ?>
            <th>Aksi</th>
          <?php } ?>
        </tr>
      </thead>

      <tbody>
        <?php $no = 1;
        foreach ($buku as $row) : ?>
          <tr>
            <td><?= $row->nomor_buku; ?></td>
            <td><?= $row->judul_buku; ?></td>
            <td><?= $row->nama_pengarang; ?></td>
            <td><?= $row->nama_penerbit; ?></td>
            <td><?= $row->tahun_terbit; ?></td>
            <td><?= $row->jumlah; ?></td>

            <td>
              <?php
              $id = $row->nomor_buku;
              $dd = $this->db->query("SELECT * FROM peminjaman WHERE nomor_buku= '$id' AND status = 'Dipinjam'");
              if ($dd->num_rows() > 0) {
                echo $dd->num_rows();
              } else {
                echo '0';
              }
              ?>
            </td>

            <td>
              <a href="<?= base_url('buku/detailBuku/' . $row->nomor_buku); ?>" class="btn btn-primary btn-xs">Detail</A>

              <?php if ($this->session->userdata('group') == 'Administrator') { ?>

                <a href="<?= base_url('buku/editBuku/') . $row->nomor_buku; ?>" class="btn btn-success btn-xs">Edit</a>
                <a href="<?= base_url('buku/deleteBuku/') . $row->nomor_buku; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus?')">Delete</a>
              <?php } ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>