<?php  $travel_modes = array(
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
   <label class="control-label col-sm-2">Date of Payment<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Select State<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <select id="" name="candidate_state_id" class="form-control">
         @foreach($states as $val_state)
         <option value = "{{$val_state->id}}" > {{ $val_state->state_name}} </option>
         @endforeach
      </select>
   </div>
</div> 

<div class='form-group'>
   <label class="control-label col-sm-2">No. & Name of Const. <span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='no_name_constituency' required class='form-control person-show-hide' value=''/>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Name of Candidate<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='name' required class='form-control person-show-hide' value=''/>
   </div>
</div>
<div class='form-group'>
   <label class="control-label col-sm-2">Name of Party<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='text' name='party_name' required class='form-control person-show-hide' value=''/>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Mode of Payment<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <select id="payment_mode" name="payment_mode" class="form-control">
         @foreach($travel_modes as $travel_mode)
         <option value = "{{$travel_mode['id']}}" > {{ $travel_mode['name']}} </option>
         @endforeach
      </select>
   </div>
</div> 

<div id="cheque_dd_po">
   <div class='form-group'>
      <label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <select class="form-control" name="chq_expenses_bank" required>
            <option value="">Select Bank</option>
            {{ getBankList() }}
         </select>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Cheque/DD/PO No.<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='ref_no1' required class='form-control person-show-hide' value=''/>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Cheque/DD/PO Date<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='ref_no1_date' required class='form-control input_date date_range_class' value=''/>
      </div>
   </div>
</div>

<div id="rtgs_fund">
   <div class='form-group'>
      <label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <select class="form-control" name="expenses_bank" required>
            <option value="">Select Bank</option>
            {{ getBankList() }}
         </select>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Reference No.<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='ref_no2' required class='form-control person-show-hide' value=''/>
      </div>
   </div>
   <div class='form-group'>
      <label class="control-label col-sm-2">Date of Transfer<span class="text-danger" title="This field is required">*</span></label>
      <div class="col-sm-9">
         <input type='text' name='ref_no2_date' required class='form-control input_date date_range_class' value=''/>
      </div>
   </div>
</div>

<div class='form-group'>
   <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
   <div class="col-sm-9">
      <input type='number' min ="1" name='amount' required class='form-control person-show-hide' value=''/>
   </div>
</div>