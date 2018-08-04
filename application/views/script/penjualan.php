<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
		//select 2 untuk combox pelanggan
    	$("#dtpjBrngId").select2();

    	//untuk mengubah format select2
	    $('#dtpjBrngId').select2({
	      formatResult: format,
	      formatSelection: format,
	      escapeMarkup: function(m) { return m; }
	    }); 

    	//untuk event onclick barang
	  	$("#dtpjBrngId").change(function () {     
	        var kode = $(this).val()
	      $.ajax({
	          url: "<?=base_url()?>c_barang/getbarang/"+kode,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
	              $('#dtpjHarga').val(res_.brngHargaJual);
	          }
	      })
	  	});
	});

	function loadTable() {
          $('#tampilpenjualan').load('<?=base_url()?>c_penjualan/tabeldetailtemp',function(){})
    };
    function format(item) {
      var originalOption = item.element;
      var originalText = item.text;
      var s = '<span style="font-weight:bold">' + originalText+ '</span><br/>' +
              '<span style="color:#888">' +'Satuan = '+ $(originalOption).data('satuan') +'</span><br/>'+
              
              '<span style="color:#888">' + 'H.Jual = '+$(originalOption).data('harga') +'</span><br/>';
      return s;
     };
</script>