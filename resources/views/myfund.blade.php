@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>Form</div>
   
    
    <form method='POST' action="{{url('/admin/dipentest/save')}}">
    @csrf
    <div class='panel-body'>

        <div class='form-group'>
          <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
          <input type='text' name='amount' required class='form-control' value=''/>
          </div>
          
        </div>
         
        <!-- etc .... -->
        
      

      
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    
    </div>
    </form>

@endsection
