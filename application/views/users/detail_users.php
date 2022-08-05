<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <div class="row">
                <div class="col-sm-8">
                    <table class="table table-striped table-bordered">

                        <tr>



                            <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $users->foto; ?>" style="width:3cm;height:4cm;" class="img-responsive">


                        </tr><br />
                        <tr>
                            <td>ID Anggota</td>
                            <td><?= $users->id_anggota; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Anggota</td>
                            <td><?= $users->nama_anggota; ?></td>
                        </tr>

                        <tr>
                            <td>Username</td>
                            <td><?= $users->username; ?></td>
                        </tr>

                        <tr>
                            <td>Group</td>
                            <td><?= $users->group; ?></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td><?= $users->nisn; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= $users->jenis_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $users->alamat; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><?= $users->nomor_telp; ?></td>
                        </tr>

                    </table>
                    <a href="<?= base_url('users'); ?>" class="btn btn-warning">Cancel</a>


                </div>

            </div>
        </div>
    </div>
</div>

</div>