<script type="text/javascript">
	$(document).ready(function(){
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

