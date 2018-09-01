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
          <div class="row">
            <?php
              foreach ($listbarang as $l){
            ?>
              <div class="col-md-3">
                <div class="form-group">
                 <img src="<?=base_url()?>assets/file_upload/<?=$l->brngGambar?>" width ="250px" height="150px"> 
                 <center><?=$l->brngNama?></center>
                 <?php
                  if(!empty($userHakakses)){
                 ?>
                 <center><button class="btn btn-primary">Beli</button></center> 
                 <?php
                  }
                 ?>
                 
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
</section>