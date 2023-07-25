<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css">

<section class="content-header">
    <h1>
        Daftar Organisasi
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

                    <a href="<?= base_url('organisasi/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Organisasi</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th>Organisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampil as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['organisasi']; ?></td>
                                    <td>
                                        <a href="<?= base_url('organisasi/ubah/') . $row['id_organisasi']; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> ubah</a>
                                        <a href="<?= base_url('organisasi/hapus/') . $row['id_organisasi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"> <i class="fa fa-trash-o"></i> hapus</a>
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
    $(function() {
        $("#table1").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('organisasi/get_dataorganisasi') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "orderable": false,
                "className": "text-center",
                "targets": [0, 2]
            }, ]
        });
    });
</script>