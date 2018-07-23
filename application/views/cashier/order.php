<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Cashier</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('template/header2'); ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
              <form method="post">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Menu</label>
                      <select class="form-control select2" style="width: 100%;" name="menu">
                        <?php foreach ($menus as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['title'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label>Quantity</label>
                      <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label>&nbsp;</label>
                      <button class="btn btn-block btn-primary" name="order">Order</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <?php if (!empty($results)) { ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ordered List</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-hover no-margin">
                      <thead style="background-color: #7d490b;color: #ffffff">
                        <th style="width: 10px;">&nbsp;</th>
                        <th>Menu</th>
                        <th style="width: 100px;">Quantity</th>
                        <th style="width: 100px;">Total Price</th>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach ($results as $key): ?>
                          <tr>
                            <td><a class="btn btn-danger btn-block btn-sm" href="<?php echo base_url('cashiercontroller/order_delete/').$key['id']?>"><i class="fa fa-trash"></i></a></td>
                            <td><?= $key['menu'] ?></td>
                            <td><?= $key['quantity'] ?></td>
                            <td><?= 'Rp.'.number_format($key['total_price']) ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="1"></th>
                          <th class="pull-right">
                            <form method="post">
                              <button class="btn btn-success" name="order_update" value="1">Paid of</button>
                              <button class="btn btn-warning" name="order_update" value="2">Not yet paid</button>
                            </form>
                          </th>
                          <th>Final price</th>
                          <th>Rp.<?php  echo number_format($final[0]['total']) ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>    
                </div>
              </div>
            <?php } ?>
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
  <script>
  $(function () {
      //Initialize Select2 Elements
      $('.select2').select2() 
  })
  </script>
</body>
</html>