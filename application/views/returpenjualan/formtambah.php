
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
              <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">HPP</th>
                    <th class="hidden-phone">J.Beli</th>
                    <th class="hidden-phone">J.Retur</th>
                    <th class="hidden-phone">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <!-- ambil dari kamus sql retur penjualan -->
                 <tr>
                    <td>1</td>
                    <td>a</td>
                    <td>1000</td>
                    <td>10</td>
                    <td>0</td>
                    <td>
                      <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#returjualModal"><i class="icon-pencil"></i></a>
                    </td>
                  </tr>
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

