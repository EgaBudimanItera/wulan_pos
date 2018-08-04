<script type="text/javascript">
	$(document).ready(function(){
		//select 2 untuk combox pelanggan
    $("#dtpbBrngId").select2();

    //untuk mengubah format select2
    $('#dtpbBrngId').select2({
      formatResult: format,
      formatSelection: format,
      escapeMarkup: function(m) { return m; }
    }); 

    //untuk event onclick barang
	  	$("#dtpbBrngId").change(function () {     
	        var kode = $(this).val()
	      $.ajax({
	          url: "<?=base_url()?>c_barang/getbarang/"+kode,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
	              $('#dtpbHarga').val(res_.brngHpp);
	          }
	      })
	  	});
		loadTable();
	});

  function format(item) {
      var originalOption = item.element;
      var originalText = item.text;
      var s = '<span style="font-weight:bold">' + originalText+ '</span><br/>' +
              '<span style="color:#888">' + 'Satuan = '+$(originalOption).data('satuan') +'</span><br/>'+
              '<span style="color:#888">' + 'Hpp = '+$(originalOption).data('hpp') +'</span><br/>';
      return s;
     };

	function loadTable() {
          $('#tampilpembelian').load('<?=base_url()?>c_pembelian/tabeldetailtemp',function(){})
    };

    //function simpan data
	function simpan(){
        var dtpbBrngId=$('#dtpbBrngId').val();
        var dtpbJumlah=$('#dtpbJumlah').val();
        var dtpbHarga=$('#dtpbHarga').val();
        $modal = $('#detailbarangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_pembelian/tambahpembeliandet',
            data: 'dtpbBrngId='+dtpbBrngId+'&dtpbJumlah='+dtpbJumlah+'&dtpbHarga='+dtpbHarga,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                }
            }
          });
      };
      //function untuk hapus temporary
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_pembelian/hapusdetail/"+id,
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

