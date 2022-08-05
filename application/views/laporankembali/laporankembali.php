<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        .tgl-akhir {
            margin-left: -20px;
        }

        .btn-filter {
            margin-left: -40px;
        }

        .btn-refresh {
            margin-left: -60px;
        }

        .btn-pdf {
            margin-left: -80px;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="box-header">
            <form method="post" action="<?= base_url('laporankembali'); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="text-primary"><b>Filter Laporan Pengembalian</b></h4>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal awal" onfocus="(this.type = 'date')">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="tgl_akhir" class="form-control tgl-akhir" placeholder="Tanggal akhir" onfocus="(this.type = 'date')">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-block btn-filter"><i class="fa fa-filter"></i>Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= base_url('laporankembali/laporankembali'); ?> " class="btn btn-warning btn-block btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                    </div>
                    <?php if ($this->session->userdata['group'] == 'Super Admin') { ?>
                        <div class="col-md-2">
                            <a href="<?= base_url('laporankembali/pdfKembali'); ?>" class="btn btn-danger btn-block btn-pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> View PDF</a>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Peminjaman</th>
                        <th>ID Anggota</th>
                        <th>Nama Pengguna</th>
                        <th>Nomor Buku</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $denda2 = 0;
                    foreach ($laporankembali as $row) :
                        $anggota_id = $row->id_anggota;
                        $ang = $this->db->query("SELECT * FROM users WHERE id_anggota = '$anggota_id'")->row(); ?>
                        <tr>
                            <td><?= $row->id_kembali; ?></td>
                            <td><?= $row->id_pinjam; ?></td>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $ang->nama_anggota; ?></td>
                            <td><?= $row->nomor_buku; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->status; ?></td>
                            <td><?= mediumdate_indo($row->tanggal_pinjam); ?></td>
                            <td><?= mediumdate_indo($row->tanggal_kembali); ?></td>
                            <td><?= mediumdate_indo($row->tanggal_pengembalian); ?></td>
                            <td width="100px"><b style="color: red;"><?= $row->denda; ?></b></td>
                        </tr>
                    <?php
                        $teks = $row->denda;
                        $string = preg_replace("/[^0-9]/", "", $teks);
                        $denda2 += $string;
                    endforeach;
                    ?>
                    <tr style="font-weight : bold;">
                        <td style="color: red;" colspan="10" align="center">TOTAL DENDA</td>

                        <td><b style="color: red;"><span><?php echo 'Rp ' . $denda2; ?></span></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</body>

</html>