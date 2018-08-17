<div id="info-alert1">
    <?=@$this->session->flashdata('msg')?>
</div>
<table class="data-table table table-bordered table-striped" >
  <thead>
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-2">No Faktur</th>
      <th class="col-md-2">Jumlah Hutang </th>
      <th class="col-md-2">Jumlah Bayar</th>
      <th class="col-md-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no=1;
      foreach($list as $l){
    ?>
    <tr>
      <th><?=$no++?></th>
      <th><?=$l->pnjlNoFaktur?></th>
      <th><?=number_format($l->pnjlSisaBayar)?></th>
      <th><?=number_format($l->dbypBayar)?></th>
      <td>
         <center>
          <!-- <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-xs btn-danger" href="<?=base_url()?>c_pembelian/hapusdet/<?=$l->dbyuId?>" >
            <i class="icon-trash"></i>  
          </a> -->
          <a href="#" style="color:#DAA520; text-decoration:none;" onclick="if(confirm('Apakah anda yakin?')) hapustemp('<?=$l->dbypId?>');">
            <button type="button" class="btn btn-danger btn-xs">
              <i class="icon-trash"></i>                      
            </button>
          </a> 
        </center>
    </tr>
    <?php }?>

  </tbody>
</table>

<script type="text/javascript">
  $(document).ready(function(){
    $("#info-alert1").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert1").slideUp(50);
      });
  });
</script>