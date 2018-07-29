<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	function loadTable() {
          $('#tampilpembelian').load('<?=base_url()?>c_pembelian/tabeldetailtemp',function(){})
    };
</script>