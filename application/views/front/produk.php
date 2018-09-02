<?php
  $hakakses=$this->session->userdata('Hakakses');
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
<div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
<br>
<!-- <section class="rooms mt100">
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
                  <?php if(empty($l->brngGambar)){?>
                  <img src="<?=base_url()?>assets/file_upload/images.jpg" class="image-responsive" width ="250px" height="150px">
                  <?php }else{ ?>
                  <img src="<?=base_url()?>assets/file_upload/<?=$l->brngGambar?>" class="image-responsive" width ="250px" height="150px"> 
                  <?php } ?>

                  <center><h4><?=$l->brngNama?></h4></center>
                  <center><h4><?php echo 'Rp '.number_format($l->brngHargaJual);?></h4></center>
                </div>
              </div>
            <?php    
              }
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> -->

<section class="rooms mt100">
  <div class="container">
    <div class="row room-list">
      <?php
        foreach ($listbarang as $l){
      ?>  
      <div class="col-md-4 col-sm-6">
        <div class="room-thumb">
         <?php if(empty($l->brngGambar)){?>
          <img src="<?=base_url()?>assets/file_upload/images.jpg" class="image-responsive" width ="150px" height="200px">
          <?php }else{ ?>
          <img src="<?=base_url()?>assets/file_upload/<?=$l->brngGambar?>" class="image-responsive" width ="150px" height="200px"> 
         <?php } ?> 
         <div class="mask">
            <div class="main">
              <h5><?=$l->brngNama?></h5> 
              <div class="price"><?php echo 'Rp '.number_format($l->brngHargaJual);?></div>
            </div>
            <div class="content">
              <div class="row">
                <a href="#" class="btn btn-primary btn-block">
                  Beli Produk  
                </a>  
              </div>  
            </div>
         </div>
        </div> 

      </div>
      <?php
        }
      ?>
    </div> 
  </div>
</section>



<script type="text/javascript">
  $(document).ready(function(){
    $("#info-alert").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert").slideUp(50);
    });    
  });
</script>