<section class="content-header">
    <h1>Rincian Data Peminjam Ruangan</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Horizontal Form -->

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="#" method="post">
                        <?php foreach ($tampil as $row) : ?>
                            <input type="hidden" name="id" class="form-control" value="<?= $row['id_pinjam']; ?>">
                            <div class="form-group">
                                <label id="ID">
                                    <?php
                                    if ($row['role'] == 5) {
                                        echo 'NIDN';
                                    } else {
                                        echo 'NIM';
                                    }
                                    ?>
                                </label>
                                <input type="text" name="id" id="id" class="form-control" autocomplete="off" value="<?= $row['id'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= $row['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" autocomplete="off" value="<?= $row['jabatan'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kampus</label>
                                <input type="text" name="kampus" id="kampus" class="form-control" autocomplete="off" value="<?= $row['kampus'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" class="form-control" autocomplete="off" value="<?= $row['ruangan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pengajuan</label>
                                <input type="date" name="pengajuan" class="form-control" autocomplete="off" value="<?= $row['tgl_pengajuan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Dari</label>
                                <input type="date" name="tgl1" class="form-control" autocomplete="off" value="<?= $row['tgl1'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Sampai</label>
                                <input type="date" name="tgl2" class="form-control" autocomplete="off" value="<?= $row['tgl2'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Mulai</label>
                                <input type="time" name="mulai" class="form-control" autocomplete="off" value="<?= $row['mulai'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Selesai</label>
                                <input type="time" name="selesai" class="form-control" autocomplete="off" value="<?= $row['selesai'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Keperluan</label>
                                <textarea name="keperluan" id="keperluan" class="form-control" style="resize: none;" value="<?= $row['keperluan'] ?>" readonly><?= $row['keperluan'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <p>
                                    <?php
                                    if ($row['acc_kmhs'] == 1 and $row['acc_akdmk'] == 0 and $row['status'] == 0) {
                                        echo "<div class='btn btn-warning btn-xs'>Menunggu acc akademik</div>";
                                    } elseif ($row['acc_akdmk'] == 1 and $row['acc_k_aset'] == 0 and $row['status'] == 0) {
                                        echo "<div class='btn btn-warning btn-xs'>Menunggu acc koordinator aset</div>";
                                    } elseif ($row['acc_k_aset'] == 1 and $row['acc_wk2'] == 0 and $row['status'] == 0) {
                                        echo "<div class='btn btn-warning btn-xs'>Menunggu acc wakil ketua 2</div>";
                                    } elseif ($row['acc_wk2'] == 1 and $row['status'] == 1) {
                                        echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                    } else {
                                        if ($row['status'] == 1) {
                                            echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                        } elseif ($row['status'] == 2) {
                                            echo "<div class='btn btn-danger btn-xs'>Ditolak</div>";
                                        } else {
                                            echo "<div class='btn btn-warning btn-xs'>Menunggu acc kemahasiswaan</div>";
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Alasan</label>
                                <textarea name="alasan" id="alasan" class="form-control" style="resize: none;" value="<?= $row['alasan'] ?>" readonly><?= $row['alasan'] ?></textarea>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="<?= base_url('pengajuan_admin1'); ?>" class="btn btn-default pull-right">Kembali</a>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->