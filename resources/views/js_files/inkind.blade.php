<script type="text/javascript">
	$(document).on('change','#provider_type',function(e){
		var selval = $(this).val();
		if(selval == 'party'){
			$('#provider_name, #provider_address').parents('.form-group').hide();
			$('#provider_name, #provider_address').removeAttr('required');
		}else{
			$('#provider_name, #provider_address').attr('required','');
			$('#provider_name, #provider_address').parents('.form-group').show();
		}
	});
	$(document).ready(function(){
		$("#inkindForm").validate();
	});	
</script>