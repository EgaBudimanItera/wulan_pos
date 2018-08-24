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
				<h2>Laporan Kas</h2>
				<h4>Perusahaan<br>
					Periode : <?=date("d-m-Y",strtotime($daritanggal))?> s/d <?=date("d-m-Y",strtotime($hinggatanggal))?></h4>
			</td>
		</tr>
	</table>
		<hr>
	<table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">No Faktur</th>
                    <th class="hidden-phone">Keterangan</th>
                    <th class="hidden-phone">Debet</th>
                    <th class="hidden-phone">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    $totaldebet=0;
                    $totalkredit=0;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->cashTanggal;?></td>
                    <td><?=$l->cashNoFaktur;?></td>
                    <td ><?=$l->cashKet;?></td>
                    <td align="right"><?php echo number_format($l->cashDebet)?></td>
                    <td align="right"><?php echo number_format($l->cashKredit)?></td>
                  </tr>
                  <?php
                    
                    $totaldebet=$totaldebet+($l->cashDebet);
                    $totalkredit=$totalkredit+$l->cashKredit;
                    }
                   
                  ?>
                  <tr>
                    <td colspan="4">Total</td>
                    <td align="right"><?php echo number_format($totaldebet)?></td>
                    <td align="right"><?php echo number_format($totalkredit)?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Sisa Kas</td>
                    <td colspan="2" align="right"><?php echo number_format($kas)?></td>
                  </tr>
                </tbody>
                
              </table>
              <table class="table">
              	<thead>
                  <tr>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                    <th class="hidden-phone"></th>
                  </tr>
                </thead>
              	<tbody>
              		<tr>
                		<td colspan="4">
                			
                		</td>
                		<td colspan="2" style="float: right;">
                			Bandar Lampung, <?=date("d-F-Y")?> <br><br><br><br>
                			Kepala Keuangan <br>
                			()
                		</td>
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