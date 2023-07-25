<section class="content-header">
    <h1>Halaman Ubah Ruangan</h1>
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
                <?php foreach ($row as $data) { ?>

                    <div class="box-body">
                        <form action="<?= base_url('ruangan/edit_ruangan'); ?>" method="post">
                            <input type="hidden" name="id" class="form-control" value="<?= $data['id_ruangan']; ?>">

                            <div class="form-group">

                                <label>Ruangan</label>
                                <input type="text" name="ruangan" class="form-control" value="<?= $data['ruangan']; ?>" autocomplete="off">
                                <small class="text-danger"><?= form_error('ruangan'); ?></small>
                            </div>
                            <div class="form-group">

                                <label>Kampus</label>
                                <input type="text" name="kampus" class="form-control" value="<?= $data['id_kampus']; ?>" autocomplete="off">
                                <small class="text-danger"><?= form_error('kampus'); ?></small>
                            </div>

                    </div>
                <?php } ?>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('ruangan'); ?>" class="btn btn-default">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.box -->
</section>
<!-- /.content -->