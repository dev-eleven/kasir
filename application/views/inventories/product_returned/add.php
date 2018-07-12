<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Inventories</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('template/header'); ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Add Data
              </div>
              <form method="post">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                        <label>Product</label>
                        <select class="form-control select2" style="width: 100%" name="product_id" required>
                          <?php foreach ($results as $key): ?>
                            <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                          <?php endforeach ?>
                        </select>
                        <div class="row">
                          <div class="col-md-5">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" required>
                          </div>
                          <div class="col-md-7">
                            <label>&nbsp;</label>
                            <select name="unit_type" class="form-control" required>
                              <option>Units</option>
                              <option>Pieces</option>
                              <option>Packages</option>
                              <option>Sachets</option>
                              <option>Cups</option>
                              <option>Grams</option>
                              <option>Others</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Date Returned</label>
                          <input type="text" name="date_back" id="datepicker" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                          <label>Price</label>
                          <input type="number" name="price" class="form-control" required>
                          <input type="text" name="status" value="4" hidden>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>Comment</label>
                      <textarea class="form-control" name="comment" rows="4" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="pull-right">
                        <a href="<?php echo base_url(); ?>product_retruned" class="btn btn-default"><i class="fa fa-rotate-left"></i> Back</a>
                        <button name="button" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view('template/footer'); ?>

  </div>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
  <script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo.js"></script>
  <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
  <script>
  $(function () {
      //Initialize Select2 Elements
      $('.select2').select2() 
      $('#datepicker').datepicker({
          autoclose: true
      })
  })
  </script>
</body>
</html>