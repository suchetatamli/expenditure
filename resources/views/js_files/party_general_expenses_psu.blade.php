<script>

    (function () {

        $('.sch_div').hide();
        $('#name_operator').hide();
        $('#che_dd_no').hide();
        $('#other_travel_mode').hide();

        $("#select_expense_type").on( "change", function() {

            var optionText = $("#select_expense_type option:selected").text();

            $('#expense_type_text').val(optionText);
            var expense_type = $(this).val();
            if(expense_type == 7){
              $('#campaign_name').html('Name of Star Campaigner (s)<span class="text-danger" title="This field is required">*</span>');
          } 
          if(expense_type == 8){
            $('#campaign_name').html('Name of the Leader (s)<span class="text-danger" title="This field is required">*</span>');
            expense_type = 7;
        }

                // if(expense_type == 9){}

                // if(expense_type == 10){}

                // if(expense_type == 11){}

                // if(expense_type == 12){} 

                $('.sch_div').hide();
                $('.sch_div[frmid="'+expense_type+'"]').show();
            });


        $("#travel_mode").on( "change", function() {
            var travel_mode = $(this).val(); 
            if(travel_mode == 'helicopter' || travel_mode == 'aircraft'){
                $('#name_operator').show();
                $('#other_travel_mode').hide();
            }
            else if(travel_mode == 'other'){
              $('#name_operator').hide();
              $('#other_travel_mode').show();
          }
          else {
            $('#name_operator').hide();
            $('#other_travel_mode').hide();
        }
    });

        $("#payment_type").on( "change", function() {
            var payment_type = $(this).val(); 
            if(payment_type == 'chq' || payment_type == 'draft' || payment_type == 'online_transfer'){
                $('#che_dd_no').show();
                if(payment_type == 'online_transfer')
                {
                    $('#chqLvl').html('Reference No.');
                }else{
                    $('#chqLvl').html('Cheque/Draft No');
                }
            }
            else {
                $('#che_dd_no').hide();
            }

        });

        $("#name_media").on( "change", function() {
            var name_media = $(this).val(); 
            if(name_media == 'Others'){
                $('#other_media').show();
            }
            else {
                $('#other_media').hide();
            }
        });


        $("#PartyExpenseGeneralAddForm").validate();

    })();


    $(document).on('submit','form',function(){ 
        if($('#payment_type').val() == 'cash' && $('input[name=amount_paid]').val() > 10000){            
            swal({
                title: "Information",
                text: "All expenses above Rs. 10,000/- are to be incurred through your bank account",
                            //text: "All Receipts/ Donations/ Loans in excess of Rs. 10,000/- should be received by A/c Payee Cheque or DD or by Account transfer only",
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
            return false;
        }
        
    });
    
</script>