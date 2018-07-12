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
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('template/header'); ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Product</h3>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 50px;">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <?php if (isset($results)) { ?>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-hover no-margin">
                      <thead style="background-color: #7d490b;color: #ffffff">
                        <th style="width: 10px">No</th>
                        <th>Supplier</th>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Type</th>
                        <th style="width: 120px">Action</th>
                      </thead>
                      <?php 
                        $no = 1;
                        foreach ($results as $key): ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><a href="<?php echo base_url('suppliers/view/').$key['supplier_id'] ?>"><?php echo $key['supplier'] ?></a></td>
                          <td><?php echo $key['name'] ?></td>
                          <td><?php echo $key['stock'];?></td>
                          <td>
                            <?php
                              if ($key['type'] == 1) {
                                echo "Drinks";
                              }elseif ($key['type'] == 2) {
                                echo "Food";
                              }else{
                                echo "Tool";
                              }
                            ?>
                          </td>
                          <td>
                            <div class="input-group-btn">
                              <a href="<?php echo base_url('products/view/').$key['id']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              <a href="<?php echo base_url('products/update/').$key['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url('productcontroller/delete/').$key['id']?>" class="btn btn-danger" onclick="return doconfirm();"><i class="fa fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              <?php } ?>
              <!-- /.box-body -->
              <?php if (isset($links)) { ?>
              <div class="box-footer clearfix">
                <?php echo $links ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php $this->load->view('template/footer'); ?>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Search Data</h4>
          </div>
          <form method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Supplier</label>
                  <input type="text" name="supplier" class="form-control" placeholder="Search supplier">
                </div>
                <div class="col-md-6">
                  <label>Product</label>
                  <input type="text" name="product" class="form-control" placeholder="Search product">
                </div>
                <div class="col-md-6">
                  <label>Type</label>
                  <select class="form-control" name="type">
                    <option value="">Silakan Pilih</option>
                    <option value="1">Drinks</option>
                    <option value="2">Food</option>
                    <option value="3">Tool</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="search">Search</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>

  </div>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
  <script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo.js"></script>
  <script>
      function doconfirm()
      {
          data = confirm("Apakah anda yakin ingin menghapus data ini?");
          if(data==true)
          {
              return true;
          }else{
              return false;
          }
      }
  </script>
 
</body>
</html>