@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'  >
    <div class='panel-heading'>Add Details of your Bank</div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/profile_edit/bank-save')}}" id="BankAddForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

          @if(CRUDBooster::myPrivilegeId() =='5')
          <div class='form-group'>
              <label class="control-label col-sm-2">State<span class="text-danger" 
                title="This field is required">*</span></label>
              <div class="col-sm-9">
                <select id="" name="state_id" class="form-control">
                @foreach($states as $val_state)
                <option value = "{{$val_state->state_id}}" > {{ $val_state->state_name}} </option>
                @endforeach
                </select>
              </div>
          </div>
          @endif
     
          <div class='form-group'>
              <label class="control-label col-sm-2">Name of Bank<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='bank_name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>

          <div class='form-group'>
              <label class="control-label col-sm-2">Branch Name<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='branch_name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
        
          <div class='form-group'>
              <label class="control-label col-sm-2">Bank Address <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='bank_address' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
          

  
          <div class='form-group'>
              <label class="control-label col-sm-2">Opening Balance <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="1" name='balance' required class='form-control' value=''/>
              </div>
          </div>


        </div>
        
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>
    </div>
    </form>

@endsection
