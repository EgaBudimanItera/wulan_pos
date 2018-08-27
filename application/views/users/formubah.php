
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Satuan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Satuan</a><span class="divider">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_users/ubah_users/<?=$users->userId?>" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama User</label>

                    <div class="controls">
                       <input type="hidden" name="userId" id="userId" value="<?=$users->userId?>">
                       <input type="text" class="span6" id="userNama" required name="userNama" value="<?=$users->userNama?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Password</label>
                    <div class="controls">
                       <input type="text" class="span6" id="userPassword" required name="userPassword" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Hak Akses</label>
                    <div class="controls">
                       <select name="userHakAkses" id="userHakAkses">
                        <option value="">-- Pilih --</option>
                         <option value="Pelanggan" <?php if($users->userHakAkses =="Pelanggan"){ echo "selected"; }?>>Pelanggan</option>
                         <option value="Gudang" <?php if($users->userHakAkses =="Gudang"){ echo "selected"; }?>>Gudang</option>
                         <option value="Penjualan" <?php if($users->userHakAkses =="Penjualan"){ echo "selected"; }?>>Penjualan</option>
                         <option value="Keuangan" <?php if($users->userHakAkses =="Keuangan"){ echo "selected"; }?>>Keuangan</option>
                         <option value="Pimpinan" <?php if($users->userHakAkses =="Pimpinan"){ echo "selected"; }?>>Pimpinan</option>
                         <option value="Administrator" <?php if($users->userHakAkses =="Administrator"){ echo "selected"; }?>>Administrator</option>
                       </select>
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


  


