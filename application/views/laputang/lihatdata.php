
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Laporan Hutang
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
                  <a href="<?=base_url()?>c_laputang/cetak/<?=$splrId?>/<?=$daritanggal?>/<?=$hinggatanggal?>" target="_blank" class="btn btn-warning"><i class="icon-print"></i> Cetak</a>
                </div>
              </div>

              <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th colspan="8"></th>
                <th colspan="2"><center>SALDO</center></th>
                </tr>
                  <tr>
                    <th class="hidden-phone" rowspan="2">No</th>
                    <th class="hidden-phone" rowspan="2">Tanggal</th>
                    <th class="hidden-phone" rowspan="2">No Transaksi</th>
                    <th class="hidden-phone" rowspan="2">Kode Supplier</th>
                    <th class="hidden-phone" rowspan="2">Nama Supplier</th>
                    <th class="hidden-phone" rowspan="2">Keterangan</th>
                    <th class="hidden-phone" rowspan="2">Hutang Awal</th>
                    <th class="hidden-phone" rowspan="2">Hutang Masuk</th>
                    <th class="hidden-phone">Hutang Keluar</th>
                    <th class="hidden-phone">Hutang Akhir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->htngTanggal;?></td>
                    <td><?=$l->htngNoFaktur;?></td>
                    <td><?=$l->splrKode;?></td>
                    <td><?=$l->splrNama;?></td>
                    <td><?=$l->htngKet;?></td>
                    <td><?=number_format($l->htngAwal);?></td>
                    <td><?=@number_format($l->htngDebet);?></td>
                    <td><?=@number_format($l->htngKredit);?></td>
                    <td><?=number_format($l->htngAkhir);?></td>
                  </tr>
                  <?php
                    
                    
                    }
                   
                  ?>
                  
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


  


