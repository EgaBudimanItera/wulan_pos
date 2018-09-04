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
<div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
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
                <a href="#" id="<?=$l->brngId?>" class="btn btn-primary btn-block barang" data-toggle="modal" data-target="#detailbarangModal">
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

<div class="modal fade" id="detailbarangModal"  role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                 <input type="text" class="span12" name="brngNama" id="brngNama" readonly />
                 <input type="hidden" class="span12" name="brngId" id="brngId" readonly />
                 <input type="hidden" class="span12" name="dopjDiskon" id="dopjDiskon" value="0" readonly>
                 
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputWarning">Harga</label>
              <div class="controls">
                 <input type="text" class="span12" id="brngHargaJual" name="brngHargaJual" readonly/>
                 
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="inputWarning">Jumlah</label>
              <div class="controls">
                 <input type="number" class="span12" id="dtpjJumlah" required name="dtpjJumlah" />
                 
              </div>
            </div> 
            <div class="form-actions">
              <button type="button" class="btn btn-primary" onclick="simpan()"><i class="icon-ok"></i> Tambahkan keKeranjang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $("#info-alert").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert").slideUp(50);
    });    
  });

  $(".barang").click(function () {     
        var kode = $(this).attr('id');
        $modal = $('#detailbarangModal');
        $.ajax({
            url: "<?=base_url()?>c_barang/getbarang/"+kode,
            type: 'GET',
            success: function(res) {
                var res_ = JSON.parse(res);
                $('#brngId').val(res_.brngId);
                $('#brngHargaJual').val(res_.brngHargaJual);
                $('#brngNama').val(res_.brngNama);
                
            }
        })
      });
  function simpan(){
        var brngId=$('#brngId').val();
        var dtpjJumlah=$('#dtpjJumlah').val();
        var brngHargaJual=$('#brngHargaJual').val();
        var dopjDiskon=$('#dopjDiskon').val();
        $modal = $('#detailbarangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>front/simpanorder_temp',
            data: 'dopjBrngId='+brngId+'&dopjJumlah='+dtpjJumlah+'&dopjHarga='+brngHargaJual+'&dopjDiskon='+dopjDiskon,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dopjBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dopjBrngId').val(null).trigger('change');
                }
            }
          });
      };
      //function untuk hapus temporary
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_orderpenjualan/hapusdetail/"+id,
            type: "GET",
            dataType: 'JSON',
            success: function(msg) {
                if(msg.status == 'success'){
                    loadTable();                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal hapus data');
                }
            }
        })
    } ; 
</script>