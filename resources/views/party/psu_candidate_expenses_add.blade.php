@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'>
  <div class='panel-heading'>
    <span class="frm_ttl_sp">Expenses for Party Candidate</span>
    <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
      <a href="javascript:void(0);" onclick="goToGuideLines(18);" class="guide-ins-label">Guidelines & Instructions</a>
    </span>
  </div>
  {{-- <div class='panel-heading'>Expenses for Party Candidate</div> --}}
  <form class='form-horizontal' method='POST' action="{{url('/admin/party_expense/general-expenses-add-candidate-psu')}}" id="PartyExpenseGeneralAddForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

      <div class='form-group'>
        <label class="control-label col-sm-2">Select Expense Type<span class="text-danger" title="This field is required">*</span></label>
        <div class="col-sm-9">
          <select id="select_expense_type" name="expense_type" class="form-control" required>
            <option value="">Select Expense Type</option>
            @foreach($expense_types as $val)
            <option value = "{{$val->id}}" refid="{{$val->id}}"> {{ $val->expense_type}} </option>
            @endforeach
          </select>
        </div>
      </div> 


      <div id="first_sch_div" class= "sch_div"></div>  

      <div class='form-group'>
        <label class="control-label col-sm-2">Voucher</label>
        <div class="col-sm-9">
          <input type='file' name='vouchar_filename' class='form-control' value=''/>
        </div>
      </div>

      <div class='form-group'>
        <label class="control-label col-sm-2">Remarks(If no file uploaded) </label>
        <div class="col-sm-9">
          <input type='text' name='vouchar_remarks' class='form-control' value=''/>
        </div>
      </div> 

    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    </div>
  </form>
</div>
@php 
echo $guideLines = getGuideLines(18);
@endphp
@endsection
