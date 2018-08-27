
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Laporan Stok
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pencarian Data</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Lihat Data</a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div id="page" class="dashboard"> 
        
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget">
              <div class="widget-title">
                  <h4><i class="icon-reorder"></i>Data</h4>
                  <span class="tools">
                      <a href="javascript:;" class="icon-chevron-down"></a>
                      <a href="javascript:;" class="icon-remove"></a>
                  </span>
              </div>
              <div class="widget-body">
               <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
                <div>
                  <button type="button" class="btn btn-primary" onclick="self.history.back()">
                    <i class="icon-arrow-left"></i> Kembali
                  </button>
                  <a href="<?=base_url()?>c_lapstok/cetak/<?=$brngId?>/<?=$daritanggal?>/<?=$hinggatanggal?>" target="_blank" class="btn btn-warning"><i class="icon-print"></i> Cetak</a>
                </div>
              </div>

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
            </div>
            <!-- END EXAMPLE TABLE widget-->
          </div>
        </div>               
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->


  


