@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'  >
    <div class='panel-heading'>Add State</div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/profile_edit/state-save')}}" id="BankAddForm">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">
     
    <div class='form-group'>
                <label class="control-label col-sm-2">State<span class="text-danger" 
                  title="This field is required">*</span></label>
                <div class="col-sm-6">
                <select id="state" name="state" class="form-control" required="">
                <option></option>
                @foreach($states as $val_state)
                <option value = "{{$val_state->id}}" > {{ $val_state->state_name}} </option>
                @endforeach
                </select>
                </div>
    </div>
      <input type ="hidden" id="state_name" name="state_name" value="">
      <input type ="hidden" id="action" name="action" value="">
      
        </div>
        
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save & Exit' name="save"/>
      <input type='submit' class='btn btn-primary' value='Add More' name="add"/>
    
    </div>
    </div>
    </form>

@endsection
