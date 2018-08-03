
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Supplier
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Supplier</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Tambah Data</a><span class="divider-last">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_supplier/tambah_supplier" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Kode Supplier</label>
                    <div class="controls">
                       <input type="text" class="span6" id="splrKode" readonly="" value="<?=$splrKode?>" name="splrKode" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Supplier</label>
                    <div class="controls">
                       <input type="text" class="span6" id="splrNama" required name="splrNama" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Alamat</label>
                    <div class="controls">
                       <textarea class="span6" required="" name="splrAlamat"></textarea>
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Telp 1</label>
                    <div class="controls">
                       <input type="number" class="span6" id="splrTelp1" required name="splrTelp1" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Telp 2</label>
                    <div class="controls">
                       <input type="number" class="span6" id="splrTelp2" required name="splrTelp2" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Hutang</label>
                    <div class="controls">
                       <input type="number" class="span6" id="splrHutang" required name="splrHutang" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Simpan Data</button>
                    <!-- <button type="reset" class="btn btn-warning"><i class="icon-remove"></i>Hapus Data</button> -->
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


  


