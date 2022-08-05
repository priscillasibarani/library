<!-- right column -->
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url('users/simpan'); ?>" method="POST" enctype="multipart/form-data">

            <div class="box-body">
                <!-- 
            <div class="form-group">
                <label>ID Pengguna</label>
                <input type="hidden" name="id" value="<?php //echo $id 
                                                        ?>" class="form-control" readonly>
            </div> -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ID Pengguna</label>
                        <input type="text" name="id_anggota" value="<?= $id_anggota ?>" class="form-control" readonly>
                        <?= form_error('id_anggota', '<small style="color:red">', '</small>'); ?>
                    </div>


                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" name="nama_anggota" required="required" placeholder="Nama Pengguna">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required="required" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="required" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Group</label>
                        <select name="group" class="form-control" required="required">
                            <option>Administrator</option>
                            <option>Siswa</option>
                            <option>Super Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input id="uintTextBox" class="form-control" name="nisn" required="required" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <br />
                        <input type="radio" name="jenis_kelamin" value="Laki-Laki" required="required"> Laki-Laki
                        <br />
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required="required"> Perempuan
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input id="uintTextBox" class="form-control" name="nomor_telp" required="required" placeholder="Contoh : 089618173609">
                    </div>

                    <div class="form-group">
                        <label>Pas Foto</label>
                        <input type="file" accept="image/*" name="gambar" required="required">
                    </div>
                </div>

                <div class="pull-right">

                    <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
        <a href="<?= base_url('users'); ?>" class="btn btn-warning">Cancel</a>
        </form>
    </div>
</div>