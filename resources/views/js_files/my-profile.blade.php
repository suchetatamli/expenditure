<script type="text/javascript">
	$("#form").validate({
		errorPlacement: function(error, element) {
	      var placement = $(element).data('error');
	      if (placement) {
	        $(placement).append(error)
	      } else {
	        var flag = $(element).hasClass('select2-hidden-accessible');
	        //alert($(element).attr('name'));
	        //alert($(element).parents('.col-sm-6').find('.text-danger').attr('class'));
		      if (flag) {
		      	error.insertAfter($(element).parents('.col-sm-6').find('.text-danger'));
		        //$(placement).append(error)
		      } else {
		      	error.insertAfter(element);
		      }

	      }
	    }
	});
</script>