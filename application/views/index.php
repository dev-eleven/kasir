<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Warung Kopi || Inventaris</title>
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
          <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Data Rekap Harian | <a href="">Laporan Bulanan</a> </h3>
              </div>
              <div class="box-body">
                <canvas id="pieChart" style="height:50px;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Barang Terbaru</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <?php foreach ($products as $key): ?>
                    <tr>
                      <td><?= $key['name'] ?></td>
                      <td><?= $key['stock'] ?></td>
                    </tr>
                  <?php endforeach ?>
                </table>
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
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieChart       = new Chart(pieChartCanvas)
      var PieData        = [
        {
          value    : <?php print_r($hot[0]["stock"]);?>,
          color    : '#f56954',
          highlight: '#f56954',
          label    : 'Hot Drinks'
        },
        {
          value    : <?php print_r($cold[0]["stock"]);?>,
          color    : '#00c0ef',
          highlight: '#00c0ef',
          label    : 'Cold Drinks'
        },
        {
          value    : <?php print_r($food[0]["stock"]);?>,
          color    : '#00a65a',
          highlight: '#00a65a',
          label    : 'Food'
        }
      ]
      var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
      }
      pieChart.Doughnut(PieData, pieOptions)
    })
  </script>
  
</body>
</html>