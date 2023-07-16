<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMA</title>
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
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" id="inputUsername" autocomplete="false" placeholder="Username" required>
              </div>
              <div class="input-group mb-2">
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