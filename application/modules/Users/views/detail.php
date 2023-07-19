<section>
  <?= form_open_multipart(); ?>
  <div class="row">
    <div class="container">
      <div class="col-lg-12">
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
                      <?php foreach ($devisi as $v) : ?>
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
                    <input type="text" name="no_memo" placeholder="Tanggal Memo" value="<?= date('d-m-Y', strtotime($arsip->tgl_memo)) ?>" class="form-control form-control-sm datepicker" disabled></input>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="enddate" class="form-label">TANGGAL DISPOSISI <span class="text-danger">*</span></label>
                    <input type="text" name="no_memo" placeholder="Tanggal Disposisi" value="<?= date('d-m-Y', strtotime($arsip->tgl_disposisi)) ?>" disabled class="form-control form-control-sm datepicker"></input>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-column">
              <div class="col-lg-12">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_jns_kajian" class="form-label">JENIS KAJIAN <span class="text-danger">*</span></label>
                    <select name="kajian_resiko" id="update_jns_kajian" cols="1" rows="3" class="form-control form-control-sm" disabled>
                      <option value="">[ PILIH KAJIAN ]</option>
                      <?php foreach ($kaji as $v) : ?>
                        <option value="<?= $v['id']; ?>" <?= $arsip->jenis_kajian == $v['id'] ? 'selected' : '' ?>><?= $v['jenis_kajian']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-2">
                  <div class="form-group">
                    <label for="update_kajian_resiko" class="form-label">KAJIAN RESIKO <span class="text-danger">*</span></label>
                    <textarea name="kajian_resiko" id="update_kajian_resiko" cols="1" rows="3" class="form-control form-control-sm" placeholder="Ketik disini..." disabled><?= $arsip->kajian_resiko; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="d-flex align-items-center align-middle">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="update_kajian_resiko" class="form-label text-muted">TANGGAL INPUT KELENGKAPAN DATA MEMO</label>
                  <input type="text" name="update_kajian_resiko" class="form-control ml-2 form-control-sm datepicker" placeholder="Pilih Tanggal" value="<?= date('d-m-Y', strtotime($arsip->tgl_input)); ?>" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="formFileSm" class="form-label">MEMO UNIT</label>
                  <input class="form-control form-control-sm" id="formFileSm" type="file" value="<?= $arsip->file_memo_unit; ?>" disabled>
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
                  <!-- <?php foreach ($kelompok as $v) : ?>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label for="<?= $v['department']; ?>" class="form-label"><?= $v['department']; ?></label>
                      <input type="file" name="memo_<?= $v['id']; ?>" class="form-control form-control-sm" id="<?= $v['department']; ?>" disabled>
                      <?php foreach ($file as $isi) : ?>
                        <a id="prememo" href="<?= base_url('Uploads/memo/') . $isi['file_memo'] ?>" class="btn-link h6 form-control-plaintext" target="_blank"><i class="fas fa-file-alt"></i> PREVIEW FILE <?= $isi['file_memo'] . $v['department']; ?></a>
                      <?php endforeach ?>
                      </input>
                    </div>
                  </div>
                <?php endforeach ?> -->

                  <?php foreach ($kelompok as $v) : ?>
                    <div class="col-md-3">
                      <div class="mb-3">
                        <label for="<?= $v['department']; ?>" class="form-label"><?= $v['department']; ?></label>
                        <input type="file" name="memo_<?= $v['id']; ?>" class="form-control form-control-sm" id="<?= $v['id']; ?>" disabled>
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
                  <label for="update_kajian_resiko" class="form-label text-muted">TANGGAL INPUT KELENGKAPAN DATA IRS</label>
                  <input type="text" name="tgl_memoirs" class="form-control form-control-sm datepicker" value="<?= $arsip->tgl_selesai ? date('d-m-Y', strtotime($arsip->tgl_selesai)) : '' ?>" placeholder="Tanggal IRS" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="fileirs" class="form-label">MEMO IRS</label>
                  <input class="form-control form-control-sm" id="fileirs" type="file" disabled>
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
                  <label for="update_kajian_resiko" class="form-label text-muted">TANGGAL INPUT KELENGKAPAN DATA IMPLEMENTASI</label>
                  <input type="text" name="tgl_memoirs" class="form-control form-control-sm datepicker" value="<?= $arsip->tgl_impl ? date('d-m-Y', strtotime($arsip->tgl_impl)) : '' ?>" placeholder="Tanggal Implementasi" disabled>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="fileimpl" class="form-label">MEMO IMPLEMENTASI</label>
                  <input class="form-control form-control-sm" id="fileimpl" type="file" disabled>
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
        <div class="col-lg-6">
          <button type="reset" class="btn btn-primary btn-sm btn-block">EDIT</button>
        </div>
        <div class="col-lg-6">
          <button type="submit" class="btn btn-success btn-sm btn-block" id="submit" disabled>SUBMIT</button>
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


    let tgl_awal = $("#startdate").val();
    // Mendefinisikan tabel arsip menggunakan datatabel
    var table1 = $('.tabel_arsip').DataTable({
      "processing": true,
      "serverSide": true,
      "responsive": false,
      "destroy": true,
      "responsive": false,
      // "columnDefs": [{
      //   "targets": [0, 2, 3, 4],
      //   "orderable": false
      // }],
      "select": true,
      "ajax": {
        "url": "<?php echo site_url('request_arsip_table'); ?>",
        "type": "POST",
        // "data": function(data) {
        //   data.tgl = tgl_awal;
        // },
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