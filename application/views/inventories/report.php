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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('template/header'); ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <form method="post">
            <div class="col-lg-12 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Report Inventories</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Product</label>
                      <input type="text" name="product" class="form-control">
                      <label>Price</label>
                      <input type="number" name="price" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label>Date</label>
                      <input type="tect" name="date" class="form-control" id="daterange-btn" required>
                    </div>
                    <div class="col-md-4">
                      <label>Inventories</label>
                      <select name="status" class="form-control">
                        <option value="1">Product in</option>
                        <option value="2">Product out</option>
                        <option value="3">Product borrowed</option>
                        <option value="3">Product returned</option>
                        <option value="4">Product broken</option>
                        <option value="5">Product lost</option>
                      </select>
                      <label>&nbsp;</label>
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-warning" name="print"><i class="fa fa-print"></i> Print</button> 
                        <button type="submit" class="btn btn-success" name="excel"><i class="fa fa-file-excel-o"></i> Excel</button>
                        <button type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i> Search</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <?php if (isset($results)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered no-margin">
                        <thead>
                          <tr>
                            <th style="width: 20px;">No</th>
                            <th>Product</th>
                            <th style="width: 150px;">Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($results as $key ): ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $key['product'] ?></td>
                              <td><?php echo $key['quantity']; echo " ".$key['unit_type']; ?></td>
                              <td><?php echo "Rp.".number_format($key['price']) ?></td>
                              <td><?php echo "Rp".number_format($key['quantity']*$key['price']); ?></td>
                              <td>
                                <?php 
                                  if ($key['status'] == 1) {
                                    echo date("D, d M Y",strtotime($key['date_in']));
                                  } elseif ($key['status'] == 2) {
                                    echo date("D, d M Y",strtotime($key['date_out']));
                                  } elseif ($key['status'] == 3) {
                                    echo date("D, d M Y",strtotime($key['date_lent']));
                                  } elseif ($key['status'] == 4) {
                                    echo date("D, d M Y",strtotime($key['date_back']));
                                  } elseif ($key['status'] == 5) {
                                    echo date("D, d M Y",strtotime($key['date_broken']));
                                  } elseif ($key['status'] == 6) {
                                    echo date("D, d M Y",strtotime($key['date_lost']));
                                  }
                                ?>  
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td class="clearfix" colspan="5">
                              <?php if (isset($links)) { ?>
                                <?php echo $links ?>
                              <?php } ?>
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </form> 
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
  <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
  <script>
  $(function () {
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'This Year'  : [moment().startOf('year'), moment().endOf('year')],
          'Last Month'  : [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        startDate: moment(),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  })
</script>
</body>
</html>