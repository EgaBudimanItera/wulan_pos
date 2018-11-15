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
        <h2>Laporan Pembelian</h2>
        <h4>Pasific Putra<br>
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
                    <th class="hidden-phone">Kode Supplier</th>
                    <th class="hidden-phone">Nama Supplier</th>
                    <th class="hidden-phone">Kode Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Jumlah</th>
                    <th class="hidden-phone">Harga</th>
                    <th class="hidden-phone">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    $total=0;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->pmblTanggal;?></td>
                    <td><?=$l->pmblNoFaktur;?></td>
                    <td><?=$l->splrKode;?></td>
                    <td><?=$l->splrNama;?></td>
                    <td><?=$l->brngKode;?></td>
                    <td><?=$l->brngNama;?></td>
                    <td><?=number_format($l->dtpbJumlah);?></td>
                    <td><?=number_format($l->dtpbHarga);?></td>
                    <td><?=number_format($l->dtpbJumlah*$l->dtpbHarga);?></td>
                  </tr>
                  <?php
                    
                    $total=$total+($l->dtpbJumlah*$l->dtpbHarga);
                    }
                   
                  ?>
                  <tr>
                    <td colspan="3">Total Pembelian</td>
                    <td colspan="7"><?php echo number_format($total)?></td>
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