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
                    <input type="text" id="startdate" placeholder="Tanggal Awal" name="tgl_awal" value="" class="form-control form-control-sm tgl_awal" autocomplete="off">
                  </div>
                  <div class="input-group ml-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="enddate" placeholder="Tanggal Akhir" name="tgl_akhir" value="" class="form-control form-control-sm tgl_akhir" autocomplete="off"><i class="fas fa-calender"></i>
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
                        <option value="<?= $v['divisi']; ?>"><?= $v['divisi']; ?></option>
                      <?php endforeach ?>
                      <option value="">ALL</option>
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
                        <option value="<?= $v['nama_pic']; ?>"><?= $v['nama_pic']; ?></option>
                      <?php endforeach ?>
                      <option value="">ALL</option>
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
                        <option value="<?= $v['jenis_kajian']; ?>"><?= $v['jenis_kajian']; ?></option>
                      <?php endforeach ?>
                      <option value="">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Progress</label>
                  <div class="form-group">
                    <select name="progress" id="progress" class="form-control form-control-sm">
                      <option value="" selected disabled><b>Filter Progress</b></option>
                      <?php foreach ($prog as $v) : ?>
                        <option value="<?= $v['status']; ?>"><?= $v['status']; ?></option>
                      <?php endforeach ?>
                      <option value="">ALL</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <button class="btn btn-primary btn-sm filter"> Filter</button>
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
          <div class="mb-3">
            <?php if ($this->session->flashdata('success')) :  ?>
              <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-2" role="alert">
                <i class="fas fa-check-circle fa-2x"></i> &nbsp;
                <strong><?= $this->session->flashdata('success'); ?></strong>
              </div>
            <?php endif; ?>
          </div>
          <table class="table table-bordered tabel_arsip tabel-hover font-weight-bold" style="zoom: 90%;">
            <thead style="background-color: antiquewhite;">
              <tr>
                <th>NO</th>
                <th style="width: 5%;">NO.MEMO</th>
                <th style="width: 5%;">KAJIAN</th>
                <th style="width: 8%;">DIVISI</th>
                <th>TGL MEMO</th>
                <th>TGL DISPOSISI</th>
                <th style="width: 8%;">TIPE</th>
                <th style="width: 20%;">PIC</th>
                <th>TGL PROSES</th>
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

    // href="' . base_url('delete/arsip/' . $v->group_id) . '"

    // var tgl_awal = $(".tgl_awal").val();
    // var tgl_akhir = $(".tgl_akhir").val();
    // var devisi = $("#devisi").val();
    // var pic = $("#pic").val();
    // var kajian = $("#kajian").val();
    // var progress = $("#progress").val();
    // Mendefinisikan tabel arsip menggunakan datatabel
    var table1 = $('.tabel_arsip').DataTable({
      "processing": true,
      "serverSide": true,
      "responsive": false,
      "destroy": true,
      "scrollCollapse": true,
      "scrollX": true,
      "select": false,
      "columnDefs": [{
        "targets": 2,
        "render": function(data, type, row) {
          return '<div class="scrollable-cell">' + data + '</div>';
        }
      }],
      "ajax": {
        "url": "<?php echo site_url('request_arsip_table'); ?>",
        "type": "POST",
        "data": function(data) {
          data.tgl_awal = $(".tgl_awal").val();
          data.tgl_akhir = $(".tgl_akhir").val();
          data.divisi = $("#devisi").val();
          data.pic = $("#pic").val();
          data.kajian = $("#kajian").val();
          data.progress = $("#progress").val();
        },
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

    // Mengikuti perubahan tanggal pada elemen dengan ID "startdate"
    $(".filter").on("click", function(e) {
      e.preventDefault();
      table1.ajax.reload();
    });
  });
</script>