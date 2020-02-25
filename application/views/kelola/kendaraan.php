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
          <h3 class="card-title">Post <?php echo $surname?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/berita/inputKonten'?>" method="post">
          <div class="card-body">
            <div class="row">

              <div class="col-sm-6">
                <label for="exampleInputEmail1"><h4>Informasi <?php echo $surname?></h4></label>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama / Merk Kendaraan</label>
                      <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Nama / Merk Kendaraan" style="width: 100%" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kendaraan</label>
                      <input type="text" name="Jenis" class="form-control" id="Jenis" placeholder="Jenis Kendaraan" style="width: 100%" >
                    </div>
                </div>

              <div class="col-md-6">
                  <label for="exampleInputEmail1"><h4>Detil Informasi <?php echo $surname?></h4></label>
                  <div class="row">
                      <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Polisi</label>
                              <input type="text" name="Nopol" class="form-control" id="Nopol" placeholder="Nomor Polisi" required style="width: 100%" >
                            </div>
                      </div>
                      <div class="col-sm-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Beli Kendaraan</label>
                                <input type="date" name="TglBeli" class="form-control" id="TglBeli" required style="width: 100%" >
                              </div>
                      </div>
                  </div>
                <div class="row">
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Kursi</label>
                            <input type="number" name="Kursi" class="form-control" id="Kursi" required style="width: 100%" >
                          </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Status <?php echo $surname?></label></br>
                          <input type="checkbox" name="status" value=0 data-bootstrap-switch style="width: 100%">
                        </div>
                    </div>
                </div>
                </div>
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
          <h3 class="card-title">Data <?php echo $surname?> Alfath</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
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
                  <th>Nama / Merk Kendaraan</th>
                  <th>Jenis Kendaraan</th>
                  <th>Nomor Polisi</th>
                  <th>Jumlah Kursi</th>
                  <th>Tanggal Beli Kendaraan</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama / Merk Kendaraan</th>
                  <th>Jenis Kendaraan</th>
                  <th>Nomor Polisi</th>
                  <th>Jumlah Kursi</th>
                  <th>Tanggal Beli Kendaraan</th>
                  <th>Status</th>
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
      },
      Kategori: {
        required: true,
        Kategori: true,
      },
      TglRilis: {
        required: true,
        TglRilis: true,
      },
      TglKadaluarsa: {
        required: true,
        TglKadaluarsa: true,
      },
    },
    messages: {
      judul: {
        required: "Inputkan Judul Berita",
      },
      Kategori: {
        required: "Pilih Salah Satu Kategori",
      },
      TglRilis: {
        required: "Inputkan Tanggal Rilis Berita",
      },
      TglKadaluarsa: {
        required: "Inputkan Tanggal Kadaluarsa Berita",
      },
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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
</body>
</html>
