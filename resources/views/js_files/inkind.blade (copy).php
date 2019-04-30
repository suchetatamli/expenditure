<script type="text/javascript">
	$('#person, #kept_amount').parents('.form-group').hide();
	$('#person, #kept_amount').removeAttr('required');
	$(document).on('change','#kept_type',function(e){ 
		var selval = $(this).val();
		if(selval == 'N'){
			$('#person, #kept_amount').parents('.form-group').hide();
			$('#person, #kept_amount').removeAttr('required');
		}else{
			$('#person, #kept_amount').attr('required','');
			$('#person, #kept_amount').parents('.form-group').show();
		}
	})
</script>