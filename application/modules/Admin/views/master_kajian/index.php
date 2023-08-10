<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">MASTER KAJIAN</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="d-flex flex-row justify-content-between">
                <a href="<?= base_url('add/kajian'); ?>" class="card-title btn btn-sm btn-light"><i class="fas fa-plus"></i> <b>Data</b></a>
              </div>
            </div>
            <div class="card-body">
              <?php if ($this->session->flashdata('success')) :  ?>
                <div class="col-lg-12">
                  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle fa-2x"></i> &nbsp;
                    <strong><?= $this->session->flashdata('success'); ?></strong>
                  </div>
                </div>
              <?php endif; ?>
              <table class="table table-bordered tabel_pic tabel-hover font-weight-bold">
                <thead style="background-color: antiquewhite;">
                  <tr>
                    <th>No</th>
                    <th>Jenis Kajian</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($kajian as $v) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $v['jenis_kajian'] ?></td>
                      <td>
                        <div class="btn-group">
                          <button value="<?= $v['id']; ?>" class="btn btn-sm btn-danger hapuskajian"><i class="fas fa-trash"></i></button>
                          <a href="<?= base_url('detail/kajian/') . $v['id'] ?>" class="btn btn-sm btn-info ml-1"><i class="fas fa-eye"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script>
  $(document).ready(function() {
    $(".select2").select2();
    $(".progress").select2({
      theme: "classic"
    });

    $(".hapuskajian").click(function(e) {
      e.preventDefault();
      var id = $(this).val();
      Swal.fire({
        title: 'Do you want to delete?',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            type: "post",
            url: "<?= base_url('delete/kajian') ?>",
            data: {
              id: id
            },
            dataType: "json",
            success: function(response) {
              Swal.fire('Saved!', '', 'success')
              location.reload();
            }
          });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
    });

    // Mengikuti perubahan tanggal pada elemen dengan ID "startdate"
    $(".filter").on("click", function(e) {
      e.preventDefault();
      table1.ajax.reload();
    });
  });
</script>