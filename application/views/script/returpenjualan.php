<script type="text/javascript">
	$(document).ready(function(){
		//loadTable();

		//untuk event onclick barang
	  	$(".edit_retur").click(function () {     
	        var kode = $(this).attr('id');
            var nofakturjual = document.getElementById("pnjlNoFaktur").value;

	      $.ajax({
	          url: "<?=base_url()?>c_returpenjualan/get_detpenjualan/"+kode+"/"+nofakturjual,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
                  
	              $('#brngNama').val(res_.brngNama);
	              $('#dtpjBrngId').val(res_.dtpjBrngId);
	              $('#dtpjPnjlId').val(res_.dtpjPnjlId);
                  $('#returlalu').val(res_.jumlahretur);
	              $('#dtpjJumlahJual').val(res_.dtpjJumlah);
                  $('#hargajual').val(res_.dtpjHarga);

	          }
	      })
	  	});
	});

	//function simpan data
	function simpan(){
        var drpjBrngId=$('#dtpjBrngId').val();
        var drpjJumlah=$('#drpjJumlah').val();
        var drpjPnjlId=$('#dtpjPnjlId').val();
        $modal = $('#returjualModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_returpenjualan/tambahdetreturpenjualan',
            data: 'drpjBrngId='+drpjBrngId+'&drpjJumlah='+drpjJumlah+'&drpjPnjlId='+drpjPnjlId,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    location.reload();
                    $('#returjualModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#drpjBrngId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   location.reload();
                   alert('gagal tambah data');
                    $('#returjualModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#drpjBrngId').val(null).trigger('change');
                }
            }
          });
      };
</script>