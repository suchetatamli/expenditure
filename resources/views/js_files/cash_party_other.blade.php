<script>
    
        (function () {
            
            $("#cash_purpose").on( "change", function() {
                var v = $(this).val();
                if(v=="others"){
                    $("#purpose_other").show();
                }else{
                    $("#purpose_other").hide();
                }
            });

            $("#received_type").on( "change", function() {
                var v = $(this).val();
             
                if(v == "other"){
                    $("#all_party_list").hide();
                    $("#cash_from_others").show();
                    $(".party-show-hide").removeAttr('required');
                    $("#cash_purpose").html('<option value="" selected >Select</option><option value="loan">Loan</option> <option value="gift">Gift</option> <option value="donation">Donation</option> <option value="others">Others</option>');
                }else{
                    $("#cash_from_others").hide();
                    $("#all_party_list").show();
                    if( v == "") {
                        $("#all_party_list").hide();
                    }
                    $(".person-show-hide").removeAttr('required');
                    $("#cash_purpose").html('<option value="" selected >Select</option><option value="election_expense">Election Expense</option>');
                }
            });

            $("#partyPersonCashDepositForm").validate();

        })();
    
    $(document).on('click','.btn-primary',function(){      
        if($('#amount').val() > 10000){            
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