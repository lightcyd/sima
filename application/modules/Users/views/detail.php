<section>
  <?= form_open_multipart(md5('proses_update')); ?>
  <?= form_hidden('update_id_group', $arsip->group_file_id); ?>
  <div class="row">
    <div class="container">
      <div class="col-lg-12">

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
            <h5 class="card-title font-weight-bold">DETAIL DATA ARSIP</h5>
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
                    <label for="update_no_memo" class="form-label">NOMOR MEMO <span class="text-danger">*</span></label>
                    <input type="text" name="update_no_memo" id="update_no_memo" value="<?= $arsip->no_memo; ?>" class="form-control form-control-sm" placeholder="No. Memo" disabled></input>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_divisi" class="form-label">DIVISI <span class="text-danger">*</span></label>
                    <select type="text" name="update_divisi" id="update_divisi" class="form-control form-control-sm" disabled>
                      <option value="">[ PILIH DIVISI ]</option>
                      <?php foreach ($divisi as $v) : ?>
                        <option value="<?= $v['id']; ?>" <?= $arsip->divisi == $v['id'] ? 'selected' : '' ?>><?= $v['divisi']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_pic" class="form-label">PIC <span class="text-danger">*</span></label>
                    <select type="text" name="update_pic" id="update_pic" class="form-control form-control-sm" disabled>
                      <option value="">[ PILIH PIC ]</option>
                      <?php foreach ($pic as $v) : ?>
                        <option value="<?= $v['id']; ?>" <?= $arsip->pic == $v['id'] ? 'selected' : '' ?>><?= $v['nama_pic']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div class="col-lg-6">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="startdate" class="form-label">TANGGAL MEMO <span class="text-danger">*</span></label>
                    <input type="text" name="update_tgl_memo" id="update_tgl_memo" placeholder="Tanggal Memo" value="<?= $arsip->tgl_memo ?>" class="form-control form-control-sm datepicker" disabled></input>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="enddate" class="form-label">TANGGAL DISPOSISI <span class="text-danger">*</span></label>
                    <input type="text" name="update_tgl_disposisi" id="update_tgl_disposisi" placeholder="Tanggal Disposisi" value="<?= $arsip->tgl_disposisi ?>" disabled class="form-control form-control-sm datepicker"></input>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-column">
              <div class="d-flex flex-row">
                <div class="col-lg-6">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="update_jns_kajian" class="form-label">JENIS KAJIAN <span class="text-danger">*</span></label>
                      <select name="update_jns_kajian" id="update_jns_kajian" cols="1" rows="3" class="form-control form-control-sm" disabled>
                        <option value="">[ PILIH KAJIAN ]</option>
                        <?php foreach ($kaji as $v) : ?>
                          <option value="<?= $v['id']; ?>" <?= $arsip->jenis_kajian == $v['id'] ? 'selected' : '' ?>><?= $v['jenis_kajian']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-2">
                    <div class="form-group">
                      <label for="update_status" class="form-label">STATUS <span class="text-danger">*</span></label>
                      <select name="update_status" id="update_status" cols="1" rows="3" class="form-control form-control-sm" disabled>
                        <option value="">[ PILIH STATUS ]</option>
                        <?php foreach ($prog as $v) : ?>
                          <option value="<?= $v['id']; ?>" <?= $arsip->status == $v['status'] ? 'selected' : '' ?>><?= $v['status'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_kajian_resiko" class="form-label">KAJIAN RESIKO <span class="text-danger">*</span></label>
                    <textarea name="update_kajian_resiko" id="update_kajian_resiko" cols="1" rows="3" class="form-control form-control-sm" placeholder="Ketik disini..." disabled><?= $arsip->kajian_resiko; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_follow_up" class="form-label">Follow Up<span class="text-danger">*</span></label>
                    <textarea name="update_follow_up" id="update_follow_up" cols="1" rows="3" class="form-control form-control-sm" placeholder="Ketik disini..."><?= $arsip->follow_up; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="d-flex align-items-center align-middle">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="update_tgl_kelengkapan_memo" class="form-label text-muted">TANGGAL INPUT KELENGKAPAN DATA MEMO</label>
                  <input type="text" name="update_tgl_kelengkapan_memo" id="update_tgl_kelengkapan_memo" class="form-control ml-2 form-control-sm datepicker" placeholder="Pilih Tanggal" value="<?= $arsip->tgl_input; ?>" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="file_memo_unit" class="form-label">MEMO UNIT</label>
                  <input name="file_memo_unit" class="form-control form-control-sm" id="file_memo_unit" type="file" value="<?= $arsip->file_memo_unit; ?>" disabled>
                </div>
              </div>
              <?php if (!empty($arsip->file_memo_unit)) :  ?>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="prememo" class="form-label">Preview</label>
                    <a id="prememo" href="<?= base_url('Uploads/memo/') . $arsip->file_memo_unit ?>" class="form-control-plaintext" target="_blank"><i class="fas fa-file-alt"></i> FILE</a>
                  </div>
                </div>
              <?php endif ?>
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
            <h5 class="card-title font-weight-bold">DATA MEMO</h5>
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
                    <div class="col-md-3">
                      <div class="mb-3">
                        <label for="<?= $v['department']; ?>" class="form-label"><?= $v['department']; ?></label>
                        <input type="file" name="memo_file_update[]" class="form-control form-control-sm memo_file_update" disabled>
                        <input type="hidden" name="id_departemen_file[]" value="<?= $v['id']; ?>">
                        <?php foreach ($file as $isi) : ?>
                          <?php if ($isi['departmen_id'] == $v['id']) : ?>
                            <a id="prememo" href="<?= base_url('Uploads/memo/') . $isi['file_memo'] ?>" class="btn-link h6 form-control-plaintext" target="_blank">
                              <i class="fas fa-file-alt"></i> PREVIEW FILE <?= $v['department']; ?>
                            </a>
                          <?php endif; ?>
                        <?php endforeach ?>
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
                  <label for="update_tgl_memoirs" class="form-label text-muted">TANGGAL SELESAI MEMO IRS</label>
                  <input type="text" name="update_tgl_memoirs" id="update_tgl_memoirs" class="form-control form-control-sm datepicker" value="<?= $arsip->tgl_selesai ? $arsip->tgl_selesai : '' ?>" placeholder="Tanggal IRS" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="file_memo_irs" class="form-label">MEMO IRS</label>
                  <input class="form-control form-control-sm" name="file_memo_irs" id="file_memo_irs" type="file" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <?php if (!empty($arsip->file_memo_irs)) : ?>
                  <div class="mb-3">
                    <label for="prememo" class="form-label">Preview</label>
                    <a id="prememo" href="<?= base_url('Uploads/memo/') . $arsip->file_memo_irs ?>" class="form-control-plaintext" target="_blank"><i class="fas fa-file-alt"></i> FILE</a>
                  </div>
                <?php endif ?>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="update_tgl_implementasi" class="form-label text-muted">TANGGAL IMPLEMENTASI</label>
                  <input type="text" name="update_tgl_implementasi" class="form-control form-control-sm datepicker" id="update_tgl_implementasi" value="<?= $arsip->tgl_impl ? $arsip->tgl_impl : '' ?>" placeholder="Tanggal Implementasi" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="file_memo_imp" class="form-label">MEMO IMPLEMENTASI</label>
                  <input class="form-control form-control-sm" id="file_memo_imp" type="file" disabled>
                </div>
              </div>
              <?php if (!empty($arsip->file_memo_impl)) : ?>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="prememo" class="form-label">Preview</label>
                    <a id="prememo" href="<?= base_url('Uploads/memo/') . $arsip->file_memo_impl ?>" class="form-control-plaintext" target="_blank"><i class="fas fa-file-alt"></i> FILE</a>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="container">
      <div class="d-flex flex-row mb-5">
        <div class="col-lg-4">
          <button class="btn btn-primary btn-sm btn-block" id="update">EDIT <i class="fas fa-pencil-circle"></i></button>
        </div>
        <div class="col-lg-4">
          <button class="btn btn-danger btn-sm btn-block" id="reset" disabled>CANCEL <i class="fas fa-times"></i></button>
        </div>
        <div class="col-lg-4">
          <button type="submit" class="btn btn-success btn-sm btn-block" id="submit" disabled>SUBMIT <i class="fas fa-check-circle"></i></button>
        </div>
      </div>
    </div>
  </div>

  <?= form_close(); ?>
</section>


<script>
  $(document).ready(function() {
    $(".select2").select2();
    $(".progress").select2({
      theme: "classic"
    });

    $("#update").click(function(e) {
      e.preventDefault();
      $(this).attr('disabled', 'disabled');
      $("#reset").removeAttr('disabled');
      $("#submit").removeAttr('disabled');


      // remove disabled
      $("#update_no_memo").removeAttr('disabled');
      $("#update_divisi").removeAttr('disabled');
      $("#update_pic").removeAttr('disabled');
      $("#update_status").removeAttr('disabled');
      $("#update_tgl_memo").removeAttr('disabled');
      $("#update_tgl_disposisi").removeAttr('disabled');
      $("#update_jns_kajian").removeAttr('disabled');
      $("#update_kajian_resiko").removeAttr('disabled');
      $("#update_follow_up").removeAttr('disabled');
      $("#update_tgl_kelengkapan_memo").removeAttr('disabled');
      $("#file_memo_unit").removeAttr('disabled');
      $(".memo_file_update").removeAttr('disabled');
      $("#memo_group_update").removeAttr('disabled');
      $("#update_tgl_memoirs").removeAttr('disabled');
      $("#file_memo_irs").removeAttr('disabled');
      $("#update_tgl_implementasi").removeAttr('disabled');
      $("#file_memo_imp").removeAttr('disabled');
    });

    $("#reset").click(function(e) {
      e.preventDefault();
      $(this).attr('disabled', 'disabled');
      $("#update").removeAttr('disabled');
      $("#submit").attr('disabled', 'disabled');


      // Add attribute disabled
      $("#update_no_memo").attr('disabled', 'disabled');
      $("#update_divisi").attr('disabled', 'disabled');
      $("#update_pic").attr('disabled', 'disabled');
      $("#update_status").attr('disabled', 'disabled');
      $("#update_tgl_memo").attr('disabled', 'disabled');
      $("#update_tgl_disposisi").attr('disabled', 'disabled');
      $("#update_jns_kajian").attr('disabled', 'disabled');
      $("#update_kajian_resiko").attr('disabled', 'disabled');
      $("#update_follow_up").attr('disabled', 'disabled');
      $("#update_tgl_kelengkapan_memo").attr('disabled', 'disabled');
      $("#file_memo_unit").attr('disabled', 'disabled');
      $(".memo_file_update").attr('disabled', 'disabled');
      $("#memo_group_update").attr('disabled', 'disabled');
      $("#update_tgl_memoirs").attr('disabled', 'disabled');
      $("#file_memo_irs").attr('disabled', 'disabled');
      $("#update_tgl_implementasi").attr('disabled', 'disabled');
      $("#file_memo_imp").attr('disabled', 'disabled');
    });


    let tgl_awal = $("#startdate").val();
    // Mendefinisikan tabel arsip menggunakan datatabel
    var table1 = $('.tabel_arsip').DataTable({
      "processing": true,
      "serverSide": true,
      "responsive": false,
      "destroy": true,
      "responsive": false,
      "select": true,
      "ajax": {
        "url": "<?php echo site_url('request_arsip_table'); ?>",
        "type": "POST",
        "error": function(jqXHR, textStatus, errorThrown) {
          try {
            // Coba untuk mengurai pesan kesalahan dalam respons JSON jika ada
            var errorResponse = JSON.parse(jqXHR.responseText);
            console.log('Kesalahan: ' + errorResponse.message);
            // Tampilkan pesan kesalahan menggunakan Swal
            Swal.fire({
              icon: 'error',
              title: 'Terjadi Kesalahan Jaringan',
              toast: true,
              text: 'Pesan kesalahan: ' + errorResponse.message,
              timer: 1000
            });
          } catch (e) {
            // Jika gagal mengurai respons JSON, tangkap kesalahan dan ambil tindakan yang sesuai
            console.log('Kesalahan dalam menangani respons: ' + e);
            // Tampilkan pesan kesalahan menggunakan Swal
            Swal.fire({
              icon: 'error',
              title: 'Terjadi Kesalahan Jaringan',
              toast: true,
              text: 'Terjadi kesalahan dalam menangani respons.',
              timer: 1000
            });
          }
        },
        "beforeSend": function(jqXHR) {
          request = jqXHR; // Simpan objek jqXHR dalam variabel request
        },
        "complete": function() {
          request = null; // Setel variabel request menjadi null setelah permintaan selesai
        }
      }
    });
  });
</script>