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

     //function simpan data
	function simpan(){
        var dtpbBrngId=$('#dtpbBrngId').val();
        var dtpbHarga=$('#dtpbHarga').val();
        var dtpbJumlah=$('#dtpbJumlah').val();
        $modal = $('#detailbayarutangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_bayarutang/tambahdetbayarutang',
            data: 'dtpbBrngId='+dtpbBrngId+'&dtpbHarga='+dtpbHarga+'&dtpbJumlah='+dtpbJumlah,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbayarutangModal').modal('hide');
                    $('#formBayarUtang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbayarutangModal').modal('hide');
                    $('#formBayarUtang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                }
            }
          });
      };
      //function untuk hapus temporary
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_bayarutang/hapusdetail/"+id,
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