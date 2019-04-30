@extends("crudbooster::admin_template")
@section("content")



<div class='panel panel-default'  >
    <div class='panel-heading'>
      <span class="frm_ttl_sp">Expenses for Party Candidate</span>
      <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(6);" class="guide-ins-label">Guidelines & Instructions</a>
        </span>
    </div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/party_candidate_expense/general-expenses-add')}}" id="PartyExpenseGeneralAddForm" enctype="multipart/form-data">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

    <div class='form-group'>
            <label class="control-label col-sm-2">Select Expense Type<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <select id="select_expense_type" name="expense_type" class="form-control ddslick" required>
              <option value="">Select Expense Type</option>
             @foreach($expense_types as $val)
             <option value = "{{$val->id}}" refid="{{$val->id}}"> {{ $val->expense_type}} </option>
             @endforeach
            </select>
            </div>
      </div> 


      <div id="first_sch_div" class= "sch_div">
        
          

      </div>  



      <!------------------------------------->
          <div class='form-group afct_div' id="vcr_div" style="display: none;">
                  <label class="control-label col-sm-2">Upload Voucher</label>
              <div class="col-sm-3">
                      <input type='file' name='vouchar_filename' id='vouchar_filename' class='form-control'/>   
              </div>

              <label class="control-label col-sm-3">Explanation <span class="voucher-text">(if no voucher is uploaded)</span></label>
              <div class="col-sm-3">
                      <textarea id ="vouchar_remarks" name="vouchar_remarks" class="form-control"></textarea>
              </div>
          </div>   
      
      </div>
        
    <div class='panel-footer afct_div' style="display: none;">
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>
    </div>
    </form>
    @php
        echo $guideLines = getGuideLines(15);
      @endphp
@endsection
