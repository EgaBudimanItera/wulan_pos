
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Laporan Kas
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
                  <a href="<?=base_url()?>c_lapkas/cetak" class="btn btn-warning"><i class="icon-print"></i> Cetak</a>
                </div>
              </div>

              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">No Faktur</th>
                    <th class="hidden-phone">Keterangan</th>
                    <th class="hidden-phone">Debet</th>
                    <th class="hidden-phone">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    $totaldebet=0;
                    $totalkredit=0;
                    foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$l->cashTanggal;?></td>
                    <td><?=$l->cashNoFaktur;?></td>
                    <td ><?=$l->cashKet;?></td>
                    <td align="right"><?php echo number_format($l->cashDebet)?></td>
                    <td align="right"><?php echo number_format($l->cashKredit)?></td>
                  </tr>
                  <?php
                    
                    $totaldebet=$totaldebet+($l->cashDebet);
                    $totalkredit=$totalkredit+$l->cashKredit;
                    }
                   
                  ?>
                  <tr>
                    <td colspan="4">Total</td>
                    <td align="right"><?php echo number_format($totaldebet)?></td>
                    <td align="right"><?php echo number_format($totalkredit)?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Sisa Kas</td>
                    <td colspan="2" align="right"><?php echo number_format($kas)?></td>
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


  


