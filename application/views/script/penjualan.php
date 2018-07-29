<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	function loadTable() {
          $('#tampilpenjualan').load('<?=base_url()?>c_penjualan/tabeldetailtemp',function(){})
    };
</script>