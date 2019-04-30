@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'  >
    <div class='panel-heading'><span class="frm_ttl_sp">Withdrawal for pretty expenses</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(12);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
    </div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/test/petty-expenses/save')}}" id="partyExpenseAdd">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">        
   
        <div class='form-group'>
            <label class="control-label col-sm-2">Date<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='date' id="date" required class='form-control input_date date_range_class' value=''/>
            </div>
            
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Cheque No. <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' min ="0" name='cheque' id='cheque' required class='form-control' value=''/>
            </div>
        </div>
        
        <div class='form-group'>
            <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' min ="0" name='amount' id='amount' required class='form-control' max='10000'  value=''/>
            </div>
        </div>

        <div class='form-group'>
          <label class="control-label col-sm-2">Cash given to different branch or agent <span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
   
          <select name="kept_type" id="kept_type" class='form-control' required>
            <option value=""> Select one </option>
            <option value="Y">Yes</option>
            <option value="N">No</option>
            
          </select>
          </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Name of Person/ Place<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='person' id='person' required class='form-control' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Amount given/ Kept<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' min ="0" name='kept_amount' id='kept_amount' required class='form-control' value=''/>
            </div>
        </div>
          
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>

    
      @php
        echo $guideLines = getGuideLines(12);
      @endphp
    </form>
  </div>

@endsection
