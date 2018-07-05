<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Products</title>
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
                  <table class="table">
                   <div class="form-group">
                    <tr>
                      <td>Supplier</td>
                      <td>
                        <select class="form-control select2" style="width: 100%" name="supplier_id">
                          <?php foreach ($results as $key): ?>
                            <option value="<?= $key['id'] ?>"><?= $key['person_name'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product</td>
                      <td><input type="text" name="product" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Stock</td>
                      <td><input type="number" name="stock" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td><input type="number" name="price" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Type</td>
                      <td>
                        <select class="form-control" name="type">
                          <option value="1">Hot Drinks</option>
                          <option value="2">Cold Drinks</option>
                          <option value="3">Food</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="pull-right">
                        <a href="<?php echo base_url(); ?>products" class="btn btn-default"><i class="fa fa-rotate-left"></i> Back</a>
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
  <script>
  $(function () {
      //Initialize Select2 Elements
      $('.select2').select2() 
  })
  </script>
</body>
</html>