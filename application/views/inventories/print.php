<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
</head>
<body>
	<table border="1" width="100%" style="border-collapse: collapse; font-size: 12px;">
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