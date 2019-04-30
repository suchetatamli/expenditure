@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>

        <span class="frm_ttl_sp">{{ $schedule_title }} <span style="padding-left:30px;font-size:11px;">
                <a href="{{ url('admin/candidate_transaction/election-expense') }}"> Back to Schedule </a>
            </span></span>
        
        <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(10);" class="guide-ins-label">Guidelines & Instructions</a>
        </span> 
            </div>
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/schedule_selectio/formsave')}}" id="scheduleForm5" enctype="multipart/form-data">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        {{--  Include 'default_form' form that to be included ever time here  --}}
    @include('schedules.default_form')

    <div class='form-group'>
                <label class="control-label col-sm-2">Date <span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                        <input type='date' name='date' required class='form-control input_date date_range_class' value='' />
                </div>
    </div>

    <div class='form-group'>
                                <label class="control-label col-sm-2">Nature of Expenses</label>
                                <div class="col-sm-9">
                                        <input type='text' name='nature_of_expenses' class='form-control' value='' />
                                </div>
                        </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">Registration No. of Vehicle</label>
            <div class="col-sm-9">
            <input type='text' name='vehicle_regn_no_or_type' class='form-control' value=''/>
            </div>
    </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">Type of Vehicle</label>
            <div class="col-sm-9">
            <input type='text' name='vehicle_type' class='form-control' value=''/>
            </div>
    </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">Hiring or Mentainance Charges</label>
            <div class="col-sm-9">
            <input type='number' name='hiring_rate_or_mentainance' class='form-control' value=''/>
            </div>
    </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">Fuel charges (if not included above)</label>
            <div class="col-sm-9">
            <input type='number' name='fuel_charges' class='form-control' value=''/>
            </div>
    </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">Driver’s charges (if not included above)</label>
            <div class="col-sm-9">
            <input type='number' name='driver_charges' class='form-control' value=''/>
            </div>
    </div>

    <div class='form-group'>
            <label class="control-label col-sm-2">No of Days for which used</label>
            <div class="col-sm-9">
            <input type='number' name='days_used' class='form-control' value=''/>
            </div>
    </div>
   
    <div id="incurred_block">
    <div class='form-group' id="populate_self">
                <label class="control-label col-sm-2">Amount incurred by Self/Agent</label>
                <div class="col-sm-4">
                        <input type='number' min ="0" name='candidate_or_agent' id='candidate_or_agent' class='form-control' value='0' />
                </div>
                <div class="col-sm-5">
                        <input type='hidden' name='candidate_or_agent_name' class='form-control' value='{{ $candidate_name }}' placeholder="Candidate/Agent Name" />

                </div>
        </div>

        <div class='form-group' id="populate_pol_party">
                <label class="control-label col-sm-2">Amount incurred by Pol. Party</label>
                <div class="col-sm-4">
                        <input type='number' min ="0" name='pol_party' id='pol_party' class='form-control' value='0' />
                </div>
                <div class="col-sm-5">
                <select name="pol_party_name" id="party_name" class='form-control'>
                        <option value="">Select Party</option>
                        @foreach ($party_all as $val)
                        <option value="{{ $val->id }}">{{ $val->party_name }}</option>
                        @endforeach
                </select>
                </div>
        </div>

        <div class='form-group' id="populate_others">
                <label class="control-label col-sm-2">Amount incurred by Others</label>
                <div class="col-sm-4">
                        <input type='number' min ="0" name='other' id='other' class='form-control' value='0' />
                </div>
                <div class="col-sm-5">
                        <input type='text' name='other_per_name' id='other_per_name' class='form-control' value='' placeholder="Specify Name & Address" />
                </div>
        </div>

    </div>
        <div class='form-group'>
                <label class="control-label col-sm-2">Total Amount in Rs. <span class="text-danger" 
title="This field is required">*</span></label>
                <div class="col-sm-9">
                        <input type='text' name='total_amount' id='total_amount' required min="1" class='form-control' readonly value='0' />
                </div>
        </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Remarks</label>
            <div class="col-sm-9">
            <input type='text' name='remarks' class='form-control ' value=''/>
            </div>
    </div>

        <div class='form-group'>
            <label class="control-label col-sm-2">Upload Voucher</label>
        <div class="col-sm-3">
                <input type='file' name='vouchar_filename' id='vouchar_filename' class='form-control'/>   
        </div>

        <label class="control-label col-sm-3">Explanation <span class="voucher-text">(if no voucher is uploaded)</span></label>
        <div class="col-sm-3">
                <textarea id ="vouchar_remarks" name="vouchar_remarks" class="form-control"></textarea>
        </div>
    </div>

    <input type="hidden" name="schedulename" value="schedule5"/>

    <div class='panel-footer'>
        <input type='submit' class='btn btn-primary' value='Save changes'/>
    </div>
    
      @php
        echo $guideLines = getGuideLines(10);
      @endphp
      

    </div>
    </form>
  
  @endsection