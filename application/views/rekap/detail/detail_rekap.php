<section class="content-header">
    <h1>Rincian Rekap Data Peminjam Ruangan</h1>
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
                            <input type="hidden" name="id" class="form-control" value="<?= $row['id_rekap']; ?>">
                            <div class="form-group">
                                <label id="ID">
                                    <?php
                                    if ($row['role_id'] == 5) {
                                        echo 'NIDN';
                                    } else {
                                        echo 'NIM';
                                    }
                                    ?>
                                </label>
                                <input type="text" name="id" id="id" class="form-control" autocomplete="off" value="<?= $row['username'] ?>" readonly>
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
                                <label>Alasan</label>
                                <textarea name="alasan" id="alasan" class="form-control" style="resize: none;" value="<?= $row['alasan'] ?>" readonly><?= $row['alasan'] ?></textarea>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="<?= base_url('rekap'); ?>" class="btn btn-default pull-right">Kembali</a>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->