<script>
   
    (function () {
        $("#elcOp").hide();
        $("#purpose").val('others');
        $("#purpose").parents('div.form-group').hide();
        $("#remarks").val('').hide();
        $("#add_lbl").html('Address');
        $("#add_frm_lbl").html('Received From');        

        $('#other_purpose_val').removeAttr('required','required');
        $('#other_purpose').hide();

        $(".bank-show-hide").removeAttr('required');
        $("#issue_type").on( "change", function() {
            $("#purpose").val('');            
            $("#purpose").parents('div.form-group').show();
            $("#remarks").val('').hide();
            $("#add_lbl").html('Address');
            $("#add_frm_lbl").html('Received From');

            var v = $(this).val();
            if( v == "other_person_party"){
                $("#issue_type_display").show();
                $("#purpose").val('election_expense');
                $("#purpose").parents('div.form-group').hide();
                $("#remarks").show();
                $("#add_lbl").html('Address of Party');
                $("#add_frm_lbl").html('Name of Party');

                /* changes for Online Transfer */
                var payType = $("#payment_type").val();
                if(payType == 'online_transfer'){
                    $("#lbl_ins").html('Details of transfer');
                    $("#lbl_ins").next('span').hide();
                    $("#receipt_no").removeAttr('required');
                }else{
                    $("#lbl_ins").html('Instrument No.');
                    $("#lbl_ins").next('span').show();
                    $("#receipt_no").attr('required','required');
                } 
                /* .EOF changes for Online Transfer */

            }else if( v == "other" ){
                $("#remarks").show(); // added
                $("#issue_type_display").show();
                /* changes for Online Transfer */
                var payType = $("#payment_type").val();
                if(payType == 'online_transfer'){
                    $("#lbl_ins").html('Details of transfer');
                    $("#lbl_ins").next('span').hide();
                    $("#receipt_no").removeAttr('required');
                    $("#wrp_bni, #wrp_bbi").hide();
                }else{
                    $("#lbl_ins").html('Instrument No.');
                    $("#lbl_ins").next('span').show();
                    $("#receipt_no").attr('required','required');
                    $("#wrp_bni, #wrp_bbi").show();
                } 
                /* .EOF changes for Online Transfer */

            }else{
                $("#purpose").val('others');
                $("#purpose").parents('div.form-group').hide();
                $("#issue_type_display").hide();
                $(".bank-show-hide").removeAttr('required');
                /* changes for Online Transfer */
                var payType = $("#payment_type").val();
                if(payType == 'online_transfer'){
                    $("#lbl_ins").html('Details of transfer');
                    $("#lbl_ins").next('span').hide();
                    $("#receipt_no").removeAttr('required');
                    $("#wrp_bni, #wrp_bbi").hide();
                }else{
                    $("#lbl_ins").html('Instrument No.');
                    $("#lbl_ins").next('span').show();
                    $("#receipt_no").attr('required','required');
                    $("#wrp_bni, #wrp_bbi").show();
                } 
                /* .EOF changes for Online Transfer */
            }
        });
        /* changes for Online Transfer */
        $("#payment_type").on( "change", function() {
            var pTy = $(this).val();
            var v = $("#issue_type").val();
            if(pTy == 'online_transfer'){
                $("#lbl_ins").html('Details of transfer');
                $("#lbl_ins").next('span').hide();
                $("#receipt_no").removeAttr('required');
                if(v == "other_person_party" || v == "other"){
                    $("#wrp_bni, #wrp_bbi").hide();
                }else{
                    $("#wrp_bni, #wrp_bbi").show();
                }
                
            }else{
                $("#lbl_ins").html('Instrument No.');
                $("#lbl_ins").next('span').show();
                $("#receipt_no").attr('required','required');

                $("#wrp_bni, #wrp_bbi").show();
            }
        });
        /* .EOF changes for Online Transfer */
        $("#purpose").on( "change", function() {
            var purposeVal = $(this).val();
            if(purposeVal == 'others'){
                $('#other_purpose_val').attr('required','required');
                $('#other_purpose').attr('required','required').show();
            }else{
                $('#other_purpose_val').removeAttr('required','required');
                $('#other_purpose').hide();
            }
        });
        $("#checkDraftToBank").validate();
    })();
</script>