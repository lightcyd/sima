<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?= form_open_multipart(); ?>
<div class="row">
  <div class="container">
    <div class="col-12">
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
                  <label for="add_no_memo" class="form-label">Nomor Memo <span class="text-danger">*</span></label>
                  <input type="text" name="add_no_memo" id="add_no_memo" class="form-control form-control-sm" placeholder="No. Memo"></input>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_divisi" class="form-label">Divisi <span class="text-danger">*</span></label>
                  <select type="text" name="add_divisi" id="add_divisi" class="form-control form-control-sm">
                    <option value="">[ PILIH DIVISI ]</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_pic" class="form-label">PIC <span class="text-danger">*</span></label>
                  <select type="text" name="add_pic" id="add_pic" class="form-control form-control-sm">
                    <option value="">[ PILIH PIC ]</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="col-lg-6">
              <div class="mb-2">
                <div class="form-group">
                  <label for="startdate" class="form-label">Tanggal Memo <span class="text-danger">*</span></label>
                  <input type="text" name="no_memo" placeholder="Tanggal Memo" class="form-control form-control-sm datepicker"></input>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-2">
                <div class="form-group">
                  <label for="enddate" class="form-label">Tanggal Disposisi <span class="text-danger">*</span></label>
                  <input type="text" name="no_memo" placeholder="Tanggal Disposisi" class="form-control form-control-sm datepicker"></input>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column">
            <div class="col-lg-12">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_jns_kajian" class="form-label">Jenis Kajian Resiko <span class="text-danger">*</span></label>
                  <select name="kajian_resiko" id="add_jns_kajian" cols="1" rows="3" class="form-control form-control-sm">
                    <option value="">[ PILIH KAJIAN ]</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-2">
                <div class="form-group">
                  <label for="add_kajian_resiko" class="form-label">Kajian Resiko <span class="text-danger">*</span></label>
                  <textarea name="kajian_resiko" id="add_kajian_resiko" cols="1" rows="3" class="form-control form-control-sm" placeholder="Ketik disini..."></textarea>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center align-middle">
            <label for="add_kajian_resiko" class="card-subtitle text-muted">TANGGAL INPUT KELENGKAPAN DATA MEMO</label>
            <div class="col-lg-4">
              <input type="text" name="add_kajian_resiko" class="form-control ml-2 form-control-sm datepicker" placeholder="Pilih Tanggal">
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
            <div class="col-lg-12">
              <div class="mb-3">
                <label for="formFileSm" class="form-label">MEMO UNIT</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
            </div>
            <div class="col-lg-12 mb-2 badge badge-secondary">
              <h5 class="card-title font-weight-bold">NI KELOMPOK</h5>
            </div>
            <div class="col-lg-12">
              <div class="row">

                <?php foreach ($kelompok as $v) : ?>
                  <div class="col-lg-3">
                    <div class="mb-3">
                      <label for="<?= $v['department']; ?>" class="form-label"><?= $v['department']; ?></label>
                      <input type="file" name="memo_<?= $v['id']; ?>" class="form-control form-control-sm" id="<?= $v['department']; ?>">
                    </div>
                  </div>
                <?php endforeach ?>
                <!-- <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="ocr" class="form-label">OCR</label>
                    <input type="file" name="memo_ocr" class="form-control form-control-sm" id="ocr">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="obb" class="form-label">OBB</label>
                    <input type="file" name="memo_obb" class="form-control form-control-sm" id="obb">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="irs" class="form-label">IRS</label>
                    <input type="file" name="memo_irs" class="form-control form-control-sm" id="irs">
                  </div>
                </div> -->
              </div>
            </div>
            <!-- <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="krp" class="form-label">KRP</label>
                    <input type="file" name="memo_krp" class="form-control form-control-sm" id="krp">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="mrp" class="form-label">MRP</label>
                    <input type="file" name="memo_mrp" class="form-control form-control-sm" id="mro">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="mpf" class="form-label">MPF</label>
                    <input type="file" name="memo_mpf" class="form-control form-control-sm" id="mpf">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="rni" class="form-label">RNI</label>
                    <input type="file" name="memo_rni" class="form-control form-control-sm" id="rni">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="skr" class="form-label">SKR</label>
                    <input type="file" name="memo_skr" class="form-control form-control-sm" id="skr">
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          <hr>
          <div class="d-flex align-items-center align-middle">
            <label for="add_kajian_resiko" class="card-subtitle text-muted">TANGGAL INPUT KELENGKAPAN DATA IRS</label>
            <div class="col-lg-4">
              <input type="text" name="tgl_memoirs" class="form-control ml-2 form-control-sm datepicker" placeholder="Pilih Tanggal">
            </div>
          </div>
        </div>
        <?= form_close(); ?>

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