<!-- <meta http-equiv="refresh" content="5"> -->
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Status Ruangan
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- tabel ruangan kampus 1 -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    Kampus 1
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body table-responsive">

                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ruangan</th>
                                    <th>Kampus</th>
                                    <th>Status</th>
                                    <?php
                                    $role = $this->session->userdata('role_id');
                                    if ($role == 1 || $role == 2 || $role == 3) :
                                    ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                    <th>Ket.</th>
                                </tr>
                            </thead>
                            <tbody id="ruangan1">

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!-- end tabel ruangan kampus 1 -->

        <!-- tabel ruangan kampus 2 -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    Kampus 2
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">

                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ruangan</th>
                                    <th>Kampus</th>
                                    <th>Status</th>
                                    <?php
                                    $role = $this->session->userdata('role_id');
                                    if ($role == 1 || $role == 2 || $role == 3) :
                                    ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                    <th>Ket.</th>
                                </tr>
                            </thead>
                            <tbody id="ruangan2">

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!-- end tabel ruangan kampus 2 -->
    </div>

</section>
<!-- /.content -->
<!-- /.content-wrapper -->

<!-- modal update -->
<div id="modalupdate" class="modal fade">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan merubahnya?</p>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" name="ruangan" id="ruangan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kampus</label>
                        <input type="text" name="kampus" id="kampus" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value=""></option>
                            <option value="0">Tersedia</option>
                            <option value="1">Dipinjamkan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- end modal update -->

<!-- modal keterangan -->
<div id="modalket" class="modal fade">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Data Peminjam Ruangan</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" name="ruangan" id="ruangan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kampus</label>
                        <input type="text" name="kampus" id="kampus" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Dari</label>
                        <input type="text" name="dari" id="dari" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Sampai</label>
                        <input type="text" name="sampai" id="sampai" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="text" name="mulai" id="mulai" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <input type="text" name="selesai" id="selesai" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
                    <!-- <button type="submit" id="submit" class="btn btn-primary">Simpan</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- end modal keterangan -->



