<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('view/head');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('view/navbar');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('view/sidebar');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php $this->load->view('view/breadcrumb'); ?>
  <section class="content">
        <div class="container-fluid">
          <?php $this->load->view('view/notif'); ?>
        <!--Inputan-->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Post Kategori Berita</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                      title="Collapse" active>
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-footer">
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-lg">Tambah Data</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="memListTable" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Status Kategori</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Status Kategori</th>
                    <th>Aksi</th>
                  </tr>
              </tfoot>
            </table>
          </div>

          <!-- Modal Start -->
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Large Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/berita/inputKategori'?>" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Baru</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Nama Kategori Berita">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status Kategori</label>
                        <input type="checkbox" name="inputStatus" value=1 checked data-bootstrap-switch>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>

              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Modal End -->
        </div>
        <!--End Inputan-->
        <!--End Tabel serverside datatable-->
        </div>
      </section>
  </div>

  <!-- /.content-wrapper -->
  <?php $this->load->view('view/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('view/js');?>
<!-- jQuery -->


<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      kategori: {
        required: true,
        kategori: true,
      }
    },
    messages: {
      kategori: {
        required: "Tolong Inputkan Kategori!"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</body>
</html>
