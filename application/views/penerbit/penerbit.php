<div class="box">
  <div class="box-header">
  </div>
  <div class="col-md-12" style="margin-bottom: 8px;">
    <?php if ($this->session->userdata('group') == 'Administrator') { ?>
      <a href="<?= base_url('penerbit/tambahPenerbit') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Penerbit</a>
    <?php }  ?>
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
          <th>Id Penerbit</th>
          <th>Nama Penerbit</th>
          <?php if ($this->session->userdata('group') == 'Administrator') { ?>
            <th>Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <?php $id = 1;
      foreach ($penerbit as $row) { ?>
        <tr>
          <!-- <td><?php //$row->id_penerbit; 
                    ?></td> -->
          <td> <?php echo $id; ?> </td>
          <td><?= $row->nama_penerbit; ?></td>
          <td>
            <?php if ($this->session->userdata('group') == 'Administrator') { ?>
              <a href="<?= base_url('penerbit/edit/') . $row->id_penerbit; ?>" class="btn btn-success btn-xs">Edit</a>
              <a href="<?= base_url('penerbit/delete/') . $row->id_penerbit; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus?')">Delete</a>
            <?php } ?>
          </td>
        </tr>
      <?php $id++;
      } ?>
      <tbody>

      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>