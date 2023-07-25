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

                    <!-- superadmin -->
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    if ($role_id == 1) { ?>
                        <a href="<?= base_url('pengajuan/tambah_kemhs'); ?>" class="btn btn-primary" style="margin-top: 1px;"><i class="fa fa-plus"></i> Pengajuan untuk kemahasiswaan</a>
                        <a href="<?= base_url('pengajuan/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk dosen</a>
                        <a href="<?= base_url('pengajuan/tambah_mhs'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk mahasiswa</a>
                    <?php } ?>
                    <!-- end superadmin -->

                    <!-- admin1 -->
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    if ($role_id == 2) { ?>
                        <a href="<?= base_url('pengajuan_admin1/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk dosen</a>
                        <a href="<?= base_url('pengajuan_admin1/tambah_mhs'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Pengajuan untuk mahasiswa</a>
                        <!-- <a href="<?= base_url('pengajuan_admin1/tambah_ormawa'); ?>" class="btn btn-primary" style="margin-top: 1px;"><i class="fa fa-plus"></i> Pengajuan untuk ormawa</a> -->
                    <?php } ?>
                    <!-- end admin1 -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered text-center" id="table3">
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
<p id="token"></p>

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>

<script>
    $(document).ready(function() {
        setInterval(load_data, 3000);
        load_data();
    });

    function load_data() {
        $("#table3").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "destroy": true,
            "searching": false,

            "ajax": {
                "url": "<?= base_url('pengajuan/get_datapinjam') ?>",
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