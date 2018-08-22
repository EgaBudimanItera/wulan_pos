<script type="text/javascript">
	$(document).ready(function(){
		loadTable();

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

	//function simpan data
	function simpan(){
        var drpbBrngId=$('#dtpbBrngId').val();
        var drpbJumlah=$('#drpbJumlah').val();
        var drpbPmblId=$('#dtpbPmblId').val();
        $modal = $('#returbeliModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_returpembelian/tambahdetreturpembelian',
            data: 'drpbBrngId='+drpbBrngId+'&drpbJumlah='+drpbJumlah+'&drpbPmblId='+drpbPmblId,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    location.reload();
                    $('#returbeliModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   location.reload();
                   alert('gagal tambah data');
                    $('#returbeliModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#dtpbBrngId').val(null).trigger('change');
                }
            }
          });
      };
</script>