<!-- Footer -->
<footer style="height:0px;background-color:white">
<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-xs-6"> &copy; 2018</div>

</div>
</div>
</div>
</footer>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>

<!-- Mirrored from www.slashdown.nl/starhotel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Nov 2014 17:42:24 GMT -->
</html>

<script>
	$( document).ready(function() {
		$( ".tgllahir" ).datepicker();
    $("#info-alert").fadeTo(5000,50).slideUp(50,function(){
          $("#info-alert").slideUp(50);
    });
		var date_input=$('input[name="tgllahir"]'); //our date input has the name "date"
      	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      	var options={
        	format: 'yyyy-mm-dd',
        	container: container,
        	todayHighlight: true,
        	autoclose: true,
      	};
      	date_input.datepicker(options);

      	var date_input1=$('input[name="berdiri"]'); //our date input has the name "date"
      	var container1=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      	var options1={
        	format: 'yyyy-mm-dd',
        	container: container1,
        	todayHighlight: true,
        	autoclose: true,
      	};
      	date_input1.datepicker(options1);

      	var date_input2=$('input[name="tgllahir2"]'); //our date input has the name "date"
      	var container2=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      	var options2={
        	format: 'yyyy-mm-dd',
        	container: container2,
        	todayHighlight: true,
        	autoclose: true,
      	};
      	date_input2.datepicker(options2);
      	
	} );
	$(function() {
        $("#tgllahir2").datepicker({ dateFormat: "yy-mm-dd" }).val()
    });
</script>
