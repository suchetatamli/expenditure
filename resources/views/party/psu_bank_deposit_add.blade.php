@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'  >
   <div class='panel-heading'>Deposit of Cheque,DD,PO & Online Transfer</div>
   <form class='form-horizontal' method='POST' action="{{url('/admin/party_income/bank-deposit-save-psu')}}" id="PartyTransactionRegisterBankDepositAdd" enctype="multipart/form-data">
      @csrf
      <div class="panel-body" style="padding:20px 0px 0px 0px">
         <div class='form-group'>
            <label class="control-label col-sm-2">State<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select id="parents_state_id" name="state" class="form-control">
                  @foreach($states as $val_state)
                  <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
                  @endforeach
               </select>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Date of Deposit<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
            </div>
         </div>       

         <div class='form-group'>
            <label class="control-label col-sm-2">Name of Donor<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='person_name' required class='form-control person-show-hide' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Address <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='person_address' required class='form-control person-show-hide' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Name of Bank <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='bank_name' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Payment Type <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select id="payment_type" name="payment_type" class="form-control">
                  <option value="chq">Cheque</option>
                  <option value="draft">Draft</option>
                  <option value="payorder">Pay Orders</option>
                  <option value="online_transfer">Online Transfer</option>
               </select>
            </div>
         </div>

         <div class='form-group' id="cheque_dd_po">
            <label class="control-label col-sm-2"><span id="chqLvl">Cheq./Draft/P.O. No.</span><span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='receipt_no' required class='form-control' value=''/>
            </div>
         </div>


         <div class='form-group'>
            <label class="control-label col-sm-2">Amount <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='number' min ="1" name='amount' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">{{Config::get('constants.text_labels.income')}} <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select class="form-control check_bank_state_wise" name="submitted_bank" required>
                  <option value="">Select Bank</option>
                  {{ getBankList() }}
               </select>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Remarks <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='remarks' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Voucher</label>
            <div class="col-sm-3"> 
               <input type='file' name='vouchar_filename' class='form-control' value=''/>
            </div>

            <label class="control-label col-sm-3">Explanation <span class="voucher-text">(if no voucher is uploaded)</span></label>
            <div class="col-sm-3">
               <textarea name="vouchar_remarks" class="form-control"></textarea>
            </div>
         </div>
      </div>
      <div class='panel-footer'>
         <input type='submit' class='btn btn-primary' value='Submit'/>
      </div>
   </div>
</form>
@endsection
