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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php $this->load->view('template/header2'); ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Transactions</h3>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 50px;">
                    <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New Transaction</button>
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
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th style="width: 120px">Action</th>
                      </thead>
                      <?php 
                        $no = 1;
                        foreach ($results as $key): ?>
                        <tr style="">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $key['code'] ?></td>
                          <td>
                            <?php 
                              if ($key['member_id'] == null) {
                                echo "Non Member";
                              } else {
                                echo $key['customer'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                              if ($key['status'] == 1) {
                                echo "<span class='label label-success' >Paid of</span>";
                              } elseif ($key['status'] == 2) {
                                echo "<span class='label label-danger' >Not yet paid</span>";
                              }
                            ?>
                            </td>
                          <td>
                            <div class="input-group-btn">
                              <a href="<?php echo base_url('cashier/order/').$key['code']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              <?php if ($_SESSION['level'] == 1): ?>
                                <a href="<?php echo base_url('cashiercontroller/delete/').$key['code']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                              <?php endif ?>
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
            <h4 class="modal-title">Add Data</h4>
          </div>
          <form method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <input type="radio" name="identitas" id="member" checked value="member"> Member
                  <input type="radio" name="identitas" id="non" value="non"> Non Member
                      <hr>
                  <div id="hasil">
                    <label>Customer</label>
                    <select class="form-control select2" style="width: 100%;" name="member">
                      <?php foreach ($members as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="transaction">Add Transaction</button>
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
  <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#member").click(function(){
            $("#hasil").show();
        });

        $("#non").click(function(){
            $("#hasil").hide();
        });

        $(function () {
          $('.select2').select2() 
        });
    });
  </script>
</body>
</html>