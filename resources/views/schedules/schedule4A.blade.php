@extends("crudbooster::admin_template") 
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>{{ $schedule_title }}<span style="padding-left:30px;font-size:11px;">
            <a href="{{ url('admin/candidate_transaction/election-expense') }}"> Back to Schedule </a>
        </span></div>

    <form method='POST' class='form-horizontal' action="{{url('/admin/schedule_selectio/formsave')}}">
        @csrf
        <div class='panel-body' style="padding:20px 0px 0px 0px">

            {{-- Include 'default_form' form that to be included ever time here --}}
    @include('schedules.default_form')
            <div class='form-group'>
                <label class="control-label col-sm-2">Date <span class="text-danger" 
title="This field is required">*</span></label>

                <div class="col-sm-9">
                    <input type='date' name='date' required class='form-control input_date date_range_class' value='' />
                </div>

            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Nature of medium <span class="text-danger" 
                                    title="This field is required">*</span></label>
                <div class="col-sm-9">

                    <select name="nature_of_medium" id="nature_of_medium" required class='form-control'>
                                            <option value="">Select Medium</option>
                                            <option value="electronic">Electronic</option>
                                            <option value="print">Print</option>

                                    </select>
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Duration</label>
                <div class="col-sm-9">
                    <input type='text' name='medium_duration' class='form-control' value='' />
                </div>
            </div>
            <div class='form-group'>
                <label class="control-label col-sm-2">Name of media provider</label>
                <div class="col-sm-9">
                    <input type='text' name='media_provider_name' class='form-control' value='' />
                </div>
            </div>
            <div class='form-group'>
                <label class="control-label col-sm-2">Media provider address</label>
                <div class="col-sm-9">
                    <input type='text' name='media_provider_address' class='form-control' value='' />
                </div>
            </div>
            <div class='form-group'>
                <label class="control-label col-sm-2">Agency Name</label>
                <div class="col-sm-9">
                    <input type='text' name='agency_name' class='form-control' value='' />
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Agency Address</label>
                <div class="col-sm-9">
                    <input type='text' name='agency_address' class='form-control' value='' />
                </div>
            </div>


            <div class='form-group'>
                <label class="control-label col-sm-2">By Candidate/Agent</label>
                <div class="col-sm-4">
                    <input type='text' name='candidate_or_agent' id='candidate_or_agent' class='form-control' value='0' />
                </div>
                <div class="col-sm-5">
                    <input type='text' name='candidate_or_agent_name' class='form-control' value='' placeholder="Candidate/Agent Name" />

                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">BY Pol. Party</label>
                <div class="col-sm-4">
                    <input type='text' name='pol_party' id='pol_party' class='form-control' value='0' />
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

            <div class='form-group'>
                <label class="control-label col-sm-2">BY Others</label>
                <div class="col-sm-4">
                    <input type='text' name='other' id='other' class='form-control' value='0' />
                </div>
                <div class="col-sm-5">
                    <input type='text' name='other_per_name' class='form-control' value='' placeholder="Specify Name & Address" />
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Total Amount in Rs. <span class="text-danger" 
                title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <input type='text' name='total_amount' id='total_amount' required min="1" class='form-control' readonly value='0' />
                </div>
            </div>

            <input type="hidden" name="schedulename" value="schedule4A" />
            <div class='panel-footer'>
                <input type='submit' class='btn btn-primary' value='Save changes' />

            </div>

        </div>
    </form>
@endsection