<script type="text/javascript">
	$(document).ready(function(){
		//loadTable();
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

	
    function format(item) {
      var originalOption = item.element;
      var originalText = item.text;
      var s = '<span style="font-weight:bold">' + originalText+ '</span><br/>' +
              '<span style="color:#888">' +'Satuan = '+ $(originalOption).data('satuan') +'</span><br/>'+
              '<span style="color:#888">' + 'H.Jual = '+$(originalOption).data('harga') +'</span><br/>';
      return s;
     };

    function loadTable() {
          $('#tampilpenjualan').load('<?=base_url()?>c_penjualan/tabeldetailtemp',function(){})
    };

     //function simpan data
	function simpan(){
        var dtpjBrngId=$('#dtpjBrngId').val();
        var dtpjJumlah=$('#dtpjJumlah').val();
        var dtpjHarga=$('#dtpjHarga').val();
        $modal = $('#detailbarangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_penjualan/tambahpenjualandet',
            data: 'dtpjBrngId='+dtpjBrngId+'&dtpjJumlah='+dtpjJumlah+'&dtpjHarga='+dtpjHarga,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpjBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpjBrngId').val(null).trigger('change');
                }
            }
          });
      };
      //function untuk hapus temporary
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_penjualan/hapusdetail/"+id,
            type: "GET",
            dataType: 'JSON',
            success: function(msg) {
                if(msg.status == 'success'){
                    loadTable();                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal hapus data');
                }
            }
        })
    } ; 
</script>