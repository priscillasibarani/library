<div class="box">
    <div class="box-header">
    </div>
    <div class="col-md-12" style="margin-bottom: 8px;">
        <a href="<?= base_url('users/tambahPengguna') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengguna</a>

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
                    <th>id</th>
                    <th>Id Pengguna</th>
                    <th>Nama Anggota</th>
                    <th>Username</th>
                    <th>Group</th>
                    <th>NISN</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($users as $row) { ?>
                    <tr>
                        <td><?= $id; ?></td>
                        <td><?= $row->id_anggota; ?></td>
                        <td><?= $row->nama_anggota; ?></td>
                        <td><?= $row->username; ?></td>
                        <td><?= $row->group; ?></td>
                        <td><?= $row->nisn; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->nomor_telp; ?></td>
                        <td>
                            <center>
                                <?php if (!empty($row->foto !== "-")) { ?>
                                    <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $row->foto; ?>" alt="#" class="img-responsive" style="height:auto;width:100px;" />
                                <?php } else { ?>
                                    <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                                    <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                <?php } ?>
                            </center>
                        </td>
                        <td>


                            <a href="<?= base_url('users/edit/') . $row->id; ?>" class="btn btn-success btn-xs">Edit</a>

                            <a href="<?= base_url('users/detailUsers/') . $row->id; ?>" class="btn btn-primary btn-xs">Detail</a>
                            <a href="<?= base_url('users/delete/') . $row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus?')">Delete</a> <br><br>
                            <?php if ($this->session->userdata('group') == 'Super Admin') { ?>
                                <a href="<?= base_url('users/card/' . $row->id); ?>" target="_blank"><button class="btn btn-primary">
                                        <i class="fa fa-print"></i> Cetak Kartu</button></a>
                            <?php } ?>

                        </td>
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>