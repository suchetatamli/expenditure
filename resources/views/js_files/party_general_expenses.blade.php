<script>
    
        (function () {

            $('.sch_div').hide();
            $('#name_operator').hide();
            $('#che_dd_no').hide();
            
            $("#select_expense_type").on( "change", function() {

                var optionText = $("#select_expense_type option:selected").text();
                
                $('#expense_type_text').val(optionText);
                var expense_type = $(this).val();
                if(expense_type == 1){
                  $('#campaign_name').html('Name of Star Campaigner<span class="text-danger" title="This field is required">*</span>');
                  $('#date_field').html('Date of meeting<span class="text-danger" title="This field is required">*</span>');
                } 
                if(expense_type == 2){
                    $('#campaign_name').html('Name of the Leader<span class="text-danger" title="This field is required">*</span>');
                    $('#date_field').html('Date of meeting<span class="text-danger" title="This field is required">*</span>');
                    expense_type = 1;
                }

                if(expense_type == 3){
                  $('#date_field').html('Date (of Print/Telecast/SMS)<span class="text-danger" title="This field is required">*</span>');
                }

                if(expense_type == 4){
                  $('#date_field').html('Date<span class="text-danger" title="This field is required">*</span>');
                }

                if(expense_type == 5){
                  $('#date_field').html('Date<span class="text-danger" title="This field is required">*</span>');
                }

                if(expense_type == 6){
                  $('#date_field').html('Date<span class="text-danger" title="This field is required">*</span>');
                } 



                $('.sch_div').hide();
                $('.sch_div[frmid="'+expense_type+'"]').show();
            });


            $("#travel_mode").on( "change", function() {
                var travel_mode = $(this).val(); 
                    if(travel_mode == 'helicopter' || travel_mode == 'aircraft'){
                        $('#name_operator').show();
                    }
                    else {
                        $('#name_operator').hide();
                    }
            });

            $("#payment_type").on( "change", function() {
                var payment_type = $(this).val(); 
                    if(payment_type != 'cash'){
                        if(payment_type == 'online_payment')
                            $('#chqLbl').html('Details of Payment');
                        else
                            $('#chqLbl').html('Cheque/Draft No');
                        $('#che_dd_no').show();
                    }
                    else {
                        $('#che_dd_no').hide();
                    }
            });

            

            $("#PartyExpenseGeneralAddForm").validate();

        })();


        $(document).on('submit','form',function(){ 
        if($('#payment_type').val() == 'cash' && $('input[name=amount_paid]').val() > 10000){            
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
            return false;
        }
        
    });
    
    
 </script>