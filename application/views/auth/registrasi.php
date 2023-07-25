<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <p><b>Registrasi</b></p>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Registrasi Akun Baru</p>

            <form action="<?= base_url('auth/simpan') ?>" method="post">
                <div class="form-group has-feedback">
                    <label>NIM</label>
                    <input type="text" name="username" class="form-control" autocomplete="off" value="<?= set_value('username') ?>">
                    <small class="text-danger"><?= form_error('username'); ?></small>
                </div>
                <div class="form-group has-feedback">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" autocomplete="off" value="<?= set_value('nama') ?>">
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group has-feedback">
                    <label>Password</label>
                    <input type="password" name="password1" class="form-control">
                    <small class="text-danger"><?= form_error('password1'); ?></small>
                </div>
                <div class="form-group has-feedback">
                    <label>Ketik ulang password</label>
                    <input type="password" name="password2" class="form-control">

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
                        <a href="<?= base_url('auth') ?>" class="btn btn-default btn-block btn-flat">Sudah memiliki akun</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets') ?>/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>