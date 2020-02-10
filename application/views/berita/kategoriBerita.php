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
                    <input type="text" name="kategoris" class="form-control" id="kategoris" placeholder="Nama Kategori Berita">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Kategori     </label>
                    <input type="checkbox" name="status" value=1 checked data-bootstrap-switch>
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
            <h3 class="card-title">Data Berita Website Alfath</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                      title="Collapse" active>
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="memListTable" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Status Kategori</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Status Kategori</th>
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
<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        "responsive": true,
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('index.php/berita/getListsKategori/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      kategoris: {
        required: true,
        kategoris: true,
      }
    },
    messages: {
      kategoris: {
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
