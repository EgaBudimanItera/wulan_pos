
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
          <li><a href="#">Retur Penjualan</a><span class="divider-last">&nbsp;</span></li>
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
             <div><a href="<?=base_url()?>c_returpenjualan/pilihpenjualan" class="btn btn-primary">Tambah Data</a></div>
             <br>
             <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>

              <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">No Faktur</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">Supplier</th>
                    <th class="hidden-phone">Total</th>
                    <th class="hidden-phone">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>F01</td>
                    <td>2018-07-30</td>
                    <td>budiman</td>
                    <td>1000</td>
                    <td>
                      <a class="btn btn-primary" href="<?=base_url()?>c_returpenjualan/formdetail/1" title="Detail"><i class="icon-eye-open"></i></a>
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
  

