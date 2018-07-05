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
                <table class="table">
                  <?php foreach ($results as $key): ?>
                    <tr>
                      <td>Person Name</td>
                      <td><input type="text" class="form-control" value="<?= $key['person_name'] ?>" disabled></td>
                    </tr>
                    <tr>
                      <td>Company Name</td>
                      <td><input type="text" class="form-control" value="<?= $key['company_name'] ?>" disabled></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>
                        <textarea class="form-control" rows="5" disabled><?= $key['address'] ?></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="Email" class="form-control" value="<?= $key['email'] ?>" disabled></td>
                    </tr>
                    <tr>
                      <td>Phone</td>
                      <td><input type="text" class="form-control" value="<?= $key['phone'] ?>" disabled></td>
                    </tr>
                  <?php endforeach ?>
                </table>
                <table class="table">
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
                            echo "Hot Drinks";
                          }elseif ($key['type'] == 2) {
                            echo "Cold Drinks";
                          }elseif ($key['type'] == 3) {
                            echo "Food";
                          }
                        ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </table>
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