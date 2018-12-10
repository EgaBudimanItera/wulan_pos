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
        <h2>Laporan Piutang</h2>
        <h4>Pasific Putra<br>
          Periode : <?=date("d-m-Y",strtotime($daritanggal))?> s/d <?=date("d-m-Y",strtotime($hinggatanggal))?></h4>
      </td>
    </tr>
    <tr>
      <td>Kode Pelanggan</td>
      <td><?=$pelanggan->plgnKode?></td>
    </tr>
    <tr>
      <td>Nama Pelanggan</td>
      <td><?=$pelanggan->plgnNama?></td>
    </tr>
  </table>
    <hr>
  <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2" class="hidden-phone">Tanggal</th>
                    <th rowspan="2"class="hidden-phone">No Transaksi</th>
                    <th rowspan="2" class="hidden-phone">Keterangan</th>
                    <th rowspan="2" class="hidden-phone">Debet</th>
                    <th rowspan="2" class="hidden-phone">Kredit</th>
                    <th colspan="2" class="hidden-phone"><center>Saldo</center></th>
                  </tr>
                  <tr>
                    
                   
                    
                    
                    
                    <!-- <th class="hidden-phone">Piutang Awal</th> -->
                    
                    <th class="hidden-phone">Debet</th>
                    <th class="hidden-phone">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->ptngTanggal;?></td>
                    <td><?=$l->ptngNoFaktur;?></td>
                    
                    <td><?=$l->ptngKet;?></td>
                    <!-- <td><?=number_format($l->ptngAwal);?></td> -->
                    <td><?=number_format($l->ptngDebet);?></td>
                    <td><?=number_format($l->ptngKredit);?></td>
                    <td><?=number_format($l->ptngAkhir);?></td>
                    <td></td>
                  </tr>
                  <?php
                    
                    
                    }
                   
                  ?>
                  
                </tbody>
              </table>            <table class="table">
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