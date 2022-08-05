<?php if ($this->session->userdata('group') == 'Siswa') { ?>

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($profil as $row) { ?>
                <form class="form-horizontal" method="post" action="<?= base_url('profil/update' . $row->id_anggota); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Pengguna</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $prf['id_anggota']; ?>" name="id_anggota" required="required" placeholder="ID Pengguna" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $prf['nama_anggota']; ?>" name="nama_anggota" required="required" placeholder="Nama Pengguna">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly value="<?= $prf['username']; ?>" name="username" required="required" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" placeholder="Isi Password Jika di Perlukan Ganti">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Group</label>
                                <div class="col-sm-10">
                                    <select name="group" class="form-control" required="required">
                                        <?php if ($this->session->userdata('group') == 'Administrator') { ?>
                                            <option <?php if ($prf['group'] == 'Administrator') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                                            <option <?php if ($prf['group'] == 'Siswa') {
                                                        echo 'selected';
                                                    } ?>>Siswa</option>
                                            <option <?php if ($prf['group'] == 'Super Admin') {
                                                        echo 'selected';
                                                    } ?>>Super Admin</option>
                                        <?php } elseif ($this->session->userdata('group') == 'Siswa') { ?>
                                            <option <?php if ($prf['group'] == 'Siswa') {
                                                        echo 'selected';
                                                    } ?>>Siswa</option>
                                        <?php } elseif ($this->session->userdata('group') == 'Super Admin') { ?>
                                            <option <?php if ($prf['group'] == 'Super Admin') {
                                                        echo 'selected';
                                                    } ?>>Super Admin</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Identitas</label>
                                <div class="col-sm-10">
                                    <input id="uintTextBox" class="form-control" value="<?= $prf['nisn']; ?>" name="nisn" required="required" placeholder="Contoh : 089618173609">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <br />
                                    <input type="radio" name="jenis_kelamin" <?php if ($prf['jenis_kelamin'] == 'Laki-Laki') {
                                                                                    echo 'checked';
                                                                                } ?> value="Laki-Laki" required="required"> Laki-Laki
                                    <br />
                                    <input type="radio" name="jenis_kelamin" <?php if ($prf['jenis_kelamin'] == 'Perempuan') {
                                                                                    echo 'checked';
                                                                                } ?> value="Perempuan" required="required"> Perempuan
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" required="required"><?= $prf['alamat']; ?></textarea>
                                    <input type="hidden" class="form-control" value="<?= $prf['id']; ?>" name="id">
                                    <input type="hidden" class="form-control" value="<?= $prf['foto']; ?>" name="foto">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Hp</label>
                                <div class="col-sm-10">

                                    <input id="uintTextBox" class="form-control" value="<?= $prf['nomor_telp']; ?>" name="nomor_telp" required="required" placeholder="Contoh : 089618173609">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" accept="image/*" name="gambar">

                                    <br />
                                    <img src="<?= base_url('assets_style/image/' . $prf['foto']); ?>" class="img-responsive" style="height:auto;width:100px;" alt="#">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="pull-right">



                            <button type="submit" class="btn btn-primary">Update</button>




                            <!-- /.box-footer -->

                </form>
            <?php } ?>
            <a href="<?= base_url('profil'); ?>" class="btn btn-warning">Cancel</a>

        </div>
    <?php } ?>