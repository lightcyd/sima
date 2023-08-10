<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php echo form_open_multipart(md5('proses_simpan')); ?>
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
          <h5 class="card-title font-weight-bold">TAMBAH DATA ARSIP</h5>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <div class="row">
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex flex-row">
            <div class="col-lg-4">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_no_memo" class="form-label">NOMOR MEMO <span class="text-danger">*</span></label>
                  <input type="text" name="add_no_memo" id="add_no_memo" class="form-control form-control-sm <?= form_error('add_no_memo') ? 'is-invalid' : ''; ?>" placeholder="No. Memo" aria-describedby="add_no_memo" value="<?= set_value('add_no_memo'); ?>"></input>
                  <div class="invalid-feedback"><?= form_error('add_no_memo', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_divisi" class="form-label">DIVISI <span class="text-danger">*</span></label>
                  <select type="text" name="add_divisi" id="add_divisi" class="form-control form-control-sm <?= form_error('add_divisi') ? 'is-invalid' : ''; ?>">
                    <option value="">[ PILIH DIVISI ]</option>
                    <?php foreach ($divisi as $v) : ?>
                      <option value="<?= $v['id']; ?>" <?= set_value('add_divisi') == $v['id'] ? 'selected' : ''; ?>><?= $v['divisi']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback"><?= form_error('add_divisi', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_pic" class="form-label">PIC <span class="text-danger">*</span></label>
                  <select type="text" name="add_pic" id="add_pic" class="form-control form-control-sm <?= form_error('add_pic') ? 'is-invalid' : ''; ?>">
                    <option value="">[ PILIH PIC ]</option>
                    <?php foreach ($pic as $v) : ?>
                      <option value="<?= $v['id']; ?>" <?= set_value('add_pic') == $v['id'] ? 'selected' : ''; ?>><?= $v['nama_pic']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback"><?= form_error('add_pic', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="col-lg-6">
              <div class="mb-2">
                <div class="form-group">
                  <label for="startdate" class="form-label">TANGGAL MEMO <span class="text-danger">*</span></label>
                  <input type="text" value="<?= set_value('add_tgl_memo'); ?>" name="add_tgl_memo" placeholder="Tanggal Memo" class="form-control form-control-sm datepicker <?= form_error('add_tgl_memo') ? 'is-invalid' : ''; ?>" autocomplete="off"></input>
                  <div class="invalid-feedback"><?= form_error('add_tgl_memo', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-2">
                <div class="form-group">
                  <label for="enddate" class="form-label">TANGGAL DISPOSISI <span class="text-danger">*</span></label>
                  <input type="text" name="add_tgl_disposisi" placeholder="Tanggal Disposisi" class="form-control form-control-sm datepicker <?= form_error('add_tgl_memo') ? 'is-invalid' : ''; ?>" value="<?= set_value('add_tgl_disposisi'); ?>" autocomplete="off"></input>
                  <div class="invalid-feedback"><?= form_error('add_tgl_disposisi', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column">
            <div class="d-flex flex-row">
              <div class="col-lg-6">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="add_jns_kajian" class="form-label">JENIS KAJIAN <span class="text-danger">*</span></label>
                    <select name="add_jns_kajian" id="add_jns_kajian" cols="1" rows="3" class="form-control form-control-sm <?= form_error('add_jns_kajian') ? 'is-invalid' : ''; ?>">
                      <option value="">[ PILIH KAJIAN ]</option>
                      <?php foreach ($kaji as $v) : ?>
                        <option value="<?= $v['id']; ?>" <?= $v['id'] == set_value('add_jns_kajian') ? 'selected' : ''; ?>><?= $v['jenis_kajian']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback"><?= form_error('add_jns_kajian', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="add_status" class="form-label">STATUS <span class="text-danger">*</span></label>
                    <select name="add_status" id="add_status" cols="1" rows="3" class="form-control form-control-sm <?= form_error('add_status') ? 'is-invalid' : ''; ?>">
                      <option value="">[ PILIH STATUS ]</option>
                      <?php foreach ($prog as $v) : ?>
                        <option value="<?= $v['id']; ?>" <?= $v['id'] == set_value('add_status') ? 'selected' : ''; ?>><?= $v['status']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback"><?= form_error('add_status', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_kajian_resiko" class="form-label">KAJIAN RISIKO <span class="text-danger">*</span></label>
                  <textarea name="add_kajian_resiko" id="add_kajian_resiko" cols="1" rows="3" class="form-control form-control-sm <?= form_error('add_kajian_resiko') ? 'is-invalid' : ''; ?>" placeholder="Ketik disini..."><?= set_value('add_kajian_resiko'); ?></textarea>
                  <div class="invalid-feedback"><?= form_error('add_kajian_resiko', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_follow_up" class="form-label">FOLLOW UP<span class="text-danger">*</span></label>
                  <textarea name="add_follow_up" id="add_follow_up" cols="1" rows="3" class="form-control form-control-sm <?= form_error('add_follow_up') ? 'is-invalid' : ''; ?>" placeholder="Ketik disini..."><?= set_value('add_follow_up'); ?></textarea>
                  <div class="invalid-feedback"><?= form_error('add_kajian_resiko', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center align-middle">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="add_tgl_kelengkapan_memo" class="form-label text-muted">TANGGAL INPUT DOKUMEN TERAKHIR</label>
                <input value="<?= set_value('add_tgl_kelengkapan_memo'); ?>" type="text" name="add_tgl_kelengkapan_memo" id="add_tgl_kelengkapan_memo" class="form-control ml-2 form-control-sm datepicker <?= form_error('add_tgl_kelengkapan_memo') ? 'is-invalid' : ''; ?>" placeholder="Pilih Tanggal" autocomplete="off">
                <div class="invalid-feedback"><?= form_error('add_tgl_kelengkapan_memo', '<p class="text-danger font-weight-bold">', '</p>'); ?></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="file_memo_unit" class="form-label">MEMO UNIT</label>
                <input class="form-control form-control-sm" name="file_memo_unit" id="file_memo_unit" type="file">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CARD UNTUK UPLOAD FILE -->
<div class="row">
  <div class="container">
    <div class="col-12">
      <div class="card">
        <!-- CARD HEADER -->
        <div class="card-header bg-primary">
          <h5 class="card-title font-weight-bold">UPLOAD DATA MEMO</h5>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <div class="row">
          </div>
        </div>
        <!-- Card BODY -->
        <div class="card-body">
          <div class="d-flex flex-column">
            <div class="col-lg-12 mb-2 badge badge-secondary">
              <h5 class="card-title font-weight-bold">DEPARTMENT</h5>
            </div>
            <div class="col-lg-12">
              <div class="row">
                <?php foreach ($kelompok as $v) : ?>
                  <div class="col-lg-3">
                    <div class="mb-3">
                      <label for="<?= $v['department']; ?>" class="form-label"><?= $v['department']; ?></label>
                      <input type="file" name="memo_file[]" class="form-control form-control-sm" id="<?= $v['department']; ?>">
                      <input type="hidden" name="id_departemen_file[]" value="<?= $v['id']; ?>">
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <hr>
          <div class="d-flex flex-row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="tgl_memoirs" class="form-label text-muted">TANGGAL KELUAR MEMO IRS</label>
                <input type="text" id="tgl_memoirs" name="tgl_memoirs" class="form-control form-control-sm datepicker" placeholder="Pilih Tanggal" autocomplete="off">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="formFileSm" class="form-label">MEMO IRS</label>
                <input class="form-control form-control-sm" name="file_memo_irs" id="formFileSm" type="file">
              </div>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="tgl_implementasi" class="form-label text-muted">TANGGAL MEMO IMPLEMENTASI</label>
                <input type="text" name="tgl_implementasi" id="tgl_implementasi" class="form-control form-control-sm datepicker" placeholder="Pilih Tanggal" autocomplete="off">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="formFileSm" class="form-label">MEMO IMPLEMENTASI</label>
                <input class="form-control form-control-sm" name="file_memo_imp" id="formFileSm" type="file">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="container">
    <div class="mb-5">
      <div class="col-lg-12">
        <button class="btn btn-success btn-sm btn-block">SUBMIT</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>

<script>
  $(document).ready(function() {
    $(".select2").select2();
    $(".progress").select2({
      theme: "classic"
    });
    setInterval(() => {
      $(".alert").alert('close');
    }, 3000);
  });
</script>