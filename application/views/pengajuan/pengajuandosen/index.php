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

                    Kemahasiswaan : <button class="btn btn-success" onclick="sendwa_kmhs()"><i class="fa fa-whatsapp"></i></button>
                    Akademik : <button class="btn btn-success" onclick="sendwa_akdmk()"><i class="fa fa-whatsapp"></i></button>
                    Koordinator Aset : <button class="btn btn-success" onclick="sendwa_kaset()"><i class="fa fa-whatsapp"></i></button>
                    Wakil Ketua 2 : <button class="btn btn-success" onclick="sendwa_wk2()"><i class="fa fa-whatsapp"></i></button><br>

                    <!-- dosen -->
                    <a href="<?= base_url('pengajuan_dosen/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk dosen</a>
                    <!-- end dosen -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered text-center" id="tabel3">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th>NIM/NIDN</th>
                                <th>Nama</th>
                                <th>Ruangan</th>
                                <th>Kampus</th>
                                <th>Pengajuan</th>
                                <th>Dari</th>
                                <th>Sampai</th>
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
                                    <td><?= Tanggal_helper(date('Y-m-d', strtotime($row['tgl_pengajuan']))); ?></td>
                                    <td><?= Tanggal_helper(date('Y-m-d', strtotime($row['tgl1']))); ?></td>
                                    <td><?= Tanggal_helper(date('Y-m-d', strtotime($row['tgl2']))); ?></td>
                                    <td><?= $row['mulai']; ?></td>
                                    <td><?= $row['selesai']; ?></td>
                                    <td>
                                        <?php
                                        if ($row['acc_kmhs'] == 1 and $row['acc_akdmk'] == 0) {
                                            echo "<div class='btn btn-warning btn-xs'>Menunggu approve akademik</div>";
                                        } elseif ($row['acc_akdmk'] == 1 and $row['acc_k_aset'] == 0) {
                                            echo "<div class='btn btn-warning btn-xs'>Menunggu approve koordinator aset</div>";
                                        } elseif ($row['acc_k_aset'] == 1 and $row['acc_wk2'] == 0) {
                                            echo "<div class='btn btn-warning btn-xs'>Menunggu approve wakil ketua 2</div>";
                                        } elseif ($row['acc_wk2'] == 1 and $row['status'] == 1) {
                                            echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                        } else {
                                            if ($row['status'] == 1) {
                                                echo "<div class='btn btn-success btn-xs'>Diterima</div>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<div class='btn btn-danger btn-xs'>Ditolak</div>";
                                            } else {
                                                echo "<div class='btn btn-warning btn-xs'>Menunggu approve kemahasiswaan</div>";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <!-- detail dosen -->

                                        <a href="<?= base_url('pengajuan_dosen/detail/') . encrypt_url($row['id_pinjam']); ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>

                                        <!-- end detail dosen -->

                                        <!-- print dosen -->
                                        <?php if ($row['status'] == 1) : ?>
                                            <a href="<?= base_url('pengajuan_dosen/cetak_laporan/') . encrypt_url($row['id_pinjam']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i></a>
                                        <?php endif; ?>
                                        <!-- end print dosen -->

                                        <a href="<?= base_url('pengajuan_dosen/batal/') . encrypt_url($row['id_pinjam']); ?>" <?php if ($row['status'] == 1 || $row['status'] == 2) { ?> echo style="display: none;" <?php } ?> class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"> <i class="fa fa-close"></i></a>
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
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        setInterval(load_data, 3000);
        load_data();
    });

    function load_data() {
        $("#tabel3").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "destroy": true,
            "searching": false,

            "ajax": {
                "url": "<?= base_url('pengajuan_dosen/get_datadosen') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "orderable": false,
                "className": "text-center",
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
            }, ]
        });
    }
</script>

<script>
    var session = "<?= $this->session->userdata('nama'); ?>";

    function sendwa_kmhs() {

        var uri = "https://wa.me/6281324388301?text=Saya, '" + session + "' ";
        var urlEndcode = encodeURI(uri);

        window.open(urlEndcode, "_blank")
    }

    function sendwa_akdmk() {

        var uri = "https://wa.me/6281324388301?text=Saya, '" + session + "' ";
        var urlEndcode = encodeURI(uri);

        window.open(urlEndcode, "_blank")
    }

    function sendwa_kaset() {

        var uri = "https://wa.me/6281324388301?text=Saya, '" + session + "' ";
        var urlEndcode = encodeURI(uri);

        window.open(urlEndcode, "_blank")
    }

    function sendwa_wk2() {

        var uri = "https://wa.me/6281324388301?text=Saya, '" + session + "' ";
        var urlEndcode = encodeURI(uri);

        window.open(urlEndcode, "_blank")
    }
</script>