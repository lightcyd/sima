<div class="row">
  <div class="container">
    <div class="col-12">
      <!-- Default box -->
      <!-- Card Filter -->
      <div class="card">
        <div class="card-header">
          <h5 class="card-title font-weight-bold">DASHBOARD KAJIAN</h5>
          <div class="row">
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <label for="">Periode</label>
                <div class="d-flex flex-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="startdate" placeholder="Tanggal Awal" name="tgl_awal" value="<?= date('Y-m-d'); ?>" class="form-control form-control-sm" autocomplete="off">
                  </div>
                  <div class="input-group ml-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="enddate" placeholder="Tanggal Akhir" name="tgl_akhir" value="<?= date('Y-m-d'); ?>" class="form-control form-control-sm " autocomplete="off"><i class="fas fa-calender"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Devisi</label>
                  <div class="input-group">
                    <select name="devisi" id="devisi" class="form-control form-control-sm">
                      <option value="" selected disabled><b>Filter Divisi</b></option>
                      <?php foreach ($devisi as $v) : ?>
                        <option value="<?= $v['id']; ?>"><?= $v['divisi']; ?></option>
                      <?php endforeach ?>
                      <option value="all">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Pic</label>
                  <div class="form-group">
                    <select name="pic" id="pic" class="form-control form-control-sm">
                      <option value="" selected disabled><b>Filter PIC</b></option>
                      <?php foreach ($pic as $v) : ?>
                        <option value="<?= $v['id']; ?>"><?= $v['nama_pic']; ?></option>
                      <?php endforeach ?>
                      <option value="all">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Kajian</label>
                  <div class="form-group">
                    <select name="kajian" id="kajian" class="form-control form-control-sm">
                      <option value="" selected disabled><b>Filter Kajian</b></option>
                      <?php foreach ($kaji as $v) : ?>
                        <option value="<?= $v['id']; ?>"><?= $v['jenis_kajian']; ?></option>
                      <?php endforeach ?>
                      <option value="all">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Progress</label>
                  <div class="form-group">
                    <select name="progress" id="progress" class="form-control form-control-sm">
                      <?php foreach ($prog as $v) : ?>
                        <option value="<?= $v['id']; ?>"><?= $v['status']; ?></option>
                      <?php endforeach ?>
                      <option value="all">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <button class="btn btn-primary btn-sm"> Filter</button>
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
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-primary">
          <div class="d-flex flex-row justify-content-between">
            <h3 class="card-title font-weight-bold"><i class="fas fa-file-alt"></i> ARSIP</h3>
            <a href="<?= base_url('add/arsip'); ?>" class="card-title btn btn-sm btn-light"><i class="fas fa-plus"></i> <b>Data</b></a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered tabel_arsip tabel-hover font-weight-bold" style="zoom: 80%;">
            <thead style="background-color: antiquewhite;">
              <tr>
                <th>NO</th>
                <th style="width: 5%;">NO.MEMO</th>
                <th style="width: 20%;">PIC</th>
                <th style="width: 8%;">KAJIAN</th>
                <th style="width: 8%;">DIVISI</th>
                <th style="width: 8%;">TIPE</th>
                <th>TGL</th>
                <th>TGL PROS</th>
                <th>TGL DOK</th>
                <th>TGL SELESAI</th>
                <th style="width: 8%;">HARI</th>
                <th>PROGRESS</th>
                <th>ALAT</th>
              </tr>
            </thead>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

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