
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Order Penjualan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Order Penjualan</a><span class="divider-last">&nbsp;</span></li>
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

              <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">No Faktur</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">Pelanggan</th>
                    <th class="hidden-phone">Total</th>
                    <th class="hidden-phone">Status Order</th>
                    <th class="hidden-phone">Aksi</th>
                  </tr>
                </thead>
                
                <tbody>
                <?php
                  $no=1;
                  foreach($list as $l){
                ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->opnjNoFaktur?></td>
                    <td><?=$l->opnjTanggal?></td>
                    <td><?=$l->plgnNama?></td>
                    <td><?php echo number_format($l->opnjTotalJual)?></td>
                    <td><?=$l->opnjStatusOrder?></td>
                    <td>
                      <center>
                          <a data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-xs btn-warning" href="<?=base_url()?>c_orderpenjualan/formdetail/<?=$l->opnjId?>">
                            <i class="icon-eye-open"></i>                
                          </a>
                          <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="<?=base_url()?>c_orderpenjualan/hapusall/<?=$l->opnjId?>" onclick="return confirm('yakin akan menghapus data ini?')">
                            <i class="icon-trash"></i>  
                          </a>
                        </center>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
                
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


  


