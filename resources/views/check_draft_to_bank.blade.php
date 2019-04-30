@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'  >
    <div class='panel-heading'><span class="frm_ttl_sp">Cheque, DD, PO & Online transfer in Bank Account (opened by Election Expense)</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(4);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
    </div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/check_draft_payorder_to_bank/save')}}" id="checkDraftToBank">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">
      <div class='form-group'>
        <label class="control-label col-sm-2">Date <span class="text-danger" 
          title="This field is required">*</span></label>
        <div class="col-sm-9">
        <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
        </div>
        
    </div>

        <div class='form-group'>
          <label class="control-label col-sm-2">Issue Type <span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
   
          <select name="issue_type" id="issue_type" class='form-control'>
            <option value="own_bank">From own Bank Account</option>
            <option value="other_person_party">From Political Party</option>
            <option value="other">From a Person/ Company/ Firm/ Associations/ Body of Person, etc.</option>
          </select>
          </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2"> Payment Type <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
      
            <select name="payment_type" id="payment_type" class='form-control' required>
              <option value="" selected >Select</option>
              <option value="cheque">Cheque</option>
              <option value="draft">Draft</option>
              <option value="pay_order">Pay Order</option>
              <option value="online_transfer" id="ont">Online Transfer</option>
            </select>
            </div>
          </div>

        
        <div id="issue_type_display" style="display:none">
        <div class='form-group'>
            <label class="control-label col-sm-2"><span id="add_frm_lbl">Received From</span> <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='received_from' required class='form-control bank-show-hide' value=''/>
            </div>
        </div>
      
        <div class='form-group'>
            <label class="control-label col-sm-2"><span id="add_lbl">Address</span> <span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='address' required class='form-control bank-show-hide' value=''/>
            </div>
        </div>

        <div class='form-group' id="wrp_bni">
            <label class="control-label col-sm-2"><span id="lbl_bni">Bank Name (of the instrument)</span><span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='bank_name' required class='form-control bank-show-hide' value=''/>
            </div>
        </div>

        <div class='form-group' id="wrp_bbi">
            <label class="control-label col-sm-2"><span id="lbl_bbi">Bank Branch (of the instrument)</span><span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
              <input type='text' name='bank_branch' required class='form-control bank-show-hide' value=''/>
            </div>
        </div>
      </div> 
  

          <div class='form-group' id="purpose_other">
              <label class="control-label col-sm-2"><span id="lbl_ins">Instrument No.</span><span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='receipt_no' id='receipt_no' required class='form-control' value=''/>
              </div>
          </div>
          
          <div class='form-group'>
            <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='amount' min ="0" required class='form-control' value=''/>
          </div>
              
            </div>

            <div class='form-group'>
              <label class="control-label col-sm-2"> Purpose <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
       
              <select name="purpose" id="purpose" class='form-control' required>
                <option value="" selected >Select</option>
                <option value="election_expense" id="elcOp">Election Expense</option>
                <option value="loan">Loan</option>
                <option value="gift">Gift</option>
                <option value="donation">Donation</option>
                <option value="others">Others</option>
              </select>
              </div>
            </div> 

            <div class='form-group' id="other_purpose">
              <label class="control-label col-sm-2">Specify Purpose<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' id="other_purpose_val" name='other_purpose' class='form-control' value=''/>
              </div>
              
            </div>

            <div class='form-group' id="remarks">
              <label class="control-label col-sm-2">Remarks</label>
              <div class="col-sm-9">
                <input type='text' id="remarks_val" name='remarks' class='form-control' value=''/>
              </div>
              
            </div>   
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>

    
      @php
        echo $guideLines = getGuideLines(4);
      @endphp
      
    </form>    
@endsection
