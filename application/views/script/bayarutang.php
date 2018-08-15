<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	$("#dtpbBrngId").change(function () {     
	        var kode = $(this).val()
	      $.ajax({
	          url: "<?=base_url()?>c_bayarutang/get_pembelian/"+kode,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
	              $('#dtpbHarga').val(res_.pmblSisaBayar);
	          }
	      })
	  	});
		loadTable();

	function loadTable() {
          $('#tampilbayarutang').load('<?=base_url()?>c_bayarutang/tabeldetailtemp',function(){})
    };
</script>