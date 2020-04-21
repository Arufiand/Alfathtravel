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
              <form role="form" id="quickForm" action="<?php echo base_url(). 'index.php/berita/inputKonten'?>" method="post">
                <div class="card-body pad">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1"><h4>Informasi Berita</h4></label>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Isi judul Berita" style="width: 100%;" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control select2bs4" name="Kategori" id="Kategori" required style="width: 100%;" >
                                 <option value=""selected="selected">No Selected</option>
                                 <?php foreach($kategori as $row):?>
                                 <option value="<?php echo $row->IdKategori;?>"><?php echo $row->NamaKategori;?></option>
                                 <?php endforeach;?>
                             </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Gambar Thumbnail Berita</label><small> *Ekstensi .png & .jpg</small>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" style="width: 100%;" onchange="loadFile(event)" accept="image/*" >
                                <label class="custom-file-label" for="gambar">Choose file</label>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <label for="exampleInputEmail1"><h4>Detil Informasi Berita</h4></label>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tanggal Rilis</label>
                          <!-- //TODO: Convert date to string, potong dan jadikan 2 variabel, rubah kembali ke bentuk date dan simpan ke db -->
                          <input type="text" name="TglRilis" class="form-control" id="TglRilis" required style="width: 100%;" >
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Waktu rilis berita</label>
                                  <input type="text" name="Waktu" class="form-control" id="Waktu"
                                  placeholder="<?php
                                  date_default_timezone_set('Asia/Jakarta');
                                  $format = "%G:%i:%s";
                                  echo mdate($format); ?>" disabled style="width: 100%;" >
                                </div>
                          </div>
                          <div class="col-sm-6">
                            <!-- //TODO: //tambahkan fungsi Author nanti -->
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status Berita</label></br>
                              <input type="checkbox" name="status" value=0 data-bootstrap-switch style="width: 100%;">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="exampleInputEmail1">Bentuk Foto</label></br>
                            <img id="output"/>
                        </div>
                      </div>
                      </div>
                    <div class="col-md-12">
                      <label for="exampleInputEmail1"><h4>Detil Informasi Berita</h4></label>
                      <!-- <div class="card-body pad"> -->
                        <div class="mb-6">
                          <textarea class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
                </div>
              </form>
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Modal End -->
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
    //Date range picker
    $('#TglRilis').daterangepicker()

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

    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
</body>
</html>
