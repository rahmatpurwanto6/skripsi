<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css">

<section class="content-header">
    <h1>
        Rekap Data Peminjaman Ruangan
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
                    <a href="#modal-default" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-search"></i> Print Perperiode</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered text-center" id="tabel2">
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampil as $row) { ?>

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
                                        <!-- detail admin1 -->
                                        <a href="<?= base_url('rekap1/detail_rekap/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>
                                        <!-- end detail admin1 -->

                                        <!-- print rekap admin1 admin -->
                                        <!-- <a href="<?= base_url('rekap1/print_rekap_ormawa1/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i> </a> -->

                                        <a href="<?= base_url('rekap1/print_rekap1/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i> </a>


                                        <!-- end print rekap admin1 admin -->

                                        <a href="<?= base_url('rekap1/hapus/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"> <i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                            <?php } ?>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Periode Tanggal</h4>
            </div>
            <form action="<?= base_url('rekap1/print_periode1') ?>" method="post" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="date" name="tgl1" id="tgl1" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Ke</label>
                        <input type="date" name="tgl2" id="tgl2" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Print</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->


<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(function() {
        $("#tabel2").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('rekap1/get_rekap1') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "orderable": false,
                "className": "text-center",
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }, ]
        });
    });
</script>