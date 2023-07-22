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
              <h5 class="card-title font-weight-bold">TAMBAH DATA DIVISI</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="card-body">
              <?php echo form_open('prosess'); ?>
              <div class="d-flex flex-row">
                <div class="col-lg-6">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="add_npp" class="form-label">DIVISI <span class="text-danger">*</span></label>
                      <input type="text" name="add_divisi" id="add_divisi" class="form-control form-control-sm <?= form_error('add_divisi') ? 'is-invalid' : ''; ?>" placeholder="Nama divisi" aria-describedby="add_divisi" value="<?= set_value('add_divisi'); ?>"></input>
                      <div class="invalid-feedback"><?= form_error('add_divisi', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                    </div>
                    <button class="btn btn-sm btn-secondary back"><i class="fas fa-arrow-alt-circle-left"></i> KEMBALI</button>
                    <button type="submit" name="submit_divisi" class="btn btn-sm btn-success"><i class="fas fa-save"></i> SIMPAN</button>
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

    $(".back").click(function(e) {
      e.preventDefault();
      location.href = "<?= base_url('master_divisi') ?>"
    });

    // Mengikuti perubahan tanggal pada elemen dengan ID "startdate"
    $(".filter").on("click", function(e) {
      e.preventDefault();
      table1.ajax.reload();
    });
  });
</script>