<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script>
    var session = '<?= $this->session->userdata('role_id') ?>';

    var loadtable = function() {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?= base_url('statusruangan/ajaxruangan1') ?>',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + no++ + '</td>' +
                        '<td>' + data[i].ruangan + '</td>' +
                        '<td>' + data[i].id_kampus + '</td>' +
                        '<td>' + (data[i].status == 1 ? '<div class="btn btn-danger btn-xs">Dipinjam</div>' : '<div class="btn btn-success btn-xs">Tersedia</div>') + '</td>' + (session == 1 || session == 2 || session == 3 ? '<td> <button type="button" id="update" data="' + data[i].id_ruangan + '" class="btn btn-primary btn-sm btn-update" data-toggle="modal" data-target="#modalupdate"><i class="fa fa-edit"></i></button> </td>' : '') +
                        '<td>' + (data[i].status == 1 ? '<button type="button" id="ket" data="' + data[i].id_ruangan + '" class="btn btn-info btn-sm btn-ket" data-toggle="modal" data-target="#modalket"><i class="fa fa-eye"></i></button>' : '') + ' </td>' +
                        '</tr>';
                }
                $('#ruangan1').html(html);
            }
        });
    };

    var cron_update = function() {
        $.ajax({
            type: 'post',
            url: '<?= base_url('cron/loadwaktu') ?>',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                loadtable();
            }
        });
    }



    $(document).ready(function() {

        // 10000 maksudna, setiap 1 detik, lmun ke0cepetan bisa dikurangi

        window.setInterval(loadtable, 2000)
        window.setInterval(cron_update, 2000)

        loadtable();

        // get update
        $('#ruangan1').on('click', '#update', function() {
            var id = $(this).attr("data");

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/getupdate') ?>',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modalupdate').modal('show');
                    $('[name="id"]').val(data.id_ruangan);
                    $('[name="ruangan"]').val(data.ruangan);
                    $('[name="kampus"]').val(data.id_kampus);
                },
                error: function(err) {
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

        //save update
        $('#submit').on('click', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var ruangan = $('#ruangan').val();
            var kampus = $('#kampus').val();
            var status = $('#status').val();

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/updateruangan') ?>',
                dataType: 'json',
                data: {
                    id: id,
                    ruangan: ruangan,
                    kampus: kampus,
                    status: status
                },
                success: function(data) {
                    $('[name="id"]').val("");
                    $('[name="ruangan"]').val("");
                    $('[name="kampus"]').val("");
                    $('[name="status"]').val("");
                    $('#modalupdate').modal('hide');
                    loadtable();
                },
                error: function(err) {
                    $('#modalupdate').modal('hide');
                    loadtable();
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

        // get keterangan1
        $('#ruangan1').on('click', '#ket', function() {
            var id = $(this).attr("data");

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/getket') ?>',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modalket').modal('show');
                    $('[name="id"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="ruangan"]').val(data.ruangan);
                    $('[name="kampus"]').val(data.kampus);
                    $('[name="dari"]').val(data.tgl1);
                    $('[name="sampai"]').val(data.tgl2);
                    $('[name="mulai"]').val(data.mulai);
                    $('[name="selesai"]').val(data.selesai);
                },
                error: function(err) {
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

    });
</script>

<script>
    var loadtable2 = function() {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?= base_url('statusruangan/ajaxruangan2') ?>',
            success: function(data) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + no++ + '</td>' +
                        '<td>' + data[i].ruangan + '</td>' +
                        '<td>' + data[i].id_kampus + '</td>' +
                        '<td>' + (data[i].status == 1 ? '<div class="btn btn-danger btn-xs">Dipinjam</div>' : '<div class="btn btn-success btn-xs">Tersedia</div>') + '</td>' + (session == 1 || session == 2 || session == 3 ? '<td> <button type="button" id="update" data="' + data[i].id_ruangan + '" class="btn btn-primary btn-sm btn-update" data-toggle="modal" data-target="#modalupdate"><i class="fa fa-edit"></i></button> </td>' : '') +
                        '<td>' + (data[i].status == 1 ? '<button type="button" id="ket" data="' + data[i].id_ruangan + '" class="btn btn-info btn-sm btn-ket" data-toggle="modal" data-target="#modalket"><i class="fa fa-eye"></i></button>' : '') + ' </td>'
                    '</tr>';
                }
                $('#ruangan2').html(html);
            }
        });
    };


    var cron_update2 = function() {
        $.ajax({
            type: 'post',
            url: '<?= base_url('cron/loadwaktu') ?>',
            dataType: 'json',
            success: function(data) {
                // var html = '';
                // var i;
                // var no = 1;
                // for (i = 0; i < data.length; i++) {
                //     html += '<tr>' +
                //         '<td>' + no++ + '</td>' +
                //         '<td>' + data[i].ruangan + '</td>' +
                //         '<td>' + data[i].id_kampus + '</td>' +
                //         '<td>' + (data[i].status == 1 ? '<div class="btn btn-danger btn-xs">Dipinjam</div>' : '<div class="btn btn-success btn-xs">Tersedia</div>') + '</td>' + (session == 1 || session == 2 || session == 3 ? '<td> <button type="button" id="update" data="' + data[i].id_ruangan + '" class="btn btn-primary btn-xs btn-update" data-toggle="modal" data-target="#modalupdate"><i class="fa fa-edit"></i></button> </td>' : '') +
                //         '</tr>';
                // }
                // $('#ruangan2').html(html);
                loadtable2();
            }
        });
    }

    // var cron_set2 = function() {
    //     $.ajax({
    //         type: 'post',
    //         url: '<?= base_url('cron/setruanganotomatis') ?>',
    //         dataType: 'json',
    //         success: function(data) {
    //             for (i = 0; i < data.length; i++) {
    //                 html += '<tr>' +
    //                     '<td>' + no++ + '</td>' +
    //                     '<td>' + data[i].ruangan + '</td>' +
    //                     '<td>' + data[i].id_kampus + '</td>' +
    //                     '<td>' + (data[i].status == 1 ? '<div class="btn btn-danger btn-xs">Dipinjam</div>' : '<div class="btn btn-success btn-xs">Tersedia</div>') + '</td>' + (session == 1 || session == 2 || session == 3 ? '<td> <button type="button" id="update" data="' + data[i].id_ruangan + '" class="btn btn-primary btn-xs btn-update" data-toggle="modal" data-target="#modalupdate"><i class="fa fa-edit"></i></button> </td>' : '') +
    //                     '</tr>';
    //             }
    //             $('#ruangan2').html(html);
    //         }
    //     });
    // }

    $(document).ready(function() {

        window.setInterval(loadtable2, 2000)
        window.setInterval(cron_update2, 2000)
        // window.setInterval(cron_set2, 2000)
        loadtable2();

        // get update
        $('#ruangan2').on('click', '#update', function() {
            var id = $(this).attr("data");

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/getupdate') ?>',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modalupdate').modal('show');
                    $('[name="id"]').val(data.id_ruangan);
                    $('[name="ruangan"]').val(data.ruangan);
                    $('[name="kampus"]').val(data.id_kampus);
                },
                error: function(err) {
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

        //save update
        $('#submit').on('click', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var ruangan = $('#ruangan').val();
            var kampus = $('#kampus').val();
            var status = $('#status').val();

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/updateruangan') ?>',
                dataType: 'json',
                data: {
                    id: id,
                    ruangan: ruangan,
                    kampus: kampus,
                    status: status
                },
                success: function(data) {
                    $('[name="id"]').val("");
                    $('[name="ruangan"]').val("");
                    $('[name="kampus"]').val("");
                    $('[name="status"]').val("");
                    $('#modalupdate').modal('hide');
                    loadtable2();
                },
                error: function(err) {
                    $('#modalupdate').modal('hide');
                    loadtable2();
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

        // get keterangan2
        $('#ruangan2').on('click', '#ket', function() {
            var id = $(this).attr("data");

            $.ajax({
                type: 'post',
                url: '<?= base_url('statusruangan/getket2') ?>',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modalket').modal('show');
                    $('[name="id"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="ruangan"]').val(data.ruangan);
                    $('[name="kampus"]').val(data.kampus);
                    $('[name="dari"]').val(data.tgl1);
                    $('[name="sampai"]').val(data.tgl2);
                    $('[name="mulai"]').val(data.mulai);
                    $('[name="selesai"]').val(data.selesai);
                },
                error: function(err) {
                    alert('Oops Something went wrong in our server, please try again')
                    console.log(err)
                }
            });
        });

    });
</script>