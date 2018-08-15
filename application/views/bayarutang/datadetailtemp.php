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
      <th><?=$l->?></th>
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