@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'  >
    <div class='panel-heading'>Election Expense</div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/schedule_selectio/getform')}}" id="expenseForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">
        
        <div class='form-group'>
          <label class="control-label col-sm-3">Select Schedule <span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-6">
   
          <select name="schedule_selection" id="schedule_selection" required class='form-control ddslick'>
            <option value="">Select Schedule </option>
            <?php $schedules = candidateScheduleReceipt();
            foreach ($schedules as $key => $value) {             
            ?>
            
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php
              } 
            ?>

          </select>
          </div>
          <div class="col-sm-3">
          <input type='submit' class='btn btn-primary' value='Submit'/>
          </div>
        </div>        
    </div>

    </form>
</div>
@endsection