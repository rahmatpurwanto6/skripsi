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
                                        <!-- detail superadmin -->
                                        <?php
                                        $role_id = $this->session->userdata('role_id');
                                        if ($role_id == 1) : ?>
                                            <a href="<?= base_url('rekap/detail_rekap/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </a>
                                        <?php endif; ?>
                                        <!-- end detail superadmin -->

                                        <!-- print rekap superadmin admin -->
                                        <?php
                                        $role_id = $this->session->userdata('role_id');
                                        if ($role_id == 1) : ?>

                                            <!-- <a href="<?= base_url('rekap/print_rekap_ormawa/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i> </a> -->

                                            <a href="<?= base_url('rekap/print_rekap/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-primary btn-sm" target="_blank"> <i class="fa fa-print"></i> </a>

                                        <?php endif; ?>
                                        <!-- end print rekap superadmin admin -->

                                        <!-- detail admin1 -->
                                        <?php
                                        $role_id = $this->session->userdata('role_id');
                                        if ($role_id == 2) : ?>
                                            <a href="<?= base_url('rekap/detail_rekap/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                        <?php endif; ?>
                                        <!-- end detail admin1 -->

                                        <a href="<?= base_url('rekap/hapus/') . encrypt_url($row['id_rekap']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"> <i class="fa fa-trash-o"></i></a>
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

<!-- <section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Data Peminjam</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="myChart" style="height:230px"></canvas>
            </div>
        </div>
    </div>
</section> -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Periode Tanggal</h4>
            </div>
            <form action="<?= base_url('rekap/print_periode') ?>" method="post" target="_blank">
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
<!-- ChartJS 1.0.1 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
        $("#tabel2").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('rekap/get_rekap') ?>",
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

<script>
    <?php
    foreach ($tampil as $row) {
        $total = $row['orang'];
        $jabatan = $row['jabatan'];
    }
    ?>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['<?= $jabatan ?>'],
            datasets: [{
                label: 'Data Peminjam Ruangan',
                data: [
                    <?= $total; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>