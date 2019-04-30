<?php  $payment_modes = array(
 '0' => array ('id' => 'Cash','name' =>'Cash'),
 '1' => array ('id' => 'Cheque','name' =>'Cheque'),
 '2' => array ('id' => 'DD','name' =>'DD'),
 '3' => array ('id' => 'PO','name' =>'PO'),
 '4' => array ('id' => 'RTGS','name' =>'RTGS'),
 '5' => array ('id' => 'Fund Transfer','name' =>'Fund Transfer'),
);  
// echo "<pre>"; print_r($travel_modes); die;
?>

<div class='form-group'>
   <label class="control-label col-sm-2">State<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <select id="parents_state_id" name="candidate_state_id" class="form-control">
         @foreach($states as $val_state)
         <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
         @endforeach
      </select>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Date<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Name of Star Campaigner (s)<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='name_of_star_campaigner' required class='form-control' value=''/>
      <p class="help-block">Use comma (,) to insert multiple names</p>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Name of Candidate (s)<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <textarea name='candidates_name' required class='form-control' value=''></textarea>
      <p class="help-block">Use comma (,) to insert multiple names</p>
   </div>
</div>
<div class='form-group'>
   <label class="control-label col-sm-2">Detail of Items<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <textarea name='details_of_items' required class='form-control' value=''></textarea>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Mode of Payment<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <select id="payment_mode" name="payment_mode" class="form-control">
         @foreach($payment_modes as $payment_mode)
         <option value = "{{$payment_mode['id']}}" > {{ $payment_mode['name']}} </option>
         @endforeach
      </select>
   </div>
</div> 

<div id="cheque_dd_po">
   <div class='form-group'>
      <label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <select class="form-control check_bank_state_wise" name="chq_expenses_bank" required>
            <option value="">Select Bank</option>
            {{ getBankList() }}
         </select>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Cheque/DD/PO No.<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='cheque_no' required class='form-control person-show-hide' value=''/>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Cheque/DD/PO Date<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='cheque_date' required class='form-control input_date date_range_class' value=''/>
      </div>
   </div>
</div>

<div id="rtgs_fund">
   <div class='form-group'>
      <label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <select class="form-control check_bank_state_wise" name="expenses_bank" required>
            <option value="">Select Bank</option>
            {{ getBankList() }}
         </select>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Reference No.<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='receipt_no' required class='form-control person-show-hide' value=''/>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Date of Transfer<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='receipt_date' required class='form-control input_date date_range_class' value=''/>
      </div>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='number' min ="1" name='amount_paid' required class='form-control person-show-hide' value=''/>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Amount Outstanding<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='number' min ="0" name='amount_outstanding' required class='form-control person-show-hide' value=''/>
   </div>
</div>