<script>
   (function () {
      $("#RecordLumpSumAddForm").validate();            
   })();  
   $("#payment_mode").on('change',function(){
      var payment_mode = $(this).val();
      var pay_option_html = '';
      var pay_option_other_html = '';
      var expense_bank_html = '';
      if (payment_mode == 'Cheque' || payment_mode == 'DD' || payment_mode == 'PO') {   
         expense_bank_html += '<label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>';
         expense_bank_html += '<div class="col-sm-9">';
         expense_bank_html += '<select class="form-control check_bank_state_wise" name="expenses_bank" required><option value="">Select Bank</option>{{ getBankList() }}</select>';
         expense_bank_html += '</div>'; 

         pay_option_html += '<label class="control-label col-sm-2">Cheque /DD/ PO No.<span class="text-danger" title="This field is required">*</span></label>';
         pay_option_html += '<div class="col-sm-9">';
         pay_option_html += '<input type="text" name="receipt_no" required class="form-control person-show-hide" value=""/>';
         pay_option_html += '</div>'; 
      } else if (payment_mode == 'RTGS' || payment_mode == 'Online Transfer' || payment_mode == 'Any Other') {
         expense_bank_html += '<label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>';
         expense_bank_html += '<div class="col-sm-9">';
         expense_bank_html += '<select class="form-control check_bank_state_wise" name="expenses_bank" required><option value="">Select Bank</option>{{ getBankList() }}</select>';
         expense_bank_html += '</div>'; 

         pay_option_html += '<label class="control-label col-sm-2">Reference No.<span class="text-danger" title="This field is required">*</span></label>';
         pay_option_html += '<div class="col-sm-9">';
         pay_option_html += '<input type="text" name="receipt_no" required class="form-control person-show-hide" value=""/>';
         pay_option_html += '</div>';
         if (payment_mode == 'Any Other') {
            pay_option_other_html += '<label class="control-label col-sm-2">Other<span class="text-danger" title="This field is required">*</span></label>';
            pay_option_other_html += '<div class="col-sm-9">';
            pay_option_other_html += '<input type="text" name="payment_other" required class="form-control person-show-hide" value=""/>';
            pay_option_other_html += '</div>';	          		
         }
      }
      pay_option_other_html != '' ? $("#pay_option_other_html").html(pay_option_other_html).show() : $("#pay_option_other_html").html(pay_option_other_html).hide();

      pay_option_html != '' ? $("#pay_option_html").html(pay_option_html).show() : $("#pay_option_html").html(pay_option_html).hide();

      expense_bank_html != '' ? $("#expense_bank_html").html(expense_bank_html).show() : $("#expense_bank_html").html(expense_bank_html).hide();


      state_ajax();
   }); 


   $(document).on('submit','form',function(){ 
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
         swal.close();
      });
      return false;
   }  
});  
</script>