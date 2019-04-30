@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
   <div class='panel-heading'>
      <span class="frm_ttl_sp">Record Lump Sum Amount given by State Unit of Party to other Parties</span>
      <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
         <a href="javascript:void(0);" onclick="goToGuideLines(20);" class="guide-ins-label">Guidelines & Instructions</a>
      </span>
   </div>

   <form class='form-horizontal' method='POST' action="{{url('/admin/party_expense/lump-sum-amount-add-save')}}" id="RecordLumpSumAddForm">
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
            <label class="control-label col-sm-2">Date<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
            </div>
         </div>

         <div class='form-group'>
            <label class="control-label col-sm-2">Name <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='text' name='tran_receiver_name' required class='form-control person-show-hide' value=''/>
            </div>
         </div>
         <div class='form-group'>
            <label class="control-label col-sm-2">Mode of Payment<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <select name="payment_mode" class="form-control" id="payment_mode">
                  @foreach ($mode_payment as $key=>$value)
                  <option value="{{$key}}">{{$value}}</option>
                  @endforeach
               </select>
            </div>
         </div> 
         
         <div class="form-group" id="pay_option_other_html" style="display: none;"></div>
         <div class="form-group" id="expense_bank_html" style="display: none;"></div>
         <div class="form-group" id="pay_option_html" style="display: none;"></div>
         
         <div class='form-group'>
            <label class="control-label col-sm-2">Amount <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
               <input type='number' min ="1" name='amount' required class='form-control' value=''/>
            </div>
         </div>
      </div>

      <div class='panel-footer'>
         <input type='submit' class='btn btn-primary' value='Submit'/>
      </div>
   </form>
</div>
@php 
echo $guideLines = getGuideLines(20);
@endphp
@endsection
