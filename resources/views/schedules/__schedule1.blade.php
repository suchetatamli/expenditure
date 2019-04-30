@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>{{ $schedule_title }} 
        <span style="padding-left:30px;font-size:11px;">
            <a href="{{ url('admin/candidate_transaction/election-expense') }}"> Back to Schedule </a>
        </span>
    </div>
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/cash_register/myfundsave')}}">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        {{--  Include 'default_form' form that to be included ever time here  --}}
    
    @include('schedules.default_form')


    <span style="float:right;">
        <a href="javascript:void(0)" class="add-new-row">
            <span class="badge"><span class="glyphicon glyphicon-plus"></span>Add New Row</span></a>
    </span>

     <div style="clear: both;">&nbsp;</div>
     <div class='form-group'>
        <label class="control-label col-sm-3">Nature of Expenditure<span class="text-danger" title="This field is required">*</span></label>
        <label class="control-label col-sm-2">Total Amount in Rs.<span class="text-danger" title="This field is required">*</span></label>
        <label class="control-label col-sm-2">By Candidate/Agent</label>
        <label class="control-label col-sm-2">BY Pol. Party</label>
        <label class="control-label col-sm-2">BY Others</label> 
    </div>
    <div class='form-group'>

        <div class="col-sm-3">
            <select name="natures_id[]"  class='form-control' id="expenditure">

                @foreach ($natures as $key => $val)
                <option value="{{ $key }}">{{ $val }} </option>
                @endforeach
            
            </select>
        </div>

        <div class="col-sm-2">
                <input type='text' name='total_amount[]' required class='form-control' value=''/>   
        </div>
        <div class="col-sm-2">
                <input type='text' name='candidate_or_agent[]' class='form-control' value=''/><br/>
                <input type='text' name='candidate_or_agent_name[]' class='form-control' value='' placeholder="Name"/>

        </div>

        <div class="col-sm-2">
                <input type='text' name='pol_party[]' required class='form-control' value=''/> <br/>
                <select name="pol_party_name[]" id="party_name" class='form-control'>
                        @foreach ($party_all as $val)
                        <option value="{{ $val->id }}">{{ $val->party_name }}</option>
                        @endforeach
                      </select>
            
        </div>
        <div class="col-sm-2">
                <input type='text' name='other[]' required class='form-control' value=''/><br/>
                <input type='text' name='other_per_name[]' required class='form-control' value='' placeholder="Name"/> 
        </div>
        <span style="width:10px;"></span>
    </div>

    <div class="hidden-new-row" style="display:none">
    <div class='form-group'>
       
            <div class="col-sm-3">
                <select name="expenditure[]"  class='form-control' id="expenditure">
    
                    @foreach ($expenditure as $key => $val)
                    <option value="{{ $key }}">{{ $val }} </option>
                    @endforeach
                
                </select>
            </div>

        <div class="col-sm-2">
                <input type='text' name='total_amount[]' required class='form-control' value=''/>   
        </div>
        <div class="col-sm-2">
                <input type='text' name='candidate_or_agent[]' class='form-control' value=''/><br/>
                <input type='text' name='candidate_or_agent_name[]' class='form-control' value='' placeholder="Name"/>

        </div>

        <div class="col-sm-2">
                <input type='text' name='pol_party[]' class='form-control' value=''/> <br/>
                <select name="pol_party_name[]" id="party_name" class='form-control'>
                        @foreach ($party_all as $val)
                        <option value="{{ $val->id }}">{{ $val->party_name }}</option>
                        @endforeach
                      </select>
        </div>
        <div class="col-sm-2">
                <input type='text' name='other[]' class='form-control' value=''/><br/>
                <input type='text' name='other_per_name[]' class='form-control' value='' placeholder="Name"/> 
        </div>
            <button class="btn btn-danger btn-circle btn-remove" type="button"><i class="fa fa-times"></i></button>
    </div>
    </div>

    <div id="added-new-row"></div>

    <div class='panel-footer'>
        <input type='submit' class='btn btn-primary' value='Save changes'/>
      
    </div>

    </div>
    </form>
  
  @endsection
