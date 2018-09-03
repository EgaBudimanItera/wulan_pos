
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Penjualan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Penjualan</a><span class="divider">&nbsp;</span></li>
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
                <form action="<?=base_url()?>c_orderpenjualan/simpanall" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">No Faktur</label>
                    <div class="controls">
                       <input type="text" class="span6" id="pnjlNoFaktur" readonly name="pnjlNoFaktur" value="<?=$nofaktur?>" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Tanggal</label>
                    <div class="controls">
                       <div class="input-append" id="ui_date_picker_trigger">
                        <input name="pnjlTanggal" type="text"  class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Pelanggan</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="Pilih Pelanggan" tabindex="1" name="pnjlPlgnId">
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
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Keterangan</label>
                    <div class="controls">
                       <textarea name="pnjlKet" class="span6"></textarea>
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="form-actions">
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detailbarangModal"><i class="icon-plus-sign"></i> Tambahkan Barang
                      </a>
                  </div>
                
                  <!-- tempat menampilkan table detailPenjualan temp -->
                  <div id="tampilpenjualan">
                  </div>
                  <br>
                  <!-- <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Uang Muka</label>
                    <div class="controls">
                        <input type="number" class="span6" id="pnjlUangMuka" value="0" required name="pnjlUangMuka" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Diskon</label>
                    <div class="controls">
                        <input type="number" class="span6" id="pmblDiskon" value="0" required name="pmblDiskon" />
                       <span class="help-inline"></span>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Ongkos Kirim</label>
                    <div class="controls">
                        <input type="number" class="span6" id="pmblOngkir" value="0" required name="pmblOngkir" />
                       <span class="help-inline"></span>
                    </div>
                  </div> -->
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan Penjualan</button>
                    
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

<div class="modal fade" id="detailbarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-wrapper">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Tambahkan Barang</h4>
        </div>
        <div class="modal-body">
          <!--id="formTambahBarang"-->
          <form class="form-horizontal" id="formTambahBarang" role="form" method="post">
            <div class="control-group">
              <label class="control-label">Nama Barang</label>
              <div class="controls">
                 <select class="select2-containerpopulate" style="width: 300px" data-placeholder="Pilih Barang" tabindex="1" name="dopjBrngId" id="dopjBrngId">
                    <option value=""></option>
                    <!-- ambil nilai satuan dari tabel satuan -->
                    <?php
                      foreach($barang as $b){
                    ?>
                    <option value="<?=$b->brngId?>" data-satuan="<?=$b->stunNama?>" data-harga="<?php echo number_format($b->brngHargaJual)?>"><?=$b->brngNama?></option>
                    <?php    
                      }
                    ?>
                 </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputWarning">Harga Jual Satuan</label>
              <div class="controls">
                 <input type="text" class="span12" id="dopjHarga" readonly="" name="dopjHarga" />
                 
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Jual</label>
              <div class="controls">
                 <input type="number" class="span12" id="dopjJumlah" required name="dopjJumlah" />
                 
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputWarning">Diskon</label>
              <div class="controls">
                 <input type="number" class="span12" id="dopjDiskon" required name="dopjDiskon" />
                 
              </div>
            </div> 
            <div class="form-actions">
              <button type="button" class="btn btn-primary" onclick="simpan()"><i class="icon-ok"></i> Simpan Barang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>







  


