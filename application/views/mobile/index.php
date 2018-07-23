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
          <div class="login-logo">
            <a href="<?php echo base_url();?>"><b>Warung</b> Kopi</a>
          </div>
          <div class="row">
            <form method="post">
              <div class="col-sm-12 col-xs-12">
                <div class="text-center">
                  <input type="radio" name="identitas" id="member" checked value="member"> Member
                  <input type="radio" name="identitas" id="non" value="non"> Non Member
                </div>
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
              <div class="col-sm-12 col-xs-12" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary btn-block" name="transaction">Add Transaction</button>
              </div>
            </form>
          </div>
        </div>
      </div>
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