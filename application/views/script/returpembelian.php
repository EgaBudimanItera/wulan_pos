<script type="text/javascript">
	$(document).ready(function(){
		//loadTable();

		//untuk event onclick barang
	  	$(".edit_retur").click(function () {     
	        var kode = $(this).attr('id');
	      $.ajax({
	          url: "<?=base_url()?>c_returpembelian/get_detpembelian/"+kode,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
	              $('#brngNama').val(res_.brngNama);
	              $('#dtpbBrngId').val(res_.dtpbBrngId);
	              $('#dtpbPmblId').val(res_.dtpbPmblId);
	              $('#dtpbJumlah').val(res_.dtpbJumlah);
	          }
	      })
	  	});
	});

	function loadTable() {
          $('#tampilbayarpiutang').load('<?=base_url()?>c_bayarpiutang/tabeldetailtemp',function(){})
    };
</script>