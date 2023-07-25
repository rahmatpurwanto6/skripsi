<section class="content-header">
    <h1>Halaman Ubah Organisasi</h1>
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
                        <form action="<?= base_url('organisasi/edit_organisasi'); ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="<?= $data['id_organisasi']; ?>">

                                <label>Organisasi</label>
                                <input type="text" name="organisasi" class="form-control" value="<?= $data['organisasi']; ?>" autocomplete="off">
                                <small class="text-danger"><?= form_error('organisasi'); ?></small>
                            </div>

                    </div>
                <?php } ?>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('organisasi'); ?>" class="btn btn-default">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.box -->
</section>
<!-- /.content -->