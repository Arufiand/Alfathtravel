<script src="<?php echo base_url()?>assets/datatable/jQuery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/datatable/responsive/responsive.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- bootstrap switch -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>


<script>
//checked State B4
$("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
});

// $.widget.bridge('uibutton', $.ui.button);



//select2bs4
$('.select2bs4').select2({
  theme: 'bootstrap4'
});
</script>

<?php
if ($judul == "Kelola Kategori")
{
   $direktori="index.php/berita/getListsKategori/";
} else if ($judul == "Kelola Berita")
{
  $direktori="index.php/berita/getListsBerita/";
}
 else if ($judul == "Kelola Staff")
{
  $direktori="index.php/kelola/getListsStaff/";
}
 else if ($judul == "Kelola Pelanggan")
{
  $direktori="index.php/kelola/getListsPelanggan/";
}
?>
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
            "url": "<?php echo base_url("$direktori"); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
});


$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
});

//select2 provinsi dan kabupaten
$(document).ready(function(){
  $('#provinsi').change(function(){
    var id=$(this).val();
    $.ajax({
      url : "<?php echo base_url();?>index.php/kelola/get_subprovinsi",
      method : "POST",
      data : {id: id},
      async : false,
          dataType : 'json',
      success: function(data){
        var html = '';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option>'+data[i].nama+'</option>';
              }
              $('.subprovinsi').html(html);

      }
    });
  });
});



// Summernote
$('.textarea').summernote();


</script>
