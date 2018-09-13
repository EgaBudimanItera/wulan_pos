<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>SIMPOS</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" href="<?=base_url()?>assets/assets/select2/select2.css">
	<link href="<?php echo base_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/chosen-bootstrap/chosen/chosen.css" />

	<link href="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
</head>
<body>
	<table class="table">
		<tr>
			<td class="col-md-3">Logo</td>
			<td class="col-md-9">
				<h2>Invoice</h2>
				<h4>Pasific Putra<br>
					No Invoice : <?=$nofaktur->opnjNoFaktur?></h4>
			</td>
		</tr>
	</table>
		<hr>
	<table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Kode Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Harga</th>
                    <th class="hidden-phone">Jumlah</th>
                    <th class="hidden-phone">Subtotal</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    $total=0;
                    foreach($list as $l){
                      $subtotal=$l->dopjJumlah*$l->dopjHarga;
                      $total=$total+$subtotal;
                  ?>
                  <tr>
                    <!-- isi tabel det pembelian dengan no faktur terpilih -->
                    <td><?=$no++;?></td>
                    <td><?=$l->brngKode?></td>
                    <td><?=$l->brngNama?></td>
                    <td><?php echo number_format($l->dopjHarga)?></td>
                    <td><?=$l->dopjJumlah?></td>
                    <td><?php echo number_format($subtotal)?></td>
                  </tr>
                  <?php
                    }
                  ?>
                  <tr>
                    <td colspan="5">Total</td><!--  penjumlahan dari subtotal-->
                    <td><?php echo number_format($total)?></td>
                  </tr> 
                </tbody>
              </table>
              
</body>
<script src="<?php echo base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	});
</script>
</html>