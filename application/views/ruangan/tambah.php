<section class="content-header">
    <h1>Halaman Tambah Ruangan</h1>
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
                    <form action="<?= base_url('ruangan/simpan'); ?>" method="post">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <input type="text" name="ruangan" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('ruangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Kampus</label>
                            <input type="text" name="kampus" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('kampus'); ?></small>
                        </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('ruangan'); ?>" class="btn btn-default">Kembali</a>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->