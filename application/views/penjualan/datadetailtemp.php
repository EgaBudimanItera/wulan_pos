<div id="info-alert1">
    <?=@$this->session->flashdata('msg')?>
</div>
<table class="data-table table table-bordered table-striped" >
  <thead>
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-2">Nama Barang</th>
      <th class="col-md-2">Jumlah </th>
      <th class="col-md-2">Harga Satuan (Rp)</th>
      <th class="col-md-3">Subtotal (Rp)</th>
      <th class="col-md-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    

  </tbody>
</table>

<script type="text/javascript">
  $(document).ready(function(){
    $("#info-alert1").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert1").slideUp(50);
      });
  });
</script>