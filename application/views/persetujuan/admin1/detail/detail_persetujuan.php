<section class="content-header">
    <h1>
        <!-- persetujuan admin -->
        Rincian Data Persetujuan Peminjaman Ruangan
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Horizontal Form -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <!-- <?php if ($this->session->flashdata('pesan')) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i><?= $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php } ?> -->

                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="<?= base_url('persetujuan_admin1/simpanpersetujuan') ?>" method="post">
                        <?php foreach ($tampil as $row) : ?>
                            <input type="hidden" name="id" class="form-control" value="<?= $row['id_pinjam']; ?>">

                            <div class="form-group">
                                <label for=""><?php if ($row['role'] == 5) {
                                                    echo "NIDN";
                                                } else {
                                                    echo "NIM";
                                                } ?></label>
                                <select name="id2" id="id2" class="form-control" value="<?= $row['id']; ?>" readonly>
                                    <option value="<?= $row['id_user']; ?>"><?= $row['id']; ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="<?= $row['jabatan']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Kampus</label>

                                <select name="kampus" id="kampus" class="form-control" value="<?= $row['kampus']; ?>" readonly>
                                    <option value="<?= $row['id_kampus']; ?>"><?= $row['kampus']; ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Ruangan</label>
                                <select name="ruangan" id="ruangan" class="form-control" value="<?= $row['ruangan']; ?>" readonly>
                                    <option value="<?= $row['id_ruangan']; ?>"><?= $row['ruangan']; ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dari Tanggal</label>

                                <input type="date" name="tgl1" id="tgl1" class="form-control" value="<?= $row['tgl1']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Sampai Tanggal</label>

                                <input type="date" name="tgl2" id="tgl2" class="form-control" value="<?= $row['tgl2']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Mulai</label>
                                <input type="time" name="mulai" id="mulai" class="form-control timepicker" value="<?= $row['mulai']; ?>">
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Selesai</label>
                                <input type="time" name="selesai" id="selesai" class="form-control timepicker" value="<?= $row['selesai']; ?>">
                                <!-- /.form group -->
                            </div>

                            <div class="form-group">
                                <label>Keperluan</label>
                                <textarea name="keperluan" class="form-control" style="resize: none;" readonly><?= $row['keperluan']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Aksi</label>
                                <select name="aksi" id="aksi" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Diterima</option>
                                    <option value="2">Ditolak</option>
                                </select>
                                <small class="text-danger"><?= form_error('aksi'); ?></small>
                            </div>
                            <div class="form-group">
                                <label>Alasan</label>
                                <textarea name="alasan" class="form-control" style="resize: none;"></textarea>
                            </div>

                        <?php endforeach; ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('persetujuan_admin1'); ?>" class="btn btn-default">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->