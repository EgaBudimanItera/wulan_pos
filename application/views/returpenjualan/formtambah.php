
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Retur Penjualan
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li>
              <a href="#">Retur Penjualan</i></a><span class="divider">&nbsp;</span>
          </li>
          <li>
              <a href="#">Pilih Penjualan</i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Tambah Retur</a><span class="divider-last">&nbsp;</span></li>
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
              <form action="<?=base_url()?>c_returpenjualan/simpanall" role="form" method="post" class="form-horizontal">
                <div class="control-group primary">
                  <label class="control-label" for="inputWarning">No Faktur Retur</label>
                  <div class="controls">
                     <input type="text" class="span6" id="rtpjNoFaktur" value="<?=$nofakturretur?>" required name="rtpjNoFaktur" />
                     <span class="help-inline"></span>
                  </div>
                </div>
                <div class="control-group primary">
                  <label class="control-label" for="inputWarning">Tanggal Retur</label>
                  <div class="controls">
                    <div class="input-append" id="ui_date_picker_trigger">
                      <input name="rtpjTanggal" type="text"  class="m-wrap medium" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                  </div>
                </div>
                <div class="control-group primary">
                  <label class="control-label" for="inputWarning">No Faktur Pembelian</label>
                  <div class="controls">
                     <input type="text" class="span6" id="pnjlNoFaktur" readonly name="pnjlNoFaktur" value="<?=$list->pnjlNoFaktur?>" />
                     <input type="hidden" class="span6" id="pnjlId" readonly name="pnjlId" value="<?=$list->pnjlId?>" />
                     <input type="hidden" class="span6" id="pnjlPlgnId" readonly name="pnjlPlgnId" value="<?=$list->pnjlPlgnId?>" />
                     <input type="hidden" class="span6" id="pnjlSisaBayar" readonly name="pnjlSisaBayar" value="<?=$list->pnjlSisaBayar?>" />
                     <span class="help-inline"></span>
                  </div>
                </div>
                <!-- <div class="control-group primary">
                  <label class="control-label" for="inputWarning">Tanggal Pembelian</label>
                  <div class="controls">
                    <div class="input-append" id="ui_date_picker_trigger">
                      <input name="pnjlTanggal" type="text"  class="m-wrap medium" value="<?=$list->pnjlTanggal?>" /><span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                  </div>
                </div>  -->
                <div class="control-group primary">
                  <label class="control-label" for="inputWarning">Alasan Retur</label>
                  <div class="controls">
                     <textarea name="rtpjKet" class="span6"></textarea>
                  </div>
                </div>
               
              <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">HPP</th>
                    <th class="hidden-phone">J.Jual</th>
                    <th class="hidden-phone">J.Retur Real</th>
                    <th class="hidden-phone">J.Retur Temp</th>
                    <th class="hidden-phone">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <!-- ambil dari kamus sql retur penjualan -->
                 <?php
                      $no=1;
                      //var_dump($list_retur);
                      foreach($list_retur as $l){
                    ?>
                   <tr>
                      <td><?=$no++;?></td>
                      <td><?=$l->brngNama?></td>
                      <td><?=number_format($l->brngHpp)?></td>
                      <td><?=number_format($l->dtpjJumlah)?></td>
                      <td><?=number_format($l->jumlahretur)?></td>
                      <td><?=number_format($l->jumlahreturtemp)?></td>
                      <td>
                        <a id="<?=$l->brngId?>" nofaktur="<?=$nofakturjual?>" class="btn btn-success edit_retur" href="#" data-toggle="modal" data-target="#returjualModal"><i class="icon-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
              <div class="form-actions">
                  <button type="submit" class="btn btn-warning" ><i class="icon-ok"></i> Simpan Retur</button>
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
  
<div class="modal fade" id="returjualModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
              <label class="control-label" for="inputWarning">Nama Barang</label>
              <div class="controls">
                 <input type="text" class="span12" id="brngNama" readonly="" name="brngNama" />
                 <input type="hidden" class="span12" id="dtpjBrngId" readonly="" name="dtpjBrngId" />
                 <input type="hidden" class="span12" id="dtpjPnjlId" readonly="" name="dtpjPnjlId" />
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Jual</label>
              <div class="controls">
                 <input type="number" class="span12" id="dtpjJumlahJual" readonly="" name="dtpjJumlahJual" />
                 
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Retur Dahulu</label>
              <div class="controls">
                 <input type="number" class="span12" id="returlalu" readonly="" name="returlalu" />
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah Retur</label>
              <div class="controls">
                 <input type="number" class="span12" id="drpjJumlah" required name="drpjJumlah" />
                 
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

