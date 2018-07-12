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
          <div class="col-lg-12 col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Product borrowed</h3>
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
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date Borrowed</th>
                        <th style="width: 120px">Action</th>
                      </thead>
                      <?php 
                        $no = 1;
                        foreach ($results as $key): ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><a href="<?php echo base_url('products/view/').$key['product_id'] ?>"><?= $key['product'] ?></a></td>
                          <td><?php echo $key['quantity']; echo " ".$key['unit_type']; ?></td>
                          <td><?php echo "Rp.".number_format($key['price']) ?></td>
                          <td><?php echo "Rp.".number_format($key['quantity']*$key['price']); ?></td>
                          <td><?php echo date("D, d M Y",strtotime($key['date_lent'])) ?></td>
                          <td>
                            <div class="input-group-btn">
                              <a href="<?php echo base_url('product_borrowed/update/').$key['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url('inventoriecontroller/product_borrowed_delete/').$key['id']?>" class="btn btn-danger" onclick="return doconfirm();"><i class="fa fa-trash"></i></a>
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
                  <label>Product</label>
                  <input type="text" name="product" class="form-control" placeholder="Search product">
                </div>
                <div class="col-md-6">
                  <label>Quantity</label>
                  <input type="number" name="quantity" class="form-control" placeholder="Search quantity">
                </div>
                <div class="col-md-6">
                  <label>Price</label>
                  <input type="number" name="price" class="form-control" placeholder="Search price">
                </div>
                <div class="col-md-6">
                  <label>Date borrowed</label>
                  <input type="text" name="date_lent" class="form-control" placeholder="Search date borowed" id="datepicker">
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
  <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
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
      $(function () {
          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })
      })
  </script>
 
</body>
</html>