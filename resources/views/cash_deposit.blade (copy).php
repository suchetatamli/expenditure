@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>Candidate Cash Deposit</div>
   
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/cash_register/myfundsave')}}" id="candidateCashDepositForm">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        <div class='form-group'>
          <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-6">
          <input type='number' name='amount' required class='form-control' value='' min="1" />
          </div>
          
        </div>
  
        <div class='form-group'>
            <label class="control-label col-sm-2">Date Deposit<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='date' name='date' max="{{ date('Y-m-d') }}" required class='form-control input_date date_range_class' value=''/>
            </div>
        </div>
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    
    </div>
    </form>

@endsection
