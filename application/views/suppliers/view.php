<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Suppliers</title>
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
                      <label>Person Name</label>
                      <input type="text" name="person_name" class="form-control" value="<?= $key['person_name'] ?>" disabled>
                      <label>Company Name</label>
                      <input type="text" name="company_name" class="form-control" value="<?= $key['company_name'] ?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label>Email</label>
                      <input type="Email" name="email" class="form-control" value="<?= $key['email'] ?>" disabled>
                      <label>Phone</label>
                      <input type="number" name="phone" class="form-control" value="<?= $key['phone'] ?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="4" disabled><?= $key['address'] ?></textarea>
                    </div>
                  </div>
                <?php endforeach ?>
                <div class="table-responsive" style="margin-top: 20px;">
                  <table class="table table-bordered no-margin">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Product</th>
                      <th>Type</th>
                    </tr>
                    <?php $no = 1; foreach ($product as $key): ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><a href="<?php echo base_url('products/view/').$key['id']?>"><?= $key['name'] ?></a></td>
                        <td>
                          <?php
                            if ($key['type'] == 1) {
                              echo "Drinks";
                            }elseif ($key['type'] == 2) {
                              echo "Food";
                            }elseif ($key['type'] == 3) {
                              echo "Tool";
                            }
                          ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </table>
                </div>
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>suppliers" class="btn btn-default"><i class="fa fa-rotate-left"></i> Back</a>
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