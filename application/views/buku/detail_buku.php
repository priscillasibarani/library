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
            <table class="table table-striped table-bordered">


                <tr>
                    <td>Nomor Buku</td>
                    <td><?= $detail->nomor_buku; ?></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><?= $detail->judul_buku; ?></td>
                </tr>

                <tr>
                    <td>Pengarang</td>
                    <td><?= $detail->nama_pengarang; ?></td>
                </tr>

                <tr>
                    <td>Penerbit</td>
                    <td><?= $detail->nama_penerbit; ?></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><?= $detail->tahun_terbit; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Buku</td>
                    <td><?= $detail->jumlah; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Pinjam</td>
                    <td>
                        <?php
                        $id = $detail->nomor_buku;
                        $dd = $this->db->query("SELECT * FROM peminjaman WHERE nomor_buku= '$id' AND status = 'Dipinjam'");
                        if ($dd->num_rows() > 0) {
                            echo $dd->num_rows();
                        } else {
                            echo '0';
                        }
                        ?>
                        <a data-toggle="modal" data-target="#Users" class="btn btn-primary btn-xs" style="margin-left:1pc;">
                            <i class="fa fa-sign-in"></i> Detail Pinjam</a>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url('buku'); ?>" class="btn btn-warning">Cancel</a>

        </div>

    </div>
</div>
</div>
</section>
</div>

<!--modal import -->
<div class="modal fade" id="Users">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Detail Anggota yang Meminjam</h4>
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Anggota</th>
                            <th>Nama Anggota</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $nomorbuku = $detail->nomor_buku;
                        $pin = $this->db->query("SELECT * FROM peminjaman WHERE nomor_buku ='$nomorbuku' AND status = 'Dipinjam'")->result_array();
                        foreach ($pin as $si) {
                            $isi = $this->usersmodel->get_tableid_edit('users', 'id_anggota', $si['id_anggota']);
                            if ($isi->group == 'Siswa') {
                        ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $isi->id_anggota; ?></td>
                                    <td><?= $isi->nama_anggota; ?></td>
                                    <td><?= $isi->nisn; ?></td>
                                    <td><?= $isi->jenis_kelamin; ?></td>
                                    <td><?= $isi->alamat; ?></td>
                                    <td><?= $isi->nomor_telp; ?></td>
                                    <td><?= $si['tanggal_pinjam']; ?></td>
                                    <td><?= $si['tanggal_kembali']; ?></td>
                                </tr>
                        <?php $no++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->