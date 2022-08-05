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
            <form class="form-horizontal" method="post" action="<?= base_url('peminjaman/updatePinjam'); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ID Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_pinjam" value="<?= $peminjaman['id_pinjam'] ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">ID Anggota</label>

                        <div class="col-sm-10">
                            <input type="text" name="id_anggota" value="<?= $peminjaman['id_anggota'] ?>" class="form-control" placeholder="ID Anggota..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Buku</label>
                        <div class="col-sm-10">
                            <select name="nomor_buku" id="" class="form-control select2" required>
                                <?php foreach ($buku as $row) : ?>
                                    <?php if ($peminjaman['nomor_buku'] == $row->nomor_buku) : ?>
                                        <option value="<?= $row->nomor_buku ?>" selected><?= $row->judul_buku; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row->nomor_buku ?>"><?= $row->judul_buku; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" value="<?= $peminjaman['status'] ?>" class="form-control" placeholder="" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" class="form-control" placeholder="Tanggal Pinjam..." required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Kembali</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali'] ?>" class="form-control" placeholder="Tanggal Kembali..." required>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <a href="<?= base_url('peminjaman'); ?>" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
<?php } ?>