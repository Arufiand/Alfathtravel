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
        <?php $this->load->view('view/notif'); ?>
      <!--Inputan-->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Post Berita</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/berita/inputKonten'?>" method="post">
          <div class="card-body">
            <div class="row">

              <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul Berita</label>
                      <input type="text" name="judul" class="form-control" id="judul" placeholder="Isi judul Berita">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <select class="form-control" name="Kategori" id="Kategori" required>
                           <option value="">No Selected</option>
                           <?php foreach($kategori as $row):?>
                           <option value="<?php echo $row->IdKategori;?>"><?php echo $row->NamaKategori;?></option>
                           <?php endforeach;?>
                       </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>

                </div>

              <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Rilis</label>
                            <input type="date" name="TglRilis" class="form-control" id="TglRilis" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Waktu rilis berita</label>
                            <input type="text" name="Waktu" class="form-control" id="Waktu"
                            placeholder="<?php
                            date_default_timezone_set('Asia/Jakarta');
                            $format = "%G:%i:%s";
                            echo mdate($format); ?>" disabled>
                          </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kadaluarsa</label>
                        <input type="date" name="TglKadaluarsa" class="form-control" id="TglKadaluarsa" required>
                      </div>
                      <?php //tambahkan fungsi Author nanti ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status Berita</label></br>
                        <input type="checkbox" name="status" value=0 data-bootstrap-switch>
                      </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-sm-6">

          </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!--End Inputan-->

      <!--Tabel serverside datatable-->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Berita Website Alfath</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse hide" data-toggle="tooltip"
                    title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="memListTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Rilis</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Waktu Rilis</th>
                    <th>Status Berita</th>
                  </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul Berita</th>
                  <th>Tanggal Rilis</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>Waktu Rilis</th>
                  <th>Status Berita</th>
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
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      judul: {
        required: true,
        judul: true,
      }
    },
    messages: {
      judul: {
        required: "Tolong Inputkan judul!"
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
