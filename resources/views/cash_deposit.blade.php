@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'><span class="frm_ttl_sp">Deposit of Self Cash in Bank (opened for Election Expense)</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(1);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
    </div>
    
   
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/cash_register/myfundsave')}}" id="candidateCashDepositForm">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        <div class='form-group'>
          <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
          <input type='number' min ="0" name='amount' required class='form-control' value='' min="1" />
          </div>
          
        </div>
  
        <div class="form-group form-datepicker header-group-0 " id="" style="">
            <label class="control-label col-sm-2">Deposit Date
                            <span class="text-danger" title="This field is required">*</span></label>

            <div class="col-sm-9">
                    <!-- <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span> -->
                    <input type="text" title="Deposit Date" readonly="" required="true" class="form-control notfocus date_range_class" name="date" id="date" value="">
            </div>
        </div>
      
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    
    </div>
    
      @php
        echo $guideLines = getGuideLines(1);
      @endphp
      
    </form>
    
@endsection



