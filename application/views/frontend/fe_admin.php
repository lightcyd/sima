<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>SIMA | ADMINISTRATOR</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/solid.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/brands.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme Adminlte style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">

	<!-- Datatables -->
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>buttons.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select2.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>responsive.dataTables.min.css" />
	<!-- dateRangePicker -->
	<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>jquery-ui.min.css">

</head>

<body class="control-sidebar-slide-open text-sm layout-fixed text-sm">

	<!-- jQuery -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/jquery/') ?>jquery-3.7.0.min.js"></script>
	<!-- Bootstrap 4 -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap/js/') ?>bootstrap.bundle.min.js"></script>
	<!-- sweetalert2 -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/sweetalerts/') ?>sweetalert2.all.min.js"></script>
	<!-- Select2 -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/select2/'); ?>select2.min.js"></script>

	<!-- AdminLTE App -->
	<script type="text/javascript" src="<?= base_url('assets/dist/js/') ?>adminlte.min.js"></script>

	<!-- DateRangePicker -->
	<script type="text/javascript" src="<?= base_url('assets/js/') ?>jquery-ui.min.js"></script>


	<!-- Datatables -->
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>jszip.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>buttons.print.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.select.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>buttons.colVis.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.responsive.min.js"></script>





	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm border-bottom-0">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fas fa-cog"></i>
					</a>

					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
						<a href="#" class="dropdown-item">
							<i class="fas fa-user mr-2"></i> Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('logout'); ?>" class="dropdown-item text-danger">
							<i class="fas fa-sign-out-alt mr-2"></i> Logout
						</a>

					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary">
			<!-- Brand Logo -->
			<a href="http://localhost:8083" class="brand-link elevation-4">
				<img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-bold">SIMA ADMINISTRATOR</span>
			</a>
			<!-- Sidebar -->
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>Widgets<span class="right badge badge-danger">New</span></p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>Master<i class="fas fa-angle-left right"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('master_pic'); ?>" class="nav-link">
										<i class="fas fa-users-cog nav-icon"></i>
										<p>MASTER PIC</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('master_divisi'); ?>" class="nav-link">
										<i class="fas fa-cog nav-icon"></i>
										<p>MASTER DIVISI & DEPARTMENT</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('master_kajian'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>MASTER KAJIAN</p>
									</a>
								</li>

							</ul>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<div class="content-wrapper">
			<?= $content; ?>

		</div>
		<!-- /.control-sidebar -->
	</div>
	<script>
		$(document).ready(function() {
			$(".datepicker").datepicker({
				showWeek: true,
				firstDay: 1,
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				showButtonPanel: true,
				showAnim: 'drop'
			});
		});
	</script>
	<!-- ./wrapper -->
	<!-- DEFAULT TEMPLATE FOR DATATABELS SETTINGS -->
	<script type="text/javascript">
		$.extend($.fn.dataTable.defaults, {
			dom: 'Bfrtip',
			"aLengthMenu": [
				[10, 50, 100, 500, -1],
				[10, 50, 100, 500, 'ALL']
			],
			"language": {
				zeroRecords: "Maaf data tidak ditemukan",
				info: "<b class='ml-1 text-muted opacity-50'>_START_ - _END_ dari _TOTAL_ Data</b>",
				infoEmpty: "0 sampai 0 dari 0 data",
				infoFiltered: "<b class='text-muted opacity-50'>(Disaring dari _MAX_ Total Data)</b>",
				searchPlaceholder: 'Cari disini',
				search: '',
				thousands: '.'
			},
			buttons: ['pageLength', {
					extend: 'print',
					messageTop: 'Print by <?= $this->session->userdata("nama") ?> at <?= date("d/m/Y H:i:s") ?>',
					customize: function(win) {
						$(win.document.body)
							.css('font-size', '10pt')
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
					}
				},
				'excel',
				'copy',
				'colvis'
			],
			select: true,
			responsive: true,
			scrollY: '100vh',
			scrollCollapse: true,
		});
	</script>
</body>

</html>