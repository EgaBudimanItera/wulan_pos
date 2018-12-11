
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Barang
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Barang</a><span class="divider">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_barang/tambah_barang" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Kode Barang</label>
                    <div class="controls">
                       <input type="text" class="span6" id="brngKode" name="brngKode" value="<?=$brngKode?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Nama Barang</label>
                    <div class="controls">
                       <input type="text" class="span6" id="brngNama" required name="brngNama" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Satuan</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="Pilih Satuan" tabindex="1" name="brngStunId">
                          <option value=""></option>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <?php 
                          foreach ($list_satuan as $ls){
                          ?>
                          <option value="<?=$ls->stunId?>"><?=$ls->stunNama?></option>
                          <?php } ?>
                       </select>
                    </div>
                 </div>
                 
                 <?php if ($this->session->userdata('userHakakses') != 'Gudang' ) { ?>
                    <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Hpp</label>
                    <div class="controls">
                       <input type="number" class="span6" id="brngHpp" required name="brngHpp" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Harga Jual</label>
                    <div class="controls">
                       <input type="number" class="span6" id="brngHargaJual" required name="brngHargaJual" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                 <?php }else{ ?>
                 <input type="hidden" class="span6" id="brngHpp" required name="brngHpp" value="0"/>
                 <input type="hidden" class="span6" id="brngHargaJual" required name="brngHargaJual" value="0"/>
                 <?php }?>
                  <!-- <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Stok</label>
                    <div class="controls">
                       <input type="number" class="span6" id="brngStokAkhir" required name="brngStokAkhir" />
                       <span class="help-inline"></span>
                    </div>
                  </div>  -->
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Gambar Barang</label>
                    <div class="controls">
                       <input type="file" class="span6" id="brngGambar" required name="brngGambar" />
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


  


