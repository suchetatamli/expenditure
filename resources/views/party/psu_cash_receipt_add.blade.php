@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'  >
  <div class='panel-heading'>Cash From Other Party Or Person</div>
  
  <form class='form-horizontal' method='POST' action="{{url('/admin/party_income/cash-receipt-save-psu')}}" id="PartyTransactionRegisterCashAdd" enctype="multipart/form-data">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

      <div class='form-group'>
        <label class="control-label col-sm-2">State<span class="text-danger" 
          title="This field is required">*</span></label>
          <div class="col-sm-9">
            <select id="" name="state" class="form-control">
              @foreach($states as $val_state)
              <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class='form-group'>
          <label class="control-label col-sm-2">Date Deposit<span class="text-danger" 
            title="This field is required">*</span></label>
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
            <label class="control-label col-sm-2">Amount <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' min ="1" name='amount' required class='form-control' value=''/>
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
            <div class="col-sm-9">
              <input type='file' name='vouchar_filename' class='form-control' value=''/>
            </div>
          </div>

          <div class='form-group'>
            <label class="control-label col-sm-2">Explanation (If no voucher is uploaded) </label>
            <div class="col-sm-9">
              <input type='text' name='vouchar_remarks' class='form-control' value=''/>
            </div>
          </div> 

        </div>
        
        <div class='panel-footer'>
          <input type='submit' class='btn btn-primary' value='Submit'/>
          
        </div>
      </div>
    </form>

    @endsection
