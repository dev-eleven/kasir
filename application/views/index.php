<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warung Kopi || Dashboard</title>
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
          <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #7d490b; color: #fff;">
              <div class="inner">
                <h3><?php echo $suppliers ?></h3>
                <p>Suppliers</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo base_url() ?>suppliers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #7d490b; color: #fff;">
              <div class="inner">
                <h3><?php echo $members ?></h3>
                <p>Members</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo base_url() ?>customers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #7d490b; color: #fff;">
              <div class="inner">
                <h3><?php echo $menus ?></h3>
                <p>Menus</p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <a href="<?php echo base_url() ?>menus" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #7d490b; color: #fff;">
              <div class="inner">
                <h3><?php echo $products ?></h3>
                <p>Product</p>
              </div>
              <div class="icon">
                <i class="fa fa-sitemap"></i>
              </div>
              <a href="<?php echo base_url() ?>products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Recap Inventories <?php echo date("Y"); ?></h3>
                <div class="box-tools">
                  <form method="post">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <select class="form-control" name="mont">
                        <option value="">Silakan Pilih</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary" name="Inventories"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="barChart1" style="height:230px"></canvas>
                </div>
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
  <script src="<?php echo base_url();?>assets/js/Chart.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo.js"></script>
  <script>
    $(function () {
      //-------------
      //- BAR CHART1 -
      //-------------
      var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
      var barChart                         = new Chart(barChartCanvas)
      var barChartData                     = {
        labels  : ['Product In','Product Out','Product Borrowed','Product Retuned','Product Broken','Product Lost'],
        datasets: [
          {
            fillColor           : 'rgba(210, 214, 222, 1)',
            strokeColor         : 'rgba(210, 214, 222, 1)',
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [<?php echo $in[0]['total']; ?>, <?php echo $out[0]['total']; ?>, <?php echo $borrowed[0]['total']; ?>, <?php echo $returned[0]['total']; ?>, <?php echo $broken[0]['total']; ?>, <?php echo $lost[0]['total']; ?> ]
          }
        ]
      }
      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
      }

      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)
    })
  </script>
</body>
</html>