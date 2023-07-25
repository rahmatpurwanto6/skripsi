<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta http-equiv="refresh" content="5"> -->
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
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<div class="logo">
				<span class="logo-mini"><img src="<?= base_url('assets/img/favicon.png') ?>" style="height: 45px; width: 45px;"></span>
				<span class="logo-lg">
					<img src="<?= base_url('assets/img/favicon.png') ?>" style="height: 45px; width: 45px;">
				</span>
			</div>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Notifications: style can be found in dropdown.less -->
						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<?php $notif = $this->Pengajuan_m->total_notif(); ?>
								<span class="label label-pill label-warning count" id="tot_notif"><?= $notif; ?></span>
							</a>
							<!-- <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    inner menu: contains the actual data
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul> -->
						</li>
						<!-- Tasks: style can be found in dropdown.less -->
						<ul class="nav navbar-nav">
							<li>
								<a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
						</ul>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li <?= $this->uri->segment(1) == 'superadmin' || $this->uri->segment(1) == 'admin1' || $this->uri->segment(1) == 'admin2' || $this->uri->segment(1) == 'kemhs' || $this->uri->segment(1) == 'dosen' || $this->uri->segment(1) == 'mhs' ? 'class = "active"' : '' ?>>
						<?php $role_id = $this->session->userdata('role_id');
						if ($role_id == 1) :
						?>
							<a href="<?= base_url('superadmin') ?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						<?php elseif ($role_id == 2) : ?>
							<a href="<?= base_url('admin1') ?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						<?php elseif ($role_id == 3) : ?>
							<a href="<?= base_url('admin2') ?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						<?php elseif ($role_id == 4) : ?>
							<a href="<?= base_url('kemhs') ?>">
								<i class="fa fa-home"></i> <span>Beranda</span>
							</a>
						<?php elseif ($role_id == 5) : ?>
							<a href="<?= base_url('k_aset') ?>">
								<i class="fa fa-home"></i> <span>Beranda</span>
							</a>
						<?php elseif ($role_id == 6) : ?>
							<a href="<?= base_url('wk2') ?>">
								<i class="fa fa-home"></i> <span>Beranda</span>
							</a>
						<?php elseif ($role_id == 7) : ?>
							<a href="<?= base_url('dosen') ?>">
								<i class="fa fa-home"></i> <span>Beranda</span>
							</a>
						<?php elseif ($role_id == 8) : ?>
							<a href="<?= base_url('mhs') ?>">
								<i class="fa fa-home"></i> <span>Beranda</span>
							</a>
						<?php endif; ?>
					</li>

					<?php
					$role_id = $this->session->userdata('role_id');
					if ($role_id == 1) : ?>
						<li <?= $this->uri->segment(1) == 'kelas' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('kelas') ?>">
								<i class="fa fa-bars"></i>
								<span>Kelas</span>
							</a>
						</li>
						<li <?= $this->uri->segment(1) == 'jurusan' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('jurusan') ?>">
								<i class="fa fa-bars"></i>
								<span>Jurusan</span>
							</a>
						</li>
						<li <?= $this->uri->segment(1) == 'organisasi' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>>
							<a href="<?= base_url('organisasi') ?>">
								<i class="fa fa-bars"></i>
								<span>Organisasi</span>
							</a>
						</li>
					<?php endif; ?>

					<?php
					$role_id = $this->session->userdata('role_id');
					if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 7 || $role_id == 8) : ?>
						<li class="treeview <?= $this->uri->segment(1) == 'ruangan' || $this->uri->segment(1) == 'statusruangan' || $this->uri->segment(1) == 'statusruanganadmin1' || $this->uri->segment(1) == 'statusruanganadmin2' ? 'active' : '' ?>">
							<a>
								<i class="fa fa-bars"></i>
								<span>Ruangan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 1) : ?>
									<li <?= $this->uri->segment(1) == 'ruangan' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('ruangan') ?>"><i class="fa fa-circle-o"></i> Data Ruangan</a></li>
								<?php endif; ?>

								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 1 || $role_id == 4 || $role_id == 7 || $role_id == 8) : ?>
									<li <?= $this->uri->segment(1) == 'statusruangan' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('statusruangan') ?>"><i class="fa fa-circle-o"></i> Status Ruangan</a></li>
								<?php elseif ($role_id == 2) : ?>
									<li <?= $this->uri->segment(1) == 'statusruanganadmin1' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('statusruanganadmin1') ?>"><i class="fa fa-circle-o"></i> Status Ruangan</a></li>
								<?php elseif ($role_id == 3) : ?>
									<li <?= $this->uri->segment(1) == 'statusruanganadmin2' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('statusruanganadmin2') ?>"><i class="fa fa-circle-o"></i> Status Ruangan</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>

					<?php
					$role_id = $this->session->userdata('role_id');
					if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 7 || $role_id == 8) : ?>
						<li class="treeview <?= $this->uri->segment(1) == 'pengajuan' || $this->uri->segment(1) == 'rekap' || $this->uri->segment(1) == 'pengajuan_admin1' || $this->uri->segment(1) == 'pengajuan_admin2' || $this->uri->segment(1) == 'pengajuan_dosen' || $this->uri->segment(1) == 'pengajuan_mhs' || $this->uri->segment(1) == 'pengajuan_kemhs' || $this->uri->segment(1) == 'rekap' || $this->uri->segment(1) == 'rekap1' || $this->uri->segment(1) == 'rekap2' ? 'active' : '' ?>">
							<a>
								<i class="fa fa-book"></i>
								<span>Peminjaman</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- superadmin -->
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 1) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan') ?>"><i class="fa fa-circle-o"></i> Pengajuan Peminjaman</a></li>
								<?php endif; ?>
								<!-- end superadmin -->

								<!-- admin1 -->
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 2) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan_admin1' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan_admin1') ?>"><i class="fa fa-circle-o"></i> Pengajuan Peminjaman</a></li>
								<?php endif; ?>
								<!-- end admin1 -->

								<!-- admin2 -->
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 3) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan_admin2' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan_admin2') ?>"><i class="fa fa-circle-o"></i> Pengajuan Peminjaman</a></li>
								<?php endif; ?>
								<!-- end admin2 -->
								<!-- dosen dan mhs -->
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 7) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan_dosen' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan_dosen') ?>"><i class="fa fa-circle-o"></i> Pengajuan Dosen</a></li>
								<?php elseif ($role_id == 8) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan_mhs' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan_mhs') ?>"><i class="fa fa-circle-o"></i> Pengajuan Mahasiswa</a></li>
								<?php elseif ($role_id == 4) : ?>
									<li <?= $this->uri->segment(1) == 'pengajuan_kemhs' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('pengajuan_kemhs') ?>"><i class="fa fa-circle-o"></i> Pengajuan Kemahasiswaan</a></li>
								<?php endif; ?>
								<!-- end dosen dan mhs -->

								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 1 || $role_id == 2 || $role_id == 3) : ?>
									<!-- superadmin -->
									<?php
									$role_id = $this->session->userdata('role_id');
									if ($role_id == 1) : ?>
										<li <?= $this->uri->segment(1) == 'rekap' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('rekap') ?>"><i class="fa fa-circle-o"></i> Rekap Peminjaman</a></li>
									<?php endif; ?>
									<!-- end superadmin -->
									<!-- admin1 -->
									<?php
									$role_id = $this->session->userdata('role_id');
									if ($role_id == 2) : ?>
										<li <?= $this->uri->segment(1) == 'rekap1' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('rekap1') ?>"><i class="fa fa-circle-o"></i> Rekap Peminjaman</a></li>
									<?php endif; ?>
									<!-- end admin1 -->
									<!-- admin2 -->
									<?php
									$role_id = $this->session->userdata('role_id');
									if ($role_id == 3) : ?>
										<li <?= $this->uri->segment(1) == 'rekap2' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('rekap2') ?>"><i class="fa fa-circle-o"></i> Rekap Peminjaman</a></li>
									<?php endif; ?>
									<!-- end admin1 -->
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>

					<?php
					$role_id = $this->session->userdata('role_id');
					if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6) : ?>
						<li class="treeview <?= $this->uri->segment(1) == 'persetujuan' || $this->uri->segment(1) == 'persetujuan_admin1' || $this->uri->segment(1) == 'persetujuan_admin2' || $this->uri->segment(1) == 'persetujuan_kemhs' || $this->uri->segment(1) == 'approve_k_aset' || $this->uri->segment(1) == 'approve_wk2' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a>
								<i class="fa fa-book"></i>
								<span>Persetujuan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 1) : ?>
									<li <?= $this->uri->segment(1) == 'persetujuan' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('persetujuan') ?>"><i class="fa fa-circle-o"></i> Persetujuan Akademik</a></li>
								<?php elseif ($role_id == 2) : ?>
									<li <?= $this->uri->segment(1) == 'persetujuan_admin1' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('persetujuan_admin1') ?>"><i class="fa fa-circle-o"></i> Persetujuan Akademik</a></li>
								<?php elseif ($role_id == 3) : ?>
									<li <?= $this->uri->segment(1) == 'persetujuan_admin2' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('persetujuan_admin2') ?>"><i class="fa fa-circle-o"></i> Persetujuan Akademik</a></li>
								<?php endif; ?>

								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 4) : ?>
									<li <?= $this->uri->segment(1) == 'persetujuan_kemhs' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('persetujuan_kemhs') ?>"><i class="fa fa-circle-o"></i> Persetujuan Kemahasiswaan</a></li>
								<?php endif; ?>

								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 5) : ?>
									<li <?= $this->uri->segment(1) == 'approve_k_aset' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('approve_k_aset') ?>"><i class="fa fa-circle-o"></i> Persetujuan Koordinator Aset</a></li>
								<?php endif; ?>

								<?php
								$role_id = $this->session->userdata('role_id');
								if ($role_id == 6) : ?>
									<li <?= $this->uri->segment(1) == 'approve_wk2' || $this->uri->segment(1) == '' ? 'class = "active"' : '' ?>><a href="<?= base_url('approve_wk2') ?>"><i class="fa fa-circle-o"></i> Persetujuan Wakil Ketua 2</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?= $contents; ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.8
			</div>
			<strong>Copyright &copy; 2020 <b>Sekolah Tinggi Teknologi Bandung</b>.
		</footer>



		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-user bg-yellow"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

									<p>New phone +1(800)555-1234</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

									<p>nora@example.com</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-file-code-o bg-green"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

									<p>Execution time 5 seconds</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="label label-danger pull-right">70%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Update Resume
									<span class="label label-success pull-right">95%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-success" style="width: 95%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Laravel Integration
									<span class="label label-warning pull-right">50%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Back End Framework
									<span class="label label-primary pull-right">68%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

				</div>
				<!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Some information about this general settings option
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Allow mail redirect
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Other sets of options are available
							</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Expose author name in posts
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Allow the user to show his name in blog posts
							</p>
						</div>
						<!-- /.form-group -->

						<h3 class="control-sidebar-heading">Chat Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Show me as online
								<input type="checkbox" class="pull-right" checked>
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Turn off notifications
								<input type="checkbox" class="pull-right">
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Delete chat history
								<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
							</label>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
	<!-- jQuery 2.2.3 -->
	<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- DataTables -->
	<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?= base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?= base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url('assets') ?>/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets') ?>/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
	<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>

	<!-- ChartJS 1.0.1 -->
	<script src="<?= base_url('assets') ?>/plugins/chartjs/Chart.min.js"></script>

	<script>
		$(document).ready(function() {
			setInterval(function() {
				$.ajax({
					type: "post",
					dataType: "json",
					url: "<?= base_url('pengajuan/get_notif') ?>",
					success: function(data) {
						$('#tot_notif').html(data.tot);
					}
				});
			}, 2000);
		});
	</script>

	<script>
		$("#tabel1").DataTable({
			"order": [],

			"columnDefs": [{
				"orderable": false,
				"className": "text-center",
				// "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
			}, ]
		});
	</script>


	<script>
		var pusher, chanelPusher;

		$(document).ready(function() {
			Pusher.logToConsole = true;

			pusher = new Pusher('0166cb402b0e4792b138', {
				cluster: 'ap1'
			});

			chanelPusher = pusher.subscribe('peminjamanruangansttb');
			chanelPusher.bind('my-event', function(data) {
				showDesktopNotification(data)
			});
			chanelPusher.bind('acc_kmhs', function(data) {
				showDesktopNotification(data)
			});
			chanelPusher.bind('acc_akdmk', function(data) {
				showDesktopNotification(data)
			});
			chanelPusher.bind('k_aset', function(data) {
				showDesktopNotification(data)
			});
			chanelPusher.bind('acc_wk2', function(data) {
				showDesktopNotification(data)
			});
		});

		function showDesktopNotification(data) {
			var granted = false;
			// Let's check if the browser supports notifications
			if (!("Notification" in window)) return alert("This browser does not support desktop notification");

			// Let's check if the user is okay to get some notification
			if (Notification.permission === "granted") granted = true;

			// Otherwise, we need to ask the user for permission
			if (!granted) {
				Notification.requestPermission(function(permission) {
					// If the user is okay, let's create a notification
					if (permission === "granted") {
						granted = true;
					}
				});
			}

			if (granted) {
				var showNotif = new Notification(data.title, {
					body: data.message,
					icon: '<?= base_url('assets/img/sttb2.png') ?>'
				});

				showNotif.onclick = function() {
					// window.open("<?= base_url('pengajuan') ?>", "_blank")
					showNotif.close();
				}
			} else {
				alert("Akses notifikasi tidak diizinkan, silahkan izinkan terlebih dahulu agar fitur notifikasi aktif")
			}
		}
	</script>


</body>

</html>
