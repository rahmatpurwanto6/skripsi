<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/select2.min.css">

<section class="content-header">
    <h1>Halaman Pengajuan Peminjaman Ruangan</h1>
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
                    <form action="<?= base_url('pengajuan_admin1/simpan'); ?>" method="post">
                        <div class="form-group">
                            <label>Petugas</label>
                            <input type="text" name="petugas" class="form-control" value="<?= $this->session->userdata('nama'); ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label id="ID">NIDN</label>
                            <select class="form-control id" name="id" id="id" style="width: 100%" value="<?= set_value('id'); ?>">
                                <option value=""></option>
                            </select>
                            <small class="text-danger"><?= form_error('id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" autocomplete="off" placeholder="Dosen, Mahasiswa, Lainnya...">
                            <small class="text-danger"><?= form_error('jabatan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Kampus</label>
                            <select name="kampus" id="kampus" class="form-control" readonly>
                                <option value="1" selected>1</option>
                            </select>
                            <small class="text-danger"><?= form_error('kampus'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Ruangan</label>
                            <select name="ruangan" id="ruangan" class="form-control">
                                <option value=""></option>
                                <?php foreach ($ruangan as $row) : ?>
                                    <option value="<?= $row['id_ruangan'] ?>"><?= $row['ruangan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('ruangan'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="tgl1" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('tgl1'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="tgl2" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('tgl2'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Mulai</label>
                            <input type="time" name="mulai" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('mulai'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Selesai</label>
                            <input type="time" name="selesai" class="form-control" autocomplete="off">
                            <small class="text-danger"><?= form_error('selesai'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <textarea name="keperluan" id="keperluan" class="form-control" style="resize: none;"></textarea>
                            <small class="text-danger"><?= form_error('keperluan'); ?></small>
                        </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('pengajuan_admin1'); ?>" class="btn btn-default">Kembali</a>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->

<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/plugins/select2/select2.full.min.js"></script>

<script>
    $('.id').select2({
        minimumInputLength: 3,
        ajax: {
            url: "<?= base_url() ?>pengajuan/dosen",
            dataType: "json",
            type: "post",
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page
                }
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: data.total_count
                    }
                }
            },
        },
        cache: true,

        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.text);


        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.text;
    }
</script>

<!-- <script>
    $(document).ready(function() {
        $('#kampus').change(function() {
            var id = $('#kampus').val();
            if (id == '1') {
                $.ajax({
                    url: "<?= base_url(); ?>pengajuan/getruangan",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#ruangan').html(data);
                    }
                });
            } else if (id == '2') {
                $.ajax({
                    url: "<?= base_url(); ?>pengajuan/getruangan",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#ruangan').html(data);
                    }
                });
            }
        });
    });
</script> -->