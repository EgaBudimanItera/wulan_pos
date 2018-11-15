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
        <h2>Laporan Stok</h2>
        <h4>Pasific Putra<br>
          Periode : <?=date("d-m-Y",strtotime($daritanggal))?> s/d <?=date("d-m-Y",strtotime($hinggatanggal))?></h4>
      </td>
    </tr>
    <tr>
      <td>Kode Barang</td>
      <td><?=$barang->brngKode?></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td><?=$barang->brngNama?></td>
    </tr>
  </table>
    <hr>
  <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">No Transaksi</th>
                    <th class="hidden-phone">Kode Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Keterangan</th>
                    <th class="hidden-phone">Stok Awal</th>
                    <th class="hidden-phone">Stok Masuk</th>
                    <th class="hidden-phone">Stok Keluar</th>
                    <th class="hidden-phone">Stok Akhir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->stokTanggal;?></td>
                    <td><?=$l->stokNoFaktur;?></td>
                    <td><?=$l->brngKode;?></td>
                    <td><?=$l->brngNama;?></td>
                    <td><?=$l->stokKet;?></td>
                    <td><?=number_format($l->stokAwal);?></td>
                    <td><?=number_format($l->stokMasuk);?></td>
                    <td><?=number_format($l->stokKeluar);?></td>
                    <td><?=number_format($l->stokAkhir);?></td>
                  </tr>
                  <?php
                    $hpp=$l->brngHpp;
                      $stokAkhir=$l->stokAkhir;
                    
                    }
                    if($jumlah==0){
                      $hpp=0;
                      $stokAkhir=0;
                    }
                    else{
                     $hpp=$hpp;
                     $stokAkhir=$stokAkhir;   
                    }
                  ?>
                  <tr>
                    <td colspan="3">Hpp Barang</td>
                    <td colspan="7"><?php echo 'Rp '. number_format($hpp)?> * <?=$stokAkhir?> = <?php echo 'Rp '.number_format($hpp*$stokAkhir)?></td>
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