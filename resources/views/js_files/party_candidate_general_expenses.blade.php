<script>
        <?php 
$getMyDetails = getMyDetails(0);
$rsDate = $getMyDetails->date_result;
$calenddate = ($rsDate > date('Y-m-d'))?date('Y-m-d'):$rsDate;
?>
        function initDatePicker() {
            $('.date_range_class').attr('min','<?php echo $getMyDetails->nomination_date;?>');
            $('.date_range_class').removeAttr('max').attr('max','<?php echo date("Y-m-d");?>');
            /* removing filter on clients request 25-02-2019 */
            $('.date_range_class').removeAttr('max').removeAttr('min');

            $('.date_range_class').attr('readonly','readonly');
            $('.date_range_class').attr('type','date');

            $('.date_range_class').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });

            $('.open-datetimepicker').click(function () {
                $(this).next('.input_date').datepicker('show');
            });
        }

        (function () {

           // $('.sch_div').hide();
            
            $("#select_expense_type").on( "change", function() {
                var expense_type = $(this).val();  //alert("-"+expense_type+"-");
                $.ajax({
                    url: "{{url('')}}/admin/party_candidate_expense/ajax-form/"+expense_type, 
                    success: function(result){
                    $(".sch_div").html(result);
                    $("#cheque_dd_po").hide();
                    $("#rtgs_fund").hide();
                    initDatePicker();                    
                }});

                if($.trim(expense_type) != ''){
                    $('.afct_div').show();
                }else{
                    $(".sch_div").html('');
                    $('.afct_div').hide();
                }
            });
            
            $("#PartyExpenseGeneralAddForm").validate();

        })();

        $(document).on("change", "#payment_mode", function () {
            var payment_mode = $(this).val(); 
      
                if(payment_mode == 'Cheque' || payment_mode == 'DD' || payment_mode == 'PO'){
                  $('#cheque_dd_po').show();
                  $('#rtgs_fund').hide();
                }
                else if(payment_mode == 'Cash') {
                    $('#cheque_dd_po').hide();
                    $('#rtgs_fund').hide();
                }
                else {
                    $('#cheque_dd_po').hide();
                    $('#rtgs_fund').show();
                }

        });

        $(document).on("change", "#name_of_media", function () {
            var name_of_media = $(this).val(); 
      
                if(name_of_media == 'Others'){
                  $('#other_details_div').show();
                } else {
                   $('#other_details_div').hide(); 
                }

        }); 


        $(document).on('submit','form#PartyExpenseGeneralAddForm',function(){ 
                if($('input[name=amount]').val() > 10000 && $('#payment_mode').val() == 'Cash'){            
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