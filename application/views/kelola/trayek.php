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
        <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/kelola/inputTrayek'?>" method="post">
          <div class="card-body">
            <label for="exampleInputEmail1"><h4>Destinasi Trayek</h4></label>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tujuan Awal</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="tujuanAwal">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tujuan Akhir</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="tujuanAkhir">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>
            <label for="exampleInputFile">Jadwal Keberangkatan dan Kedatangan</label><small> *isikan tanggal dan waktu</small>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-clock"></i></span>
              </div>
              <input type="text" class="form-control float-right" id="reservationtime" name="jadwalKeberangkatan">
            </div>
          </br>
          <label for="exampleInputEmail1"><h4>Kota Pemberhentian</h4></label><small> *isikan kota pemberhentian sesuai trayek</small>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <select class="duallistbox" multiple="multiple" name="kotaPemberhentian">
                    <option selected>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
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
                  <th>Nama Lengkap</th>
                  <th>Tempat Tinggal</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Nomor Telepon</th>
                  <th>Email</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Tempat Tinggal</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Nomor Telepon</th>
                  <th>Email</th>
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
<!-- <script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      Nama: {
        required: true,
        Nama: true,
      },
      Alamat: {
        required: true,
        Alamat: true,
      },
      Kota: {
        required: true,
        Kota: true,
      },
      Propinsi: {
        required: true,
        Propinsi: true,
      },
      TglLahir: {
        required: true,
        TglLahir: true,
      },
      NoTelp: {
        required: true,
        NoTelp: true,
      },
      KotaLahir: {
        required: true,
        KotaLahir: true,
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
            Nama: {
              required: "Tolong Inputkan Nama",
            },
            Alamat: {
              required: "Tolong Inputkan Alamat",
            },
            Kota: {
            required: "Tolong Inputkan Kota",
            },
            Propinsi: {
              required: "Tolong Inputkan Propinsi",
            },
            TglLahir: {
              required: "Tolong Inputkan Tanggal Lahir",
            },
            NoTelp: {
              required: "Tolong Inputkan Nomor Telepon",
            },
            KotaLahir: {
              required: "Tolong Inputkan Kota Kelahiran",
            },
            email: {
              required: "Tolong Inputkan Email",
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
</script> -->
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

  $('#reservationtime').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
      format: 'MM/DD/YYYY hh:mm A'
    }
  })

  //Bootstrap Duallistbox
  $('.duallistbox').bootstrapDualListbox()
</script>
</body>
</html>
