<?php  $travel_modes = array(
  '0' => array ('id' => 'Print','name' =>'Print'),
  '1' => array ('id' => 'Electronic','name' =>'Electronic'),
  '2' => array ('id' => 'Bulk SMS','name' =>'Bulk SMS'),
  '3' => array ('id' => 'Cable','name' =>'Cable'),
  '4' => array ('id' => 'Website','name' =>'Website'),
  '5' => array ('id' => 'TV Channel','name' =>'TV Channel'),
  '5' => array ('id' => 'Others','name' =>'Others')
);  
// echo "<pre>"; print_r($travel_modes); die;
?>

<div class='form-group'>
                <label class="control-label col-sm-2">Date<span class="text-danger" 
                  title="This field is required">*</span></label>
                <div class="col-sm-9">
                <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
                </div>
          </div>

          <div class='form-group'>
                <label class="control-label col-sm-2">Select State<span class="text-danger" 
                  title="This field is required">*</span></label>
                <div class="col-sm-9">
                <select id="" name="candidate_state_id" class="form-control">
                @foreach($states as $val_state)
                <option value = "{{$val_state->id}}" > {{ $val_state->state_name}} </option>
                @endforeach
                </select>
                </div>
          </div> 

          <div class='form-group'>
              <label class="control-label col-sm-2">Name of Candidate<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>

          <div class='form-group'>
            <label class="control-label col-sm-2">Name of Media aaaa<span class="text-danger" 
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
              <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="1" name='amount' required class='form-control person-show-hide' value=''/>
              </div>
          </div>