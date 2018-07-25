
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Sparepart
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Sparepart</a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div id="page" class="dashboard">                                    
                                   
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN SITE VISITS PORTLET-->
          <div class="widget">
            <div class="widget-title">
              <h4><i class="icon-folder-close"></i> Sparepart</h4>
              <span class="tools">
              <a href="javascript:;" class="icon-chevron-down"></a>
              <a href="javascript:;" class="icon-remove"></a>
              </span>
            </div>
            <div class="widget-body">
              <form id="simpan" action="<?php echo base_url() ?>Adm_spare/add" method="POST" class="form-horizontal" enctype="multipart/form-data">
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">ID Sparepart</label>
                    <div class="controls">
                       <input type="text" class="span6" id="inputWarning" value="<?php print_r($id); ?>" readonly required name="idsparepart" value="" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Sparepart</label>
                    <div class="controls">
                       <input type="text" class="span6" id="inputWarning" required name="nmsparepart" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Harga Jual</label>
                    <div class="controls">
                       <input type="text" class="span6" id="inputWarning" required name="hargajual" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Gambar</label>
                    <div class="controls">
                       <input type="file" class="span6" id="gambar" required name="gambar" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Spesifikasi</label>
                    <div class="controls">
                       <textarea class="span6" required name="spesifikasi"></textarea>
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                 </div>
              </form>
              <form id="ubah" style="display: none;" action="<?php echo base_url() ?>Adm_spare/edt" method="POST" class="form-horizontal" enctype="multipart/form-data">
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">ID Sparepart</label>
                    <div class="controls">
                       <input type="text" class="span6" id="idsparepart" readonly required name="idsparepart" value="" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Sparepart</label>
                    <div class="controls">
                       <input type="text" class="span6" id="nmsparepart" required name="nmsparepart" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Harga Jual</label>
                    <div class="controls">
                       <input type="text" class="span6" id="hargajual" required name="hargajual" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Gambar</label>
                    <div class="controls">
                       <input type="file" class="span6" id="gambar" name="gambar" />
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Spesifikasi</label>
                    <div class="controls">
                       <textarea class="span6" id="spesifikasi" required name="spesifikasi"></textarea>
                       <span class="help-inline"></span>
                    </div>
                 </div>
                 <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn" onclick="batal()">Cancel</button>
                 </div>
              </form>
            </div>
          </div>
          <!-- END SITE VISITS PORTLET-->
        </div>
      </div>

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
                           <?php echo $this->session->flashdata("status"); ?>
                        <table class="table table-striped table-bordered" id="sample_1">
                        <thead>
                            <tr>
                                <th>ID Sparepart</th>
                                <th class="hidden-phone">Nama Sparepart</th>
                                <th class="hidden-phone">Harga Jual</th>
                                <th class="hidden-phone">Gambar</th>
                                <th class="hidden-phone">Spesifikasi</th>
                                <th class="hidden-phone"></th>
                            </tr>
                        </thead>
                        <tbody>
                     
                         
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
  


