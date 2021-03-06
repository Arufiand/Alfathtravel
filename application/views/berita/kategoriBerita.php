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
        <div class="card card-warning">
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
          <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/berita/inputKategori'?>" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Baru</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Nama Kategori Berita">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Kategori     </label>
                    <input type="checkbox" name="inputStatus" value=1 checked data-bootstrap-switch>
                  </div>
                </div>

              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
        <!--End Inputan-->

        <!--Tabel serverside datatable-->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data <?php echo $surname?> Alfath</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                      title="Collapse" collapsed>
                <i class="fas fa-minus"></i></button>
            </div>
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
          <!-- /.card-body -->
        </div>
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
