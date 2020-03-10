<div class ="form-group">
  <label for="exampleInputEmail1">Upload gambar Thumbnail <small>extensi file .jpg & .png</small></label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="gambarBerita">
    <label class="custom-file-label" for="gambarBerita">Choose file</label>
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
      <textarea class="textarea" placeholder="Isi Berita" id="isi"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>
  </div>
</div>

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
