
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Pembelian
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pembelian</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Tambah Data</a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div id="page" class="dashboard"> 
        <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
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
                <form action="#" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Faktur</label>
                    <div class="controls">
                       <input type="text" class="span6" id="pmblKode" required name="pmblKode" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Tanggal</label>
                    <div class="controls">
                       <input type="text" class="span6" id="pmblNama" required name="pmblNama" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Supplier</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="Pilih Supplier" tabindex="1" name="pmblStunId">
                          <option value=""></option>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <option value="Category 1">Category 1</option>
                       </select>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Keterangan</label>
                    <div class="controls">
                       <textarea name="pmblKet" class="span6"></textarea>
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="form-actions">
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detailbarangModal"><i class="icon-plus-sign"></i> Tambahkan Barang
                      </a>
                  </div>
                  <br>
                  <!-- tempat menampilkan table detailpembelian temp -->
                  <div id="tampilpembelian">
                  </div>
                  <br>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Uang Muka</label>
                    <div class="controls">
                        <input type="number" class="span6" id="pmblNama" required name="pmblNama" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
              
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan Pembelian</button>
                    
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


  


