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
            <h1><i class="fa fa-user"></i> Form Login Pelanggan</h1>
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
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>No Faktur</th>
              <th>Keterangan</th> 
              <th>Total Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>    
          </thead>
          <tbody>
            
            <?php
              $no=1;
              foreach ($list as $l){
            ?>
              <tr>
                 <td><?=$no++?></td>
                 <td><?=$l->opnjNoFaktur?></td>
                 <td><?=$l->opnjKet?></td>
                 <td><?=$l->opnjTotalOrder?></td>
                 <td><?=$l->opnjStatusOrder?></td>
                
                 <td>
                  <a data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-xs btn-warning" href="#" >Detail
                     
                  </a>
                  <?php 
                    if($l->opnjStatusOrder=='Order'){
                  ?>
                    <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="#" >Hapus
                    
                    </a> 
                  <?php
                    }

                  ?>
                 </td>
               </tr>  
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>