<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">

      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="col-12">
          <?php if ($this->session->flashdata('success')) :  ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-2" role="alert">
              <i class="fas fa-check-circle fa-2x"></i> &nbsp;
              <strong><?= $this->session->flashdata('success'); ?></strong>
            </div>
          <?php endif; ?>
          <!-- Default box -->
          <!-- Card Filter -->
          <div class="card">
            <div class="card-header bg-primary">
              <h5 class="card-title font-weight-bold">TAMBAH DATA PIC</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="card-body">
              <?php echo form_open('proses_add_pic'); ?>
              <div class="d-flex flex-row">
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="add_npp" class="form-label">NOMOR NPP <span class="text-danger">*</span></label>
                      <input type="text" name="add_npp" id="add_npp" class="form-control form-control-sm <?= form_error('add_npp') ? 'is-invalid' : ''; ?>" placeholder="NPP" aria-describedby="add_npp" value="<?= set_value('add_npp'); ?>"></input>
                      <div class="invalid-feedback"><?= form_error('add_npp', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="add_nama" class="form-label">NAMA PIC <span class="text-danger">*</span></label>
                      <input type="text" name="add_nama" class="form-control form-control-sm <?= form_error('add_nama') ? 'is-invalid' : ''; ?>" placeholder="Nama" aria-describedby="add_nama">
                      <div class="invalid-feedback"><?= form_error('add_nama', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="add_tgl_lahir" class="form-label">TANGGAL LAHIR <span class="text-danger">*</span></label>
                      <input type="text" id="add_tgl_lahir" value="<?= set_value('add_tgl_lahir'); ?>" name="add_tgl_lahir" placeholder="Tanggal Lahir" class="form-control form-control-sm datepicker <?= form_error('add_tgl_lahir') ? 'is-invalid' : ''; ?>" autocomplete="off"></input>
                      <div class="invalid-feedback"><?= form_error('add_tgl_lahir', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="add_role" class="form-label">ROLE</label>
                      <select name="add_role" id="add_role" class="form-control form-control-sm">
                        <option value="users">USERS</option>
                        <option value="admin">ADMIN</option>
                      </select>
                      <div class="invalid-feedback"><?= form_error('add_npp', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="col-lg-12">
                  <div class="mt-2">
                    <button class="btn btn-sm btn-success" type="submit">TAMBAH DATA</button>
                  </div>
                </div>
              </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script>
  $(document).ready(function() {
    $('.tabel_pic').DataTable();


    // Mengikuti perubahan tanggal pada elemen dengan ID "startdate"
    $(".filter").on("click", function(e) {
      e.preventDefault();
      table1.ajax.reload();
    });
  });
</script>