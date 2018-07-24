<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Menus</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
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
                View Data
              </div>
              <div class="panel-body">
                <?php foreach ($results as $key): ?>
                  <div class="row">
                    <div class="col-md-4">
                        <label>Product</label>
                        <input type="text" class="form-control" value="<?= $key['product'] ?>" disabled>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Title</label>
                            <input type="text" class="form-control" value="<?= $key['title'] ?>" disabled>
                        </div>
                        <div class="col-md-3 col-xs-6">
                          <label>Price</label>
                          <input type="number" class="form-control" value="<?= $key['price'] ?>" disabled>
                        </div>
                        <div class="col-md-3 col-xs-6">
                          <label>Type</label>
                          <select class="form-control" disabled>
                            <?php 
                              if ($key['type'] == 1) {
                                echo "<option>Hot Drinks</option>";
                              }elseif ($key['type'] == 2) {
                                echo "<option>Cold Drinks</option>";
                              }else{
                                echo "<option>Food</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <img src="<?= base_url()?>assets/img/<?= $key['photo'] ?>" style="width: 100%; padding:10px"> 
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>menus" class="btn btn-default"><i class="fa fa-rotate-left"></i> Back</a>
                    </div>
                  </div>
                </div>
              </div>
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
</body>
</html>