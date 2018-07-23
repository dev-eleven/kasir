<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warung Kopi || Mobile</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
  <div class="lockscreen-wrapper">
    <div class="lockscreen-item">
      <div class="login-box">
        <div class="login-box-body">
          <div class="row">
            <form method="post">
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
            </form>
          </div>
        </div>
      </div>
      <?php if (!empty($results)) { ?>
        <div class="box" style="margin-top: 10px;">
          <div class="box-header with-border">
            <h3 class="box-title">Ordered List | Code : <?= $code ?></h3>
          </div>
          <div class="box-body">
            <ul class="todo-list ui-sortable">
              <?php foreach ($results as $key): ?>
                <li>
                  <table>
                    <tr>
                      <td rowspan="3"><a class="btn btn-danger btn-sm" href="<?php echo base_url('cashiercontroller/order_delete/').$key['id']?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr>
                      <td>&nbsp;<?= $key['menu'] ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;Jumlah : <?= $key['quantity']?> | Harga : <?= 'Rp.'.number_format($key['total_price']) ?></td>
                    </tr>
                  </table>    
                </li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="box-footer text-center">
            Total Harga : Rp.<?php  echo number_format($final[0]['total']) ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
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