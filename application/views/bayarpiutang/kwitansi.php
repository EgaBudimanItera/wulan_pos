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
	
</head>
<body>
	<table class="table">
		<tr>
			<td class="col-md-3">Logo</td>
			<td class="col-md-9">
				<h2>Kwitansi Pembayaran</h2>
				<h4>Pasific Putra<br>
					No Kwitansi : <?=$faktur->byrpNoFaktur?><br>
                    Pelanggan    : <?=$faktur->plgnNama?><br>
                    Tanggal     : <?=date_format(date_create($faktur->byrpTanggal),"Y/m/d")?><br>
                    Jumlah Bayar: Rp. <?=number_format($faktur->dbypBayar)?><br>
                    Terbilang   : <i><?=$this->M_pos->terbilang($faktur->dbypBayar)?> Rupiah</i><br>
                    Jenis Bayar : <?=$faktur->pilihanbayar?><br>
                    </h4>
			</td>
		</tr>
	</table>
	
              <table class="table">
                <tr>
                    <th colspan="3"><center>Pembuat
                    <br><br><br><br> _____________________</center>
                    </th>
                    <th colspan="3"><center>Penerima
                    <br><br><br><br> _____________________</center>
                    </th>
                </tr>
              </table>


              
</body>
<script src="<?php echo base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	});
</script>
</html>