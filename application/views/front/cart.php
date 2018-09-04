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
            <h1><i class="fa fa-user"></i> Keranjang Belanja</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
<section class="rooms mt100">

  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <div class="col-md-12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th class="col-md-1">Kode Barang</th>
              <th class="col-md-3">Nama Barang</th> 
              <th class="col-md-2">Harga Satuan</th>
              <th class="col-md-2">Jumlah</th>
              <th class="col-md-2">Subtotal</th>
              <th class="col-md-1">Aksi</th>
            </tr>    
          </thead>
          <tbody>
            
            <?php
              $no=1;
              $total=0;
              foreach ($list as $l){
            ?>
              <tr>
                 <td><?=$no++?></td>
                 <td><?=$l->brngKode?></td>
                 <td><?=$l->brngNama?></td>
                 <td><?php echo number_format($l->dopjHarga)?></td>
                 <td><?=$l->dopjJumlah?></td>
                 <td><?php echo number_format($l->dopjJumlah*$l->dopjHarga)?></td>
                 <td>
                  <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="<?=base_url()?>front/hapusdetail/<?=$l->dopjId?>" >Hapus</a> 
                 </td>
               </tr>  
            <?php
             $total=$total+($l->dopjJumlah*$l->dopjHarga);
              }
            ?>
            <tr>
              <td colspan="5">Total Harga </td>
              <td colspan="2"><?php echo number_format($total)?></td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td><a data-toggle="tooltip" data-placement="bottom" title="Belanja Produk Lain" class="btn btn-warning" href="<?=base_url()?>front/produk" >Belanja Produk Lain</a> </td>
             <td>&nbsp</td>
             <td>&nbsp</td>
             <td>&nbsp</td>
             <td><a data-toggle="tooltip" data-placement="bottom" title="Simpan Belanja" class="btn  btn-success" href="<?=base_url()?>front/simpanallorder" >Simpan Belanja</a> </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>