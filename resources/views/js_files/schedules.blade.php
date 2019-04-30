<script type="text/javascript">
    // $("body").on("change", "#paid_incurred_by", function () {

    //     var incurred_by = $(this).val();
    //     switch( incurred_by ) {

    //         case "self":
    //             block_populate('1','2')
    //         break;

    //         case "pol_party":
    //         block_populate('0','2')
    //         break;

    //         case "others":
    //         block_populate('0','1')
    //         break;

    //         default:
    //         $("#populate_self").show();
    //         $("#populate_pol_party").show();
    //         $("#populate_others").show();

    //       } 

    // });
  
    function block_populate(v1,v2){
        $('#incurred_block').children().show();
        var blocks = [
            "self",
            "pol_party",
            "others"
           ]; 
        
        $("#populate_"+blocks[v1]).hide();
        $("#populate_"+blocks[v2]).hide();

        $("#populate_"+blocks[v1]).find('input:text').first().val(''); 
        $("#populate_"+blocks[v2]).find('input:text').first().val('');  
    }

    $("#payment_type").on("change", function () {
        var v = $(this).val();

        if(v == "cash"){
            $("#cash_section").show();
            $("#cheque_section").hide();
            $(".cheque-show-hide").removeAttr('required');
        }else{
            // If payment_type is not cash then need to display all the 
            // payment fld under incurred_block

            $('#incurred_block').children().show();
            $("#cash_section").hide();
            $("#cheque_section").show();
            $(".cash-show-hide").removeAttr('required');

            if( v == "") {
                $("#cash_section").hide();
                $("#cheque_section").hide();
            }
        }
    
    });

    $("body").on("blur", "#candidate_or_agent", function () { 
        calculate_total()
    });
    $("body").on("blur", "#other", function () {
        calculate_total()
    });
    $("body").on("blur", "#pol_party", function () {
        calculate_total()
    });

    function calculate_total(){
        var own = parseInt($("#candidate_or_agent").val()) || 0;
        var pol_party = parseInt($("#pol_party").val()) || 0;
        var others = parseInt($("#other").val()) || 0;

        $('#total_amount').val('0.0');
        $('#total_amount').val(parseInt(own)+parseInt(pol_party)+parseInt(others));
 
    }

    $(".add-new-row").on("click", function () {
        var newRow = $(".hidden-new-row").html();
        $("#added-new-row").append(newRow);

    });
      
    $("body").on("click", ".btn-remove", function () {
        $(this).parent("div").remove();
      
    });

    $.validator.setDefaults({
		ignore: []
	});
    $("#scheduleForm1").validate();
    $("#scheduleForm2").validate();
    $("#scheduleForm3").validate();
    $("#scheduleForm4").validate();
    $("#scheduleForm4A").validate();
    $("#scheduleForm5").validate();
    $("#scheduleForm6").validate();
    $("#scheduleForm7").validate();

    $(document).on('change','#payment_type',function(){
        var val = $(this).val();
        //alert(val);
        $('#total_amount').removeAttr('max');
        $('#payeename').html('Name & Address of Payee');
        $('#payee_name').prop('required',true);
        if(val == 'cash'){
            $('#payeename').html('Name & Address of Payee');
            $('#total_amount').removeAttr('max').attr('max','10000');
            // swal({
            //                 title: "Information",
            //                 text: "Cash Transction only allowed when transaction amount is under 10,000/-. All expenses above Rs. 10,000/- are to be incurred through your bank account",
            //                 type: "warning",
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#008D4C",
            //                 confirmButtonText: "Ok",
            //                 closeOnConfirm: false,
            //                 showLoaderOnConfirm: true
            //             },
            //             function () {
            //                 //alert(path);
            //                 //location.href= path;
            //                 swal.close();
            //             });
        }
        
    });

    $(document).on('click','.btn-primary',function(){
        var val = $('#payment_type').val();        
        if(val == 'cash' && $('#total_amount').val() > 10000){            
            swal({
                            title: "Information",
                            text: "All expenses above Rs. 10,000/- are to be incurred through your bank account",
                            showCancelButton: false,
                            confirmButtonColor: "#008D4C",
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                            imageUrl: site_url + '/popup_logo.png',
                        },
                        function () {
                            //alert(path);
                            //location.href= path;
                            swal.close();
                        });
        }
        
    });

    // $(document).on('change','#paid_incurred_by',function(){
    //         var val = $(this).val();
    //         if($('#populate_self').is(":visible")){
    //             $('#populate_self').find('input, select').prop('required',true);
    //         }else{
    //             $('#populate_self').find('input, select').removeAttr('required');​​​​​
    //         }
    //         if($('#populate_pol_party').is(":visible")){
    //             $('#populate_pol_party').find('input, select').prop('required',true);
    //         }else{
    //             $('#populate_pol_party').find('input, select').removeAttr('required');​​​​​
    //         }
    //         if($('#populate_others').is(":visible")){
    //             $('#populate_others').find('input, select').prop('required',true);
    //         }else{
    //             $('#populate_others').find('input, select').removeAttr('required');​​​​​
    //         }
            
    //     });

    $(document).on('blur','#pol_party',function(){
            if($(this).val() > 0){
                $('#party_name').attr('required','required');
            }else{
                $('#party_name').removeAttr('required');
            }
    });

    $(document).on('blur','#other',function(){
            if($(this).val() > 0){
                $('#other_per_name').attr('required','required');
            }else{
                $('#other_per_name').removeAttr('required');
            }
    });

</script>