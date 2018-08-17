<script type="text/javascript">
	$(document).ready(function(){
		loadTable();
	});

	$("#dtpbBrngId").change(function () {     
	        var kode = $(this).val()
	      $.ajax({
	          url: "<?=base_url()?>c_bayarpiutang/get_penjualan/"+kode,
	          type: 'GET',
	          success: function(res) {
	              var res_ = JSON.parse(res);
	              $('#dtpbHarga').val(res_.pnjlSisaBayar);
	          }
	      })
	  	});

		loadTable();

	function loadTable() {
          $('#tampilbayarpiutang').load('<?=base_url()?>c_bayarpiutang/tabeldetailtemp',function(){})
    };

     //function simpan data
	function simpan(){
        var dtpbBrngId=$('#dtpbBrngId').val();
        var dtpbHarga=$('#dtpbHarga').val();
        var dtpbJumlah=$('#dtpbJumlah').val();
        $modal = $('#detailbayarpiutangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_bayarpiutang/tambahdetbayarpiutang',
            data: 'dtpbBrngId='+dtpbBrngId+'&dtpbHarga='+dtpbHarga+'&dtpbJumlah='+dtpbJumlah,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbayarpiutangModal').modal('hide');
                    $('#formBayarUtang')[0].reset();
                    $('#dbypPnjlId').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbayarpiutangModal').modal('hide');
                    $('#formBayarUtang')[0].reset();
                    $('#dbypPnjlId').val(null).trigger('change');
                }
            }
          });
      };
      //function untuk hapus temporary
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_bayarpiutang/hapusdetail/"+id,
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