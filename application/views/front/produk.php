<?php
  $hakakses=$this->session->userdata('userHakakses');
?> 

<!-- Rooms -->
<section class="parallax-effect" tabindex="5000" style="overflow: hidden; outline: none;">
  <div id="parallax-pagetitle" style="background-image: url(); background-position: 50% -67px;">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ol>
            <h1><i class="fa fa-user"></i> Produk Toko</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <div class="col-md-12">
        <form class="clearfix" role="form" method="post" action="<?=base_url()?>front/authpelanggan">
          <?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
          $numOfCols = 4;
          $rowCount = 0;
          $bootstrapColWidth = 12 / $numOfCols;
          ?>
          <div class="row">
            <?php
              foreach ($listbarang as $l){
            ?>
              <div class="col-md-<?php echo $bootstrapColWidth; ?> col-sm-6">
                <div class="thumbnail">
                  <img src="<?=base_url()?>assets/file_upload/<?=$l->brngGambar?>" class="image-responsive" width ="250px" height="150px"> 
                  <center><h4><?=$l->brngNama?></h4></center>
                  <center><h4><?php echo 'Rp '.number_format($l->brngHargaJual);?></h4></center>
                 <!--  <div class="col-md-12">
                    <div class="col-md-6">
                      <input name="password" type="password" value="" class="form-control" style="color:black" /> 
                    </div>
                    <div class="col-md-6">
                      <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#detailbarangModal"><i class="icon-plus-sign"> Beli Produk</i></a>
                    </div>
                  </div> -->
                  
                  
                </div>
                 
                <!-- <div class="form-group">
                

                 <center><strong><?=$l->brngNama?></strong></center>
                 <br>
                 <?php
                  if(!empty($userHakakses)){
                 ?>
                 
                 <?php
                  }
                 ?>
                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#detailbarangModal"><i class="icon-plus-sign"> Beli Produk</i></a>
                </div> -->
              </div>
            <?php    
              }
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="detailbarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-wrapper">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Tambahkan Barang</h4>
        </div>
        <div class="modal-body">
         
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
</script>