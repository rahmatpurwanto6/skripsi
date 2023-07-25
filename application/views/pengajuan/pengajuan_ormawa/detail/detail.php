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
                                <label id="ID">NIM</label>
                                <input type="text" name="id" id="id" class="form-control" autocomplete="off" value="<?= $row['id'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= $row['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" autocomplete="off" value="<?= $row['kelas'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" autocomplete="off" value="<?= $row['jurusan'] ?>" readonly>
                            </div>
                            <?php if ($row['status_pinjam'] == 7) : ?>
                                <div class="form-group">
                                    <label for="">Organisasi</label>
                                    <input type="text" name="jurusan" class="form-control" value="<?= $row['organisasi'] ?>" readonly>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label>Kampus</label>
                                <input type="text" name="kampus" id="kampus" class="form-control" autocomplete="off" value="<?= $row['kampus'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" class="form-control" autocomplete="off" value="<?= $row['ruangan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tgl" class="form-control" autocomplete="off" value="<?= $row['tgl'] ?>" readonly>
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

                            <?php if ($row['status_pinjam'] == 7) : ?>
                                <div class="form-group">
                                    <label>Approve Akademik</label>
                                    <p><?php if ($row['approve1'] == 1) {
                                            echo '<div class="btn btn-success btn-sm">Sudah di approve</div>';
                                        } elseif ($row['approve1'] == 2) {
                                            echo '<div class="btn btn-danger btn-sm">Permintaan ditolak</div>';
                                        } else {
                                            echo '<div class="btn btn-warning btn-sm">Belum diproses</div>';
                                        }  ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label>Approve Kemahasiswaan</label>
                                    <p><?php if ($row['approve2'] == 1) {
                                            echo '<div class="btn btn-success btn-sm">Sudah di approve</div>';
                                        } elseif ($row['approve2'] == 2) {
                                            echo '<div class="btn btn-danger btn-sm">Permintaan ditolak</div>';
                                        } else {
                                            echo '<div class="btn btn-warning btn-sm">Belum diproses</div>';
                                        }  ?>
                                    </p>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label>Status</label>
                                <p><?php if ($row['status'] == 1) {
                                        echo '<div class="btn btn-success btn-sm">Sudah di approve</div>';
                                    } elseif ($row['status'] == 2) {
                                        echo '<div class="btn btn-danger btn-sm">Permintaan ditolak</div>';
                                    } else {
                                        echo '<div class="btn btn-warning btn-sm">Belum diproses</div>';
                                    }  ?>
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
                    <a href="<?= base_url('pengajuan_ormawa'); ?>" class="btn btn-default pull-right">Kembali</a>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->