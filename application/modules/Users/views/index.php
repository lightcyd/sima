<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <!-- Card Filter -->
    <div class="card">
      <div class="card-header">
        <div class="card-title h5 font-weight-bold">DASHBOARD KAJIAN</div>
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
                  <select name="progres" class="form-control form-control-sm progress"></select>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label>Pic</label>
                <div class="form-group">
                  <select name="progres" class="form-control form-control-sm progress"></select>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label>Kajian</label>
                <div class="form-group">
                  <select name="progres" class="form-control form-control-sm progress"></select>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label>Progress</label>
                <div class="form-group">
                  <select name="progres" class="form-control form-control-sm progress"></select>
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
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <table class="table tabel_arsip tabel-hover">
          <thead>
            <tr>
              <th>NO</th>
              <th>NO. MEMO</th>
              <th>KAJIAN</th>
              <th>DEVISI</th>
              <th>TIPE</th>
              <th>TANGGAL</th>
              <th>TANGGAL PROS</th>
              <th>TANGGAL DOK</th>
              <th>TANGGAL SELESAI</th>
              <th>HARI</th>
              <th>PROGRESS</th>
              <th>PIC</th>
              <th>ALAT</th>
            </tr>
          </thead>
        </table>
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
      // "processing": true,
      // "serverSide": true,
      "responsive": false,
      "destroy": true,
      "language": {
        "infoFiltered": "",
        "processing": "<i class='fa fa-refresh fa-spin ml-4'></i> Request Server"
      },
      "columnDefs": [{
        "targets": [0, 2, 3, 4],
        "orderable": false
      }],
      "select": true,
      "lengthMenu": [
        [10, 50, 100, -1],
        [10, 50, 100, "All"]
      ],
      "ajax": {
        "url": "<?php echo site_url(''); ?>",
        "type": "POST",
        "data": function(data) {
          data.tgl = tgl_awal;
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
  });
</script>