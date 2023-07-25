<!-- DataTables -->
<!-- <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css"> -->

<section class="content-header">
    <h1>
        Daftar Pengajuan Peminjaman Ruangan
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">

                    <?php if ($this->session->flashdata('pesan')) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i><?= $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php } ?>

                    <!-- mahasiswa -->
                    <a href="<?= base_url('pengajuan_ormawa/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk Ormawa</a>
                    <!-- end mahasiswa -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered text-center" id="tabel1">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th>NIM/NIDN</th>
                                <th>Nama</th>
                                <th>Ruangan</th>
                                <th>Kampus</th>
                                <th>Tanggal</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampil as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['ruangan']; ?></td>
                                    <td><?= $row['kampus']; ?></td>
                                    <td><?= Tanggal_helper(date('Y-m-d', strtotime($row['tgl']))); ?></td>
                                    <td><?= $row['mulai']; ?></td>
                                    <td><?= $row['selesai']; ?></td>
                                    <td>
                                        <?php if ($row['status_pinjam'] == 7) {
                                            if ($row['approve1'] == 1 and $row['approve2'] == '' and $row['status'] == 0) {
                                                echo "<div class='btn btn-warning btn-xs'>Menunggu Persetujuan Kemahasiswaan</div>";
                                            } elseif ($row['approve1'] == 1 and $row['approve2'] == 1 and $row['status'] == 1) {
                                                echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                            } elseif ($row['approve1'] == 2 and $row['approve2'] == '' and $row['status'] == 2) {
                                                echo "<div class='btn btn-danger btn-xs'>Ditolak</div>";
                                            } elseif ($row['approve1'] == 1 and $row['approve2'] == 2 and $row['status'] == 2) {
                                                echo "<div class='btn btn-danger btn-xs'>Ditolak</div>";
                                            } else {
                                                echo "<div class='btn btn-warning btn-xs'>Belum diproses</div>";
                                            }
                                        } else {
                                            if ($row['status'] == 1) {
                                                echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<div class='btn btn-danger btn-xs'>Ditolak</div>";
                                            } else {
                                                echo "<div class='btn btn-warning btn-xs'>Belum diproses</div>";
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <!-- detail superadmin -->

                                        <a href="<?= base_url('pengajuan_ormawa/detail/') . encrypt_url($row['id_pinjam']); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>

                                        <!-- end detail superadmin -->

                                        <!-- print superadmin -->
                                        <?php if ($row['status'] == 1) { ?>
                                            <a href="<?= base_url('pengajuan_ormawa/cetak_ormawa/') . encrypt_url($row['id_pinjam']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i></a>
                                        <?php } ?>
                                        <!-- end print superadmin -->

                                        <a href="<?= base_url('pengajuan_ormawa/batal/') . encrypt_url($row['id_pinjam']); ?>" <?php if ($row['status'] == 1 || $row['status'] == 2) { ?> echo style="display: none;" <?php } ?> class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"> <i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- DataTables -->
<!-- <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script> -->

<script>
    $(function() {
        $("#tabel1").DataTable({
            // "processing": true,
            // "serverSide": true,
            "order": [],

            // "ajax": {
            //     "url": "<?= base_url('ruangan/get_dataruangan') ?>",
            //     "type": "POST"
            // },


            "columnDefs": [{
                "orderable": false,
                "className": "text-center",
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }, ]
        });
    });
</script>