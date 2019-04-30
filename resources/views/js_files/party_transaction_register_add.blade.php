<script>
    
        (function () {
            $("#PartyTransactionRegisterBankDepositAdd").validate();

        })();

        (function () {
            $("#PartyTransactionRegisterCashAdd").validate();

        })();

        (function () {
            $("#PartyTransactionRegisterAdd").validate();

        })();


        $(document).on('submit','form#PartyTransactionRegisterCashAdd',function(){ 
            if($('input[name=amount]').val() > 10000){            
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

        $('#PartyTransactionRegisterBankDepositAdd').on('change','#payment_type',function(){
            if($(this).val() == 'online_transfer'){
                $('#chqLvl').html('Details of transfer');
            }else{
                $('#chqLvl').html('Cheq./Draft/P.O. No.');
            }
        });
    
    
 </script>