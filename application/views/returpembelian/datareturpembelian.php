
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Retur Pembelian
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Retur Pembelian</a><span class="divider-last">&nbsp;</span></li>
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
             <div><a href="<?=base_url()?>c_returpembelian/pilihpembelian" class="btn btn-primary">Tambah Data</a></div>
             <br>
             <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>

              <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">No Faktur</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">Supplier</th>
                    <th class="hidden-phone">Total</th>
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
                    <td><?=$l->rtpbNoFaktur?></td>
                    <td><?=$l->rtpbTanggal?></td>
                    <td><?=$l->splrNama?></td>
                    <td><?php echo number_format($l->rtpbNilai)?></td>
                    <td>
                    <a data-toggle="tooltip" data-placement="bottom" title="Cetak" class="btn btn-xs btn-success" href="<?=base_url()?>c_returpembelian/invoice/<?=$l->rtpbId?>" target="_blank">
                            <i class="icon-print"></i>                
                          </a>
                      <a class="btn btn-warning" href="<?=base_url()?>c_returpembelian/formdetail/<?=$l->rtpbId?>" title="Detail"><i class="icon-eye-open"></i></a>
                      <!-- <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="<?=base_url()?>c_returpembelian/hapusall/<?=$l->rtpbId?>" onclick="return confirm('yakin akan menghapus data ini?')">
                            <i class="icon-trash"></i>  
                          </a> -->
                    </td>
                  </tr>
                  <?php
                    }
                  ?>  
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
  


