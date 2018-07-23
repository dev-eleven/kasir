<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
</head>
<body>
	<table border="1" width="100%" style="border-collapse: collapse; font-size: 12px;">
    <tr>
      <td colspan="6">
       <table class="border-all" style="border-collapse: collapse; font-size: 12px;" width="100%">
            <tr>
                <td align="center" style="width:25%" rowspan="2">
                   <h1>Report Inventories</h1>
                </td>
                <td style="border: 1px solid #000000; width: 40%" rowspan="2">
                    <table style="font-size: 12px;">
                        <tr>
                          <td>Inventories</td>
                          <td> : 
                            <?php 
                              if ($status == 1) {
                                echo "Product In";
                              } elseif ($status == 2) {
                                echo "Product Out";
                              } elseif ($status == 3) {
                                echo "Product Borrowed";
                              } elseif ($status == 4) {
                                echo "Product Returned";
                              } elseif ($status == 5) {
                                echo "Product Broken";
                              } elseif ($status == 6) {
                                echo "Product Lost";
                              }

                            ?>
                            
                          </td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td> : <?= $periode ?></td>
                        </tr>
                        <tr>
                            <td>Cetak</td>
                            <td> : <?php echo date('d/m/Y') ?></td>
                        </tr>
                    </table>
                </td>
                <td align="center" width="10%" style="height:15px;"><b>Dibuat oleh</b></td>
                <td align="center" width="10%"><b>Diperiksa oleh</b></td>
                <td align="center" width="10%"><b>Diketahui oleh</b></td>
            </tr>
            <tr>
                <td class="border-all"><br><br></td>
                <td class="border-all"><br><br></td>
                <td class="border-all"><br><br></td>
            </tr>
        </table>
      </td>
    <tr>
		<tr>
			<th style="width: 20px;">No</th>
      <th>Product</th>
      <th style="width: 150px;">Quantity</th>
      <th>Price</th>
      <th>Total</th>
      <th>Date</th>
		</tr>
		<?php $no=1; foreach ($results as $key): ?>
			<tr>
        <td><?= $no++ ?></td>
        <td><?= $key['product'] ?></td>
        <td><?php echo $key['quantity']; echo " ".$key['unit_type']; ?></td>
        <td><?php echo "Rp.".number_format($key['price']) ?></td>
        <td><?php echo "Rp.".number_format($key['quantity']*$key['price']); ?></td>
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
	</table>
	<script type="text/javascript">
        window.print();
        setTimeout(function () {
            window.close();
        }, 1);
    </script>
</body>
</html>