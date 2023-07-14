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
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select2.min.css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>responsive.dataTables.min.css" />

  <!-- dateRangePicker -->
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>jquery-ui.min.css">

</head>

<body class="layout-top-nav text-sm">

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
  <script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.bootstrap5.min.js"></script>
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
      <div class="container">
        <a href="../../index3.html" class="navbar-brand">
          <img src="<?= base_url('assets/dist/img/'); ?>AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-bold">SIMA</span>
        </a>
        <!-- right menu nav -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <i class="fas fa-bars"></i>
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
      </div>
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
      <div class="content-header"></div>
      <section class="content">
        <div class="container">
          <?= $content; ?>
        </div>
      </section>
    </div>
    <!-- /.control-sidebar -->
  </div>

  <script>
    $(document).ready(function() {
      $("#startdate").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        onClose: function(selected) {
          if (selected.length <= 0) {
            $("#end").datepicker('disable');
          } else {
            $("#end").datepicker('enable');
          }
          $("#end").datepicker("option", "minDate", selected);
        }
      });
      $("#enddate").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        onClose: function(selected) {
          if (selected.length <= 0) {
            $("#end").datepicker('disable');
          } else {
            $("#end").datepicker('enable');
          }
          $("#end").datepicker("option", "minDate", selected);
        }
      });
    });
  </script>
  <!-- ./wrapper -->
</body>

</html>