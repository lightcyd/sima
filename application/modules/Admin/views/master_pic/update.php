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
              <h5 class="card-title font-weight-bold">UPDATE DATA PIC <?= $pic->nama_pic; ?></h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="card-body">
              <?php echo form_open('update_pic'); ?>
              <div class="d-flex flex-row">
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <?= form_hidden('id_npp', $pic->npp_pic); ?>
                      <label for="update_npp" class="form-label">NOMOR NPP <span class="text-danger">*</span></label>
                      <input type="text" name="update_npp" id="update_npp" class="form-control form-control-sm" placeholder="No. Memo" aria-describedby="update_npp" value="<?= $pic->npp_pic; ?>"></input>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="update_nama" class="form-label">NAMA PIC <span class="text-danger">*</span></label>
                      <input type="text" name="update_nama" class="form-control form-control-sm" value="<?= $pic->nama_pic; ?>" placeholder="Divisi" aria-describedby="update_nama">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="update_tgl_lahir" class="form-label">TANGGAL LAHIR <span class="text-danger">*</span></label>
                      <input type="text" id="update_tgl_lahir" value="<?= $pic->tgl_lahir; ?>" name="update_tgl_lahir" placeholder="Tanggal Memo" class="form-control form-control-sm datepicker" autocomplete="off"></input>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="col-lg-4">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="update_role" class="form-label">ROLE</label>
                      <select name="update_role" id="update_role" class="form-control form-control-sm">
                        <option value="users" <?= $user->role == 'users' ? 'selected' : '' ?>>USERS</option>
                        <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>ADMIN</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="col-lg-12">
                  <div class="mt-2">
                    <button class="btn btn-sm btn-success" type="submit">UPDATE DATA</button>
                    <a href="<?= base_url('master_pic'); ?>" class="btn btn-sm btn-secondary">KEMBALI</a>
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