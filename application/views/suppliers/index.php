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
          <div class="col-lg-12 col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Supplier | <a href="<?php echo base_url() ?>suppliers/add">Tambah Data</a></h3>
                <div class="box-tools">
                  <form method="post">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>   
                </div>
              </div>
              <!-- /.box-header -->
              <?php if (isset($results)) { ?>
              <div class="box-body">
                <table class="table table-hover">
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Person Name</th>
                    <th>Phone</th>
                    <th style="width: 120px">Action</th>
                  </tr>
                  <?php 
                    $no = 1;
                    foreach ($results as $key): ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?= $key['person_name'] ?></td>
                      <td><?= $key['phone'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?php echo base_url('suppliers/view/').$key['id']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo base_url('suppliers/update/').$key['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?php echo base_url('suppliercontroller/delete/').$key['id']?>" class="btn btn-danger" onclick="return doconfirm();"><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </table>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
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