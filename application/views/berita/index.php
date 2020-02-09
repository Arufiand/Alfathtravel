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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!--Inputan-->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Post Berita</h3>
          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="quickForm">
          <div class="card-body">
            <div class="row">

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Berita</label>
                  <input type="text" name="judul" class="form-control" id="judulBerita" placeholder="Isi judul Berita">
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Rilis</label>
                            <input type="date" name="TglRilis" class="form-control" id="TglRilis" placeholder="Isi judul Berita">
                          </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kadaluarsa</label>
                        <input type="date" name="tglKadaluarsa" class="form-control" id="tglKadaluarsa" placeholder="Isi judul Berita">
                      </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Isi Berita
                  <small>isikan berita disini</small>
                </h3>
                <!-- tools box -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" id="isiBerita"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <label for="exampleInputEmail1">Upload gambar Thumbnail <small>extensi file .jpg & .png</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
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
                    <th>Id Berita</th>
                    <th>ID Author</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Gambar</th>
                    <th>Tanggal Rilis</th>
                    <th>Tanggal Kadaluarsa</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>No</th>
                  <th>Id Berita</th>
                  <th>ID Author</th>
                  <th>Judul Berita</th>
                  <th>Isi Berita</th>
                  <th>Gambar</th>
                  <th>Tanggal Rilis</th>
                  <th>Tanggal Kadaluarsa</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!--End Tabel serverside datatable-->
      </div>
    </section>
    <!-- /.content -->
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
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('index.php/berita/getListsBerita/'); ?>",
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
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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
