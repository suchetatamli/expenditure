<?php  $travel_modes = array(
  '0' => array ('id' => 'Print','name' =>'Print'),
  '1' => array ('id' => 'Electronic','name' =>'Electronic'),
  '2' => array ('id' => 'SMS','name' =>'SMS'),
  '3' => array ('id' => 'Cable','name' =>'Cable TV'),
 // '4' => array ('id' => 'Website','name' =>'Website'),
  '5' => array ('id' => 'TV Channel','name' =>'TV Channel'),
  '5' => array ('id' => 'Others','name' =>'Others')
);  
// echo "<pre>"; print_r($travel_modes); die;
?>
<div style="padding: 10px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
         <td align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">State Wise Details of Election Expenses</td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="20%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px;"> Select State</td>
                  <td width="80%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">
                     <form action="" name="srchForm">
                        <select name="state_id" class="form-control" onchange="srchForm:submit();">
                           @foreach($states as $st)
                           <option value="{{$st->state_id}}" @php echo ($selected_id == $st->state_id) ? 'selected': ''; @endphp>{{$st->state_name}}</option>
                           @endforeach
                        </select>
                     </form>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
   </table>
   </div>
<div class='form-group'>
                <label class="control-label col-sm-2">State<span class="text-danger" 
                  title="This field is required">*</span></label>
                <div class="col-sm-9">
                <select id="" name="candidate_state_id" class="form-control">
                @foreach($states as $val_state)
                <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
                @endforeach
                </select>
                </div>
          </div>

<div class='form-group'>
                <label class="control-label col-sm-2">Date<span class="text-danger" 
                  title="This field is required">*</span></label>
                <div class="col-sm-9">
                <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
                </div>
          </div>

           

          <div class='form-group'>
              <label class="control-label col-sm-2">Name of Candidate<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>

          <div class='form-group'>
            <label class="control-label col-sm-2">Name of Media<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <select id="name_of_media" name="name_of_media" class="form-control">
             @foreach($travel_modes as $travel_mode)
             <option value = "{{$travel_mode['id']}}" > {{ $travel_mode['name']}} </option>
             @endforeach
            </select>
            </div>
         </div>

        <div class='form-group' id="other_details_div" style="display: none;">
              <label class="control-label col-sm-2">Others Details<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='other_details' required class='form-control person-show-hide' value=''/>
              </div>
          </div>

          <div class='form-group'>
              <label class="control-label col-sm-2">Amount Paid<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="1" name='amount_paid' required class='form-control person-show-hide' value=''/>
              </div>
          </div>

          <div class='form-group'>
              <label class="control-label col-sm-2">Amount Outstanding<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="0" name='amount_outstanding' required class='form-control person-show-hide' value=''/>
              </div>
          </div>