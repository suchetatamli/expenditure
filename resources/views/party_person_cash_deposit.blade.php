@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'>
    <div class='panel-heading'><span class="frm_ttl_sp">Cash Receipt From Political Party Or Others</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(2);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
    </div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/party_person_cash_deposit/save')}}" id="partyPersonCashDepositForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

        <div class='form-group'>
          <label class="control-label col-sm-2">Received From <span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
   
          <select name="received_type" id="received_type" required class='form-control'>
            <option value=""> Select one </option>
            <option value="party">Political Party</option>
            <option value="other">Other Persons</option>
            
          </select>
          </div>
        </div>

             {{-- List all party names --}}
          <div id="all_party_list" style="display:none;">
          <div class='form-group'>
            <label class="control-label col-sm-2">Select Party <span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
                <select name="party_name" id="party_name" required class='form-control party-show-hide'>
              @foreach ($party_all as $val)
              <option value="{{ $val->id }}">{{ $val->party_name }}</option>
              @endforeach
            </select>
            </div>
          </div>

          <div class='form-group'>
              <label class="control-label col-sm-2">Party Address <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='party_address' required class='form-control' value=''/>
              </div>
          </div>

          </div>
          {{-- The block will not display for others --}}

          <div id="cash_from_others" style="display:none;">
          <div class='form-group'>
              <label class="control-label col-sm-2">Person Name <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='person_name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
        
          <div class='form-group'>
              <label class="control-label col-sm-2">Person Address <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='person_address' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
          </div>
              {{-- End Block --}}

          <div class='form-group'>
            <label class="control-label col-sm-2">Date of Receipt<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
            </div>
            
        </div>
          <div class='form-group'>
              <label class="control-label col-sm-2">Receipt Number </label>
              <div class="col-sm-9">
                <input type='text' name='receipt_no' class='form-control' value=''/>
              </div>
          </div>
  
          <div class='form-group'>
              <label class="control-label col-sm-2">Amount <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="0" id="amount" name='amount' required class='form-control' value=''/>
              </div>
            </div>
            
            <div class='form-group'>
                <label class="control-label col-sm-2"> Purpose <span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
          
                <select name="purpose" id="cash_purpose" class='form-control' required >
                  <option value="" selected >Select</option>
                  <!-- <option value="election_expense">Election Expense</option>
                  <option value="loan">Loan</option>
                  <option value="gift">Gift</option>
                  <option value="donation">Donation</option>
                  <option value="others">Others</option> -->
                </select>
                </div>
              </div>  
  
              <div class='form-group' id="purpose_other" style="display:none;">
                  <label class="control-label col-sm-2">Enter Purpose <span class="text-danger" title="This field is required">*</span></label>
                  <div class="col-sm-9">
                    <input type='text' name='purpose_other' class='form-control' value=''/>
                  </div>
              </div>
              <div class='form-group' id="">
                  <label class="control-label col-sm-2">Remarks </label>
                  <div class="col-sm-9">
                    <input type='text' name='remarks' class='form-control' value=''/>
                  </div>
              </div>
  
            <div class='form-group'>
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-9">
              <div class=" ">
              <label class='radio-inline'>
              <input type="radio" name="deposit_relation" 
              value="not_deposited_to_bank" checked="checked"> Cash received but not deposited in bank on the same date </label>
              </div>
              <div class=" ">
              <label class='radio-inline'>
              <input type="radio" name="deposit_relation"
                value="deposited_to_bank"> Cash received & deposited in bank on the same date </label>
              </div>
  
            </div>
      
          </div>
        
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>
    
      @php
        echo $guideLines = getGuideLines(2);
      @endphp
    </div>
    </form>

@endsection
