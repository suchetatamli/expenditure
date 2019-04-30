@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'  >
    <div class='panel-heading'><span class="frm_ttl_sp">Receipt of Goods & Services in kind</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(5);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
    </div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/test/service-inkind/save')}}" id="inkindForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

        <div class='form-group'>
          <label class="control-label col-sm-2">Provided by <span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
   
          <select name="provider_type" id="provider_type" class='form-control'>
            <option value=""> Select one </option>
            <option value="party">Party</option>
            <option value="other">Other Person/ Association</option>
            
          </select>
          </div>
        </div>
   
        <div class='form-group'>
            <label class="control-label col-sm-2">Receipt Date<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='date' id="date" required class='form-control input_date date_range_class' value=''/>
            </div>
            
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Description <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <textarea name='description' id="description" required class='form-control'></textarea>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Quantity <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' name='quantity' id='quantity' required class='form-control' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Rate per Unit <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' name='rate' id='rate' required class='form-control' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Total Notional Value<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='number' min ="0"  name='amount' id='amount' required class='form-control' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Bill No./ Voucher No.<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='bill_no' id='bill_no' required class='form-control' value=''/>
            </div>
        </div>
        <div class='form-group'>
            <label class="control-label col-sm-2">Date of Bill/ Voucher<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='bill_date' id='bill_date' required class='form-control date_range_class' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Name of Provider <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='provider_name' id='provider_name' required class='form-control' value=''/>
            </div>
        </div>
      
        <div class='form-group'>
            <label class="control-label col-sm-2">Address of Provider <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='provider_address' id='provider_address' required class='form-control' value=''/>
            </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Remarks </label>
            <div class="col-sm-9">
              <input type='text' name='remarks' id='remarks' class='form-control' value=''/>
            </div>
        </div>
                 
          
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>
    
      @php
        echo $guideLines = getGuideLines(5);
      @endphp
      
    </form>
  </div>

@endsection
