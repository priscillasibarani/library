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


                        <!-- <tr>
                            <td>ID Kembali</td>
                            <td><?php //echo $detail->id_kembali; 
                                ?></td>
                        </tr> -->
                        <tr>
                            <td>ID Anggota</td>
                            <td><?= $detail->id_anggota; ?></td>
                        </tr>


                        <tr>
                            <td>Judul Buku</td>
                            <td><?= $detail->nomor_buku; ?></td>
                        </tr>


                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td><?= $detail->tanggal_pinjam; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td><?= $detail->tanggal_kembali; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?= $detail->status; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengembalian</td>
                            <td><?= $detail->tanggal_pengembalian; ?></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td><?= $detail->denda; ?></td>
                        </tr>

                    </table>
                    <a href="<?= base_url('pengembalian'); ?>" class="btn btn-warning">Cancel</a>


                </div>

            </div>
        </div>
    </div>
</div>

</div>