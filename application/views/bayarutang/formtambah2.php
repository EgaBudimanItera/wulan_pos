
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Pembayaran Hutang
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pembayaran Hutang</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Pilih Supplier</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Tambah Pembayaran</a><span class="divider-last">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_bayarutang/simpanall" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Faktur</label>
                    <div class="controls">
                       <input type="text" class="span6" id="pmblKode" readonly="" name="pmblKode" value="<?=@$_POST['pmblKode']?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Tanggal</label>
                    <div class="controls">
                       <input type="text" class="span6" id="daritanggal" readonly="" name="daritanggal" value="<?=@$_POST['daritanggal']?>"/>
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Supplier</label>
                    <div class="controls">
                      <?php $pmblNama = $this->M_pos->ambil('splrId',@$_POST['pmblStunId'],'supplier')->row(); ?>
                       <input type="text" class="span6" id="pmblNama" readonly="" name="pmblNama" value="<?=@$pmblNama->splrNama?>"/>
                       <input type="hidden" class="span6" id="dbyuPmblId" readonly="" name="dbyuPmblId" value="<?=@$_POST['pmblStunId']?>"/>
                       <span class="help-inline"></span>
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
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detailbayarutangModal"><i class="icon-plus-sign"></i> Tambahkan Pembayaran
                      </a>
                      
                  </div>
                
                  <!-- tempat menampilkan table detailpembelian temp -->
                  <div id="tampilbayarutang">
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan Pembayaran Utang</button>
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

<div class="modal fade" id="detailbayarutangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-wrapper">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Tambahkan Pembayaran</h4>
        </div>
        <div class="modal-body">
          <!--id="formTambahBarang"-->
          <form class="form-horizontal" id="formBayarUtang" role="form" method="post">
            <div class="control-group">
              <label class="control-label">No Faktur Pembelian</label>
              <div class="controls">
                 <select class="span12 chosen" data-placeholder="Pilih Faktur" tabindex="1" name="dbypPnjlId" id="dbypPnjlId">
                    <option value=""></option>
                    <!-- ambil nilai satuan dari tabel satuan -->
                    <?php
                            foreach($pembelian as $p){
                          ?>
                          
                          <option value="<?=$p->pmblId?>"><?=$p->pmblNoFaktur?></option>
                          <?php    
                            }
                          ?>
                 </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Utang</label>
              <div class="controls">
                 <input type="text" class="span12" id="dtpbHarga" readonly="" name="dtpbHarga" />
                 
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Bayar</label>
              <div class="controls">
                 <input type="number" class="span12" id="dtpbJumlah" required name="dtpbJumlah" />
                 
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Pilhan Bayar</label>
              <div class="controls">
                 <select class="span12 chosen" data-placeholder="Pilih" tabindex="1" name="pilihanbayar" id="pilihanbayar">
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Giro">Giro</option>
                 </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="button" class="btn btn-primary" onclick="simpan()"><i class="icon-ok"></i> Simpan Pembayaran</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>







  


