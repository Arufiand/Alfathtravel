<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- DataTables CSS library -->
<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatables.min.css'); ?>"/>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table id="memListTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
  </body>
  <!-- jQuery library -->
  <script src="<?php echo base_url('assets/datatable/jQuery/jquery.min.js'); ?>"></script>
  <!-- DataTables JS library -->
  <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatables.min.js'); ?>"></script>
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
              "url": "<?php echo base_url('index.php/members/getLists/'); ?>",
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
</html>
