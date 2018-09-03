
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Detail Order Penjualan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Order Penjualan</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Order Detail Penjualan</a><span class="divider-last">&nbsp;</span></li>
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
              <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
                    <?php if($o->opnjStatusOrder == 'Order'){?>
                    <a data-toggle="tooltip" data-placement="bottom" title="Terima Order" class="btn btn-xs btn-warning" href="<?=base_url()?>c_orderpenjualan/terimaorder/<?=$l->dopjOpnjId?>">
                      <i class="icon-money"></i> Terima Order Produk                
                    </a>
                    <?php }else{?>
                      <a data-toggle="tooltip" data-placement="bottom" title="Terima Order" class="btn btn-xs btn-success" href="#">
                      <i class="icon-check"></i> Order Produk Diterima             
                    </a>
                    <?php }?>
                  </td>
                </tr>
              </table>
            </div>
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
  


