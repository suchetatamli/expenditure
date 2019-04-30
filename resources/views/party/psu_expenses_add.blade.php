@extends("crudbooster::admin_template")
@section("content")

<?php  $travel_modes = array(
 '0' => array ('id' => 'taxi','name' =>'Taxi'),
 '1' => array ('id' => 'helicopter','name' =>'Helicopter'),
 '2' => array ('id' => 'aircraft','name' =>'Aircraft'),
 '3' => array ('id' => 'other','name' =>'Others'),
);  
// echo "<pre>"; print_r($travel_modes); die;
?>

<div class='panel panel-default'  >
    <div class='panel-heading'>
        <span class="frm_ttl_sp">Expenses for General Party Propaganda</span>
        <span class="frm_ins_sp"><i class="icon_wh guidelines_wh"></i>
            <a href="javascript:void(0);" onclick="goToGuideLines(19);" class="guide-ins-label">Guidelines & Instructions</a>
        </span>
    </div>

    <form class='form-horizontal' method='POST' action="{{url('/admin/party_expense/general-expenses-add-psu')}}" id="PartyExpenseGeneralAddForm">
        @csrf
        <input type="hidden" id="expense_type_text" value="" name="expense_type_text">
        <div class="panel-body" style="padding:20px 0px 0px 0px">
            <div class='form-group'>
                <label class="control-label col-sm-2">Select Expense Type<span class="text-danger" 
                 title="This field is required">*</span></label>
                 <div class="col-sm-9">
                    <select id="select_expense_type" name="expense_type" class="form-control" required="">
                        <option value="">Select Expense Type</option>
                        @foreach($expense_types as $val)
                        <option value = "{{$val->id}}" refid="{{$val->id}}"> {{ $val->expense_type}} </option>
                        @endforeach
                    </select>
                </div>
            </div> 

            <div class='form-group'>
                <label class="control-label col-sm-2">State<span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <select id="parents_state_id" name="state" class="form-control">
                        @foreach($states as $val_state)
                        <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2" id="date_field">Date<span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
                </div>
            </div>

            <div id="first_sch_div" class= "sch_div" frmid="7">
                <div class='form-group'>
                    <label class="control-label col-sm-2">Venue<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='venue' required class='form-control person-show-hide' value=''/>
                    </div>
                </div>

                <div class='form-group'>
                    <label class="control-label col-sm-2" id="campaign_name">Name of Star Campaigner (s)<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='name_campaigner' required class='form-control person-show-hide' value=''/>
                        <p class="help-block">Use comma (,) to insert multiple names</p>
                    </div>
                </div>

                <div class='form-group'>
                    <label class="control-label col-sm-2">Mode of Travel<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <select id="travel_mode" name="travel_mode" class="form-control">
                            @foreach($travel_modes as $travel_mode)
                            <option value = "{{$travel_mode['id']}}" > {{ $travel_mode['name']}} </option>
                            @endforeach
                        </select>
                    </div>
                </div> 

                <div class='form-group' id="name_operator">
                    <label class="control-label col-sm-2">Name of Payee<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='name_operator' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 

                <div class='form-group' id="other_travel_mode">
                    <label class="control-label col-sm-2">Specify<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='travel_mode_other' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 
            </div>

            <div id="second_sch_div" class= "sch_div" frmid="8">
            </div>

            <div id="third_sch_div" class= "sch_div" frmid="9">
                <div class='form-group'>
                    <label class="control-label col-sm-2">Name of Payee<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='name_payee' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 
                <div class='form-group'>
                    <label class="control-label col-sm-2">Name of Media <span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='name_media' required class='form-control person-show-hide' value=''/>
                          <!-- <select id="name_media" name="name_media" required="" class="form-control person-show-hide">
                            <option value="Print">Print</option>
                            <option value="Electronic">Electronic</option>
                            <option value="SMS">SMS</option>
                            <option value="Cable TV">Cable TV</option>
                            <option value="Website">Website</option>
                            <option value="TV Channel">TV Channel</option>
                            <option value="Others">Others</option>
                        </select> -->
                    </div>
                </div>  

                <div class='form-group' id="other_media" style="display: none;">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-9">
                        <input type='text' name='name_media_other' required class='form-control person-show-hide' value='' placeholder="Specify Media Name" />
                    </div>
                </div> 
            </div>

            <div id="fourth_sch_div" class= "sch_div" frmid="10">

                <div class='form-group'>
                    <label class="control-label col-sm-2">No. & Name of Constituency<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='constituency_name' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 

                <div class='form-group'>
                    <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='item_details' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 
            </div>

            <div id="fifth_sch_div" class= "sch_div" frmid="11">
                <div class='form-group'>
                    <label class="control-label col-sm-2">Venue<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='venue_sc5' required class='form-control person-show-hide' value=''/>
                    </div>
                </div>

                <div class='form-group' style="display: none;">
                    <label class="control-label col-sm-2">Date of Meeting/Procession/Rally<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='date_meeting' required class='form-control input_date date_range_class' value=''/>
                    </div>
                </div>    

                <div class='form-group'>
                    <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='item_details_sc5' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 
            </div>

            <div id="sixth_sch_div" class= "sch_div" frmid="12">

                <div class='form-group'>
                    <label class="control-label col-sm-2">Purpose / Details of items<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='purpose' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 

                <div class='form-group' style="display: none;">
                    <label class="control-label col-sm-2">Details of items<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='item_details_sc17' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> 

              <!-- <div class='form-group'>
                    <label class="control-label col-sm-2">Purpose<span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                      <input type='text' name='purpose' required class='form-control person-show-hide' value=''/>
                    </div>
                </div> -->

            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Amount Paid<span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <input type='number' min ="1" name='amount_paid' required class='form-control' value=''/>
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Amount Outstanding<span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <input type='number' min ="0" name='amount_outstanding' required class='form-control' value=''/>
                </div>
            </div>

            <div class='form-group'>
                <label class="control-label col-sm-2">Payment Type <span class="text-danger" title="This field is required">*</span></label>
                <div class="col-sm-9">
                    <select id="payment_type" name="payment_type" class="form-control">
                        <option value="cash">Cash</option>
                        <option value="chq">Cheque</option>
                        <option value="draft">Draft</option>
                        <option value="online_transfer">Online Transfer</option>
                    </select>
                </div>
            </div>

            <div id="che_dd_no">
                <div class='form-group'>
                    <label class="control-label col-sm-2">{{Config::get('constants.text_labels.expense')}} <span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control check_bank_state_wise" name="expenses_bank" required>
                            <option value="">Select Bank</option>
                            {{ getBankList() }}
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label class="control-label col-sm-2" ><span id="chqLvl">Cheque/Draft No</span><span class="text-danger" title="This field is required">*</span></label>
                    <div class="col-sm-9">
                        <input type='text' name='receipt_no' required class='form-control' value=''/>
                    </div>
                </div>
            </div>

        </div>

        <div class='panel-footer'>
            <input type='submit' class='btn btn-primary' value='Submit'/>
        </div>
    </form>
</div>
@php 
echo $guideLines = getGuideLines(19);
@endphp

@endsection
