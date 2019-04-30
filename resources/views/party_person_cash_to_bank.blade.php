@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'><span class="frm_ttl_sp">Cash From Other person Party Deposited to Bank</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(3);" class="guide-ins-label">Guidelines & Instructions</a>
    </span> 
    <div class="clearfix"></div>
    </div>
   
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/party_person_cash_to_bank/save')}}" id="partyPersonCashToBank">
    @csrf
    <div class='panel-body' style="padding:20px 10px 0px">
       
        <div class='form-group'>
            <label class="control-label col-sm-2">Date <span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='date' required class='form-control date_range_class' value=''/>
            </div>
            
        </div>
        
        <div class='form-group'>
            <label class="control-label col-sm-2">Select Entry <span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
                <select name="cash_reg_record"  class='form-control' size="3">
                        @foreach ($cash_record as $val)
                        <option value="{{ $val->id }}">Rs. {{ $val->tran_amount }} received from {{$val->tran_source_name}}, on {{ date('d-m-y',strtotime($val->tran_date)) }}</option>
                        @endforeach
                
                </select>
            </div>
            
        </div>
      
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Update'/>
    
    </div>
    
      @php
        echo $guideLines = getGuideLines(3);
      @endphp
    </form>

@endsection
