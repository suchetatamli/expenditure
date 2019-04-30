@extends("crudbooster::admin_template")
@section("content")

<?php  $travel_modes = array(
   '0' => array ('id' => 'taxi','name' =>'Taxi'),
   '1' => array ('id' => 'helicopter','name' =>'Helicopter'),
   '2' => array ('id' => 'aircraft','name' =>'Aircraft'),
   '3' => array ('id' => 'car','name' =>'Car'),
);  
// echo "<pre>"; print_r($travel_modes); die;
?>

<div class='panel panel-default'  >
   <div class='panel-heading'>
      <span class="frm_ttl_sp">Expenses for General Party Propaganda</span>
      <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
         <a href="javascript:void(0);" onclick="goToGuideLines(6);" class="guide-ins-label">Guidelines & Instructions</a>
      </span>
   </div>

   <form class='form-horizontal' method='POST' action="{{url('/admin/party_expense/general-expenses-add')}}" id="PartyExpenseGeneralAddForm" enctype="multipart/form-data">
      @csrf

      <input type="hidden" id="expense_type_text" value="" name="expense_type_text">
      <div class="panel-body" style="padding:20px 0px 0px 0px">

         <div class='form-group'>
            <label class="control-label col-sm-2">Select Expense Type<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select id="select_expense_type" name="expense_type" class="form-control ddslick">
                  <option value="">Select Expense Type</option>
                  @foreach($expense_types as $val)
                  <option value = "{{$val->id}}" refid="{{$val->id}}"> {{ $val->expense_type}} </option>
                  @endforeach
               </select>
            </div>
         </div> 

         <div class='form-group'>
            <label class="control-label col-sm-2" id="date_field">Date<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">State<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select id="" name="state" class="form-control">
                  @foreach($states as $val_state)
                  <option value = "{{$val_state->id}}" > {{ $val_state->state_name}} </option>
                  @endforeach
               </select>
            </div>
         </div>

         <div id="first_sch_div" class= "sch_div" frmid="1">
            <div class='form-group'>
               <label class="control-label col-sm-2">Venue<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='venue' required class='form-control person-show-hide' value=''/>
               </div>
            </div>

            <div class='form-group'>
               <label class="control-label col-sm-2" id="campaign_name">Name of Star Campaigner<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='name_campaigner' required class='form-control person-show-hide' value=''/>
                  <p class="help-block">Use comma (,) to insert multiple names</p>
               </div>
            </div>

            <div class='form-group'>
               <label class="control-label col-sm-2">Select mode of Travel<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <select id="travel_mode" name="travel_mode" class="form-control">
                     @foreach($travel_modes as $travel_mode)
                     <option value = "{{$travel_mode['id']}}" > {{ $travel_mode['name']}} </option>
                     @endforeach
                  </select>
               </div>
            </div> 

            <div class='form-group' id="name_operator">
               <label class="control-label col-sm-2">Name of Operator<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='name_operator' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 
         </div>

         <div id="second_sch_div" class= "sch_div" frmid="2">
         </div>

         <div id="third_sch_div" class= "sch_div" frmid="3">
            <div class='form-group'>
               <label class="control-label col-sm-2">Name of Payee<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='name_payee' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 

            <div class='form-group'>
               <label class="control-label col-sm-2">Name of Media <small>(Print/Electronic/SMS/Cable)</small><span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='name_media' required class='form-control person-show-hide' value=''/>
               </div>
            </div>   
         </div>

         <div id="fourth_sch_div" class= "sch_div" frmid="4">
            <div class='form-group'>
               <label class="control-label col-sm-2">No. & Name of Constituency<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='constituency_name' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 

            <div class='form-group'>
               <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='item_details4' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 
         </div>

         <div id="fifth_sch_div" class= "sch_div" frmid="5">
            <div class='form-group'>
               <label class="control-label col-sm-2">Venue<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='venue_sc5' required class='form-control person-show-hide' value=''/>
               </div>
            </div>

            <div class='form-group'>
               <label class="control-label col-sm-2">Date of Meeting/Procession/Rally<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='date_meeting' required class='form-control input_date date_range_class' value=''/>
               </div>
            </div>    

            <div class='form-group'>
               <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='item_details5' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 
         </div>

         <div id="sixth_sch_div" class= "sch_div" frmid="6">
            <div class='form-group'>
               <label class="control-label col-sm-2">Purpose<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='purpose' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 

            <div class='form-group'>
               <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='item_details6' required class='form-control person-show-hide' value=''/>
               </div>
            </div> 
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Amount Paid<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='number' min="1" name='amount_paid' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Amount Outstanding<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='number' min="0" name='amount_outstanding' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Payment Type <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select id="payment_type" name="payment_type" class="form-control">
                  <option value="cash">Cash</option>
                  <option value="chq">Cheque</option>
                  <option value="draft">Draft</option>
                  <option value="online_payment">Online Payment</option>
               </select>
            </div>
         </div>

         <div id="che_dd_no">
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
               <label class="control-label col-sm-2"><span id="chqLbl">Cheque/Draft No</span><span class="text-danger" title="This field is required">*</span></label>
               <div class="col-sm-9">
                  <input type='text' name='receipt_no' required class='form-control' value=''/>
               </div>
            </div>
         </div>
         <!------------------------------------->
         <div class='form-group'>
            <label class="control-label col-sm-2">Upload Voucher</label>
            <div class="col-sm-3">
               <input type='file' name='vouchar_filename' id='vouchar_filename' class='form-control'/>   
            </div>

            <label class="control-label col-sm-3">Explanation <span class="voucher-text">(if no voucher is uploaded)</span></label>
            <div class="col-sm-3">
               <textarea id ="vouchar_remarks" name="vouchar_remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>

      <div class='panel-footer'>
         <input type='submit' class='btn btn-primary' value='Submit'/>

      </div>
   </form>
</div>
@php
echo $guideLines = getGuideLines(16);
@endphp
@endsection
