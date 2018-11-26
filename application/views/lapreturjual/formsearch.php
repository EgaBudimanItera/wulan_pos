
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Laporan Retur Penjualan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Laporan Retur Penjualan</a><span class="divider-last">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_lapreturjual/lihat" role="form" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Pelanggan</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="--Pilih Pelanggan--" tabindex="1" name="plgnId">
                          <option value="">Semua</option>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <?php
                            foreach($pelanggan as $b){
                          ?>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <option value="<?=$b->plgnId?>" ><?=$b->plgnNama?></option>
                          <?php
                            }
                          ?>
                       </select>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Dari Tanggal</label>
                    <div class="controls">
                      <div class="input-append" id="ui_date_picker_trigger">
                        <input name="daritanggal" type="text"  class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning"> Hingga Tanggal</label>
                    <div class="controls">
                      <div class="input-append" id="ui_date_picker_trigger">
                        <input name="hinggatanggal" type="text"  class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-search"></i> Cari Data</button>
                  </div>
                </form>
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


  


