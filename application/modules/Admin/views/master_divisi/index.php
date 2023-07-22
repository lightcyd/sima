<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-lg-6">
        <?php if ($this->session->flashdata('success')) :  ?>
          <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mt-2" role="alert">
            <i class="fas fa-check-circle fa-2x"></i> &nbsp;
            <strong><?= $this->session->flashdata('success'); ?></strong>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="d-flex flex-row justify-content-between">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="d-flex flex-row justify-content-between">
              <h5>MASTER DIVISI</h5>
              <a href="<?= base_url('add/divisi'); ?>" class="card-title btn btn-sm btn-light"><i class="fas fa-plus"></i> <b>Data</b></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered tabel_pic tabel-hover font-weight-bold">
              <thead style="background-color: antiquewhite;">
                <tr>
                  <th>No</th>
                  <th>DIVISI</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($divisi as $v) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $v['divisi'] ?></td>
                    <td>
                      <div class="btn-group">
                        <button value="<?= $v['id']; ?>" class="btn btn-sm btn-danger hapuspic"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-sm btn-info ml-1"><i class="fas fa-eye"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="d-flex flex-row justify-content-between">
              <h5>MASTER DEPARTMENT</h5>
              <a href="<?= base_url('add/department'); ?>" class="card-title btn btn-sm btn-light"><i class="fas fa-plus"></i> <b>Data</b></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered tabel_pic tabel-hover font-weight-bold">
              <thead style="background-color: antiquewhite;">
                <tr>
                  <th>No</th>
                  <th>DEPARTMENT</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($department as $v) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $v['department'] ?></td>
                    <td>
                      <div class="btn-group">
                        <button value="<?= $v['id']; ?>" class="btn btn-sm btn-danger hapuspic"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-sm btn-info ml-1"><i class="fas fa-eye"></i></button>
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
</section>



<script>
  $(document).ready(function() {
    $(".select2").select2();
    $(".progress").select2({
      theme: "classic"
    });

    $(".hapuspic").click(function(e) {
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
            url: "<?= base_url('delete_pic') ?>",
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

    $('.tabel_pic').DataTable();

    // Mengikuti perubahan tanggal pada elemen dengan ID "startdate"
    $(".filter").on("click", function(e) {
      e.preventDefault();
      table1.ajax.reload();
    });
  });
</script>