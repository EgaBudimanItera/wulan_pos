
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Pembayaran Piutang
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pembayaran Piutang</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Pilih Pelanggan</a><span class="divider-last">&nbsp;</span></li>
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
                </div>
                <br>
                <form action="<?=base_url()?>c_bayarpiutang/formtambah2" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Faktur</label>
                    <div class="controls">
                       <input type="text" class="span6" id="byrpNoFaktur" value="<?=$nofaktur?>" readonly="" name="byrpNoFaktur" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Tanggal</label>
                    <div class="controls">
                      <div class="input-append" id="ui_date_picker_trigger">
                        <input name="byrpTanggal" type="text"  class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Pelanggan</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="Pilih Pelanggan" tabindex="1" name="byrpPlgnId">
                          <option value=""></option>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <?php
                            foreach($pelanggan as $s){
                          ?>
                          <option value="<?=$s->plgnId?>"><?=$s->plgnNama?></option>
                          <?php    
                            }
                          ?>
                       </select>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> Next >></button>
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

