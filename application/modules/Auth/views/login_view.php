<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf_token" content="<?php echo $this->security->get_csrf_hash(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMA</title>
  <link rel="shortcut icon" href="<?= base_url('assets/logo/logodm.png'); ?>" />
  <link rel="icon" href="<?= base_url('assets/logo/logodm.png'); ?>" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>font-awesome.all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>jquery-ui.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>select2.min.css" />
</head>

<body class="sidebar-collapse login-page">
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="container col-lg-6 col-md-6">
          <div class="card rounded-4 shadow-lg">
            <div class="card-header bg-primary bg-gradient">
              <h5 class="text-primary text-center text-light">LOGIN <i class="fas fa-sign-in-alt"></i></h5>
            </div>
            <div class="card-body">
              <?= form_open(base_url(md5('prelogin')), ['method' => 'post', 'autocomplete' => 'off']); ?>
              <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" id="inputUsername" autocomplete="false" placeholder="Username" required>
              </div>
              <div class="input-group input-group-sm mb-2">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                <input type="password" name="password" id="password" class="form-control" autocomplete="false" placeholder="Password">
                <button id="toggle-password" type="button" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></button>
              </div>
              <?php if ($this->session->flashdata('error')) :  ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mt-2" role="alert">
                  <i class="fas fa-warning"></i> &nbsp;
                  <strong> <?= $this->session->flashdata('error'); ?></strong>
                </div>
              <?php endif; ?>
              <button type="submit" class="btn rounded-2 mt-3 btn-sm btn-block btn-outline-primary float-right">Masuk </button>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>jquery-3.7.0.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>popper.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>bootstrap-5.2.3.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>highcharts.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>data.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>drilldown.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>exporting.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>export-data.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>accessibility.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>jszip.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>buttons.print.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/') ?>dataTables.select.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/'); ?>select2.min.js"></script>
<script>
  $(document).ready(function() {
    setInterval(() => {
      $(".alert").alert('close');
    }, 5000);

    $("#inputUsername").on("input", function(e) {
      e.preventDefault();
      let user = $(this).val();
      $.ajax({
        type: "post",
        url: "<?= base_url(md5('validate_username')) ?>",
        data: {
          username: user
        },
        dataType: "JSON",
        success: function(data) {
          if (data.sts === 'done') {
            $("#inputUsername").addClass('is-valid');
            $("#inputUsername").removeClass('is-invalid');
          } else {
            $("#inputUsername").addClass('is-invalid');
            $("#inputUsername").removeClass('is-valid');
            $("#message").addClass('invalid-feedback');
            $("#message").html('<b class="text-danger mt-1">Nrk Tidak Ditemukan!</b>');
          }
        },
      });
    });

    $('#toggle-password').click(function() {
      var passwordField = $('#password');
      var passwordFieldType = passwordField.attr('type');
      if (passwordFieldType == 'password') {
        passwordField.attr('type', 'text');
        $(this).html('<i class="fas fa-eye-slash"></i>');
      } else {
        passwordField.attr('type', 'password');
        $(this).html('<i class="fas fa-eye"></i>');
      }
    });
  });
</script>

</html>