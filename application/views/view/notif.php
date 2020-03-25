<?php if ($this->session->flashdata('success')){?>
  <div class="card bg-gradient-success swalDefaultSuccess">
    <div class="card-header swalDefaultSuccess">
      <?php echo $this->session->flashdata('success'); ?>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </div>
  </div>
<?php } elseif ($this->session->flashdata('danger')) {?>
  <div class="card bg-gradient-danger">
    <div class="card-header">
      <?php echo $this->session->flashdata('danger'); ?>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </div>
  </div>
<?php };?>
