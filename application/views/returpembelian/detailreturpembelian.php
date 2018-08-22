
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Detail Retur Pembelian
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Retur Pembelian</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Detail Retur Pembelian</a><span class="divider-last">&nbsp;</span></li>
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
              
              <div>
                <button type="button" class="btn btn-primary" onclick="self.history.back()">
                  <i class="icon-arrow-left"></i> Kembali
                </button>
              </div>
              <br>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Kode Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">HPP</th>
                    <th class="hidden-phone">Jumlah</th>
                    <th class="hidden-phone">Subtotal</th>
                    <th class="hidden-phone">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    $total = 0;
                    foreach($list as $l){

                    //$total+= $l->drpbJumlah*$l->brngHpp;
                  ?>
                  <tr>
                    <th><?=$no++?></th>
                    <th><?=$l->rtpbNoFaktur?></th>
                    <th><?=$l->brngNama?></th>
                    <th><?=number_format($l->brngHpp)?></th>
                    <th><?=number_format($l->drpbJumlah)?></th>
                    <th><?=number_format($l->drpbJumlah*$l->brngHpp)?></th>
                    <td>
                       <center>
                        <!-- <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="<?=base_url()?>c_pembelian/hapusdet/<?=$l->dbypId?>" >
                          <i class="icon-trash"></i>  
                        </a> -->
                        <a href="#" style="color:#DAA520; text-decoration:none;" onclick="if(confirm('Apakah anda yakin?')) hapustemp('<?=$l->drpbId?>');">
                          <button type="button" class="btn btn-danger btn-xs">
                            <i class="icon-trash"></i>                      
                          </button>
                        </a> 
                      </center>
                  </tr>
                  <?php }?>
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
  


