
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Pelanggan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pelanggan</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Ubah Data</a><span class="divider-last">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_pelanggan/ubah_pelanggan/<?=$pelanggan->plgnId?>" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Kode Pelanggan</label>
                    <div class="controls">
                       <input type="hidden" class="span6" id="plgnId" required name="plgnId" />
                       <input type="text" class="span6" id="plgnKode" readonly="" name="plgnKode" value="<?=@$pelanggan->plgnKode?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Pelanggan</label>
                    <div class="controls">
                       <input type="text" class="span6" id="plgnNama" required name="plgnNama" value="<?=@$pelanggan->plgnNama?>"/>
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Kontak</label>
                    <div class="controls">
                       <input type="text" class="span6" id="plgnNamaKontak" required name="plgnNamaKontak" value="<?=@$pelanggan->plgnNamaKontak?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">NIK</label>
                    <div class="controls">
                        <input type="text" class="span6" id="plgnNik" required name="plgnNik" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Email</label>
                    <div class="controls">
                        <input type="text" class="span6" id="plgnEmail"  name="plgnEmail" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Telp 1</label>
                    <div class="controls">
                       <input type="number" class="span6" id="plgnTelp1" required name="plgnTelp1" value="<?=@$pelanggan->plgnTelp1?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Telp 2</label>
                    <div class="controls">
                       <input type="number" class="span6" id="plgnTelp2" required name="plgnTelp2" value="<?=@$pelanggan->plgnTelp2?>"/>
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Alamat</label>
                    <div class="controls">
                       <textarea class="span6" id="plgnAlamat" required name="plgnAlamat"><?=@$pelanggan->plgnAlamat?></textarea>
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Ubah Data</button>
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


  


