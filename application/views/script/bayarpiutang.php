<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	function loadTable() {
          $('#tampilbayarpiutang').load('<?=base_url()?>c_bayarpiutang/tabeldetailtemp',function(){})
    };
</script>