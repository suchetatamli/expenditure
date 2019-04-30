@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'  >
   <div class='panel-heading'>Cash From Other Party Or Person</div>

   <form class='form-horizontal' method='POST' action="{{url('/admin/party_income/bank-deposit-save')}}" id="PartyTransactionRegisterBankDepositAdd">
      @csrf
      <div class="panel-body" style="padding:20px 0px 0px 0px">
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

         <div class='form-group'>
            <label class="control-label col-sm-2"><span id="chqLvl">Cheq./Draft/P.O. No.</span><span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='receipt_no' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Amount <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='number' min="1" name='amount' required class='form-control' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">{{Config::get('constants.text_labels.income')}} <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select class="form-control" name="submitted_bank" required>
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
      </div>

      <div class='panel-footer'>
         <input type='submit' class='btn btn-primary' value='Submit'/>
      </div>
   </form>
</div>

@endsection
