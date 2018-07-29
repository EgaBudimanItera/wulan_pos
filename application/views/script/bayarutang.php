<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	function loadTable() {
          $('#tampilbayarutang').load('<?=base_url()?>c_bayarutang/tabeldetailtemp',function(){})
    };
</script>