<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Users</title>
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
                <h3 class="box-title">Data Users</h3>
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
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th style="width: 120px">Action</th>
                      </tr>
                      <?php 
                        $no = 1;
                        foreach ($results as $key): ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $key['email'] ?></td>
                          <td>
                            <?php 
                              if ($key['level'] == 1) {
                                echo "Admin";
                              }elseif ($key['level'] == 2) {
                                echo "Kasir";
                              }else{
                                echo "Tidak Diketahui";
                              }
                            ?>
                          </td>
                          <td>
                            <div class="input-group-btn">
                              <a href="<?php echo base_url('users/view/').$key['id']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              <a href="<?php echo base_url('users/update/').$key['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url('usercontroller/delete/').$key['id']?>" class="btn btn-danger" onclick="return doconfirm();"><i class="fa fa-trash"></i></a>
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
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Search Email">
                </div>
                <div class="col-md-6">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option value="">Silakan Pilih</option>
                    <option value="1">Admin</option>
                    <option value="2">Kasir</option>
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