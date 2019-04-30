@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>Your Election Profile</div>
   
    
    <form method='POST' class='form-horizontal' action="{{url('/admin/profile_edit/party-profile-save')}}" id="">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        <div class='form-group'>
          <label class="control-label col-sm-2">Amount<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
          <input type='number' min ="0" name='amount' required class='form-control' value='' min="1" />
          </div>
          
        </div>
  
        <div class="form-group form-datepicker header-group-0 " id="" style="">
            <label class="control-label col-sm-2">Deposit Date
                            <span class="text-danger" title="This field is required">*</span></label>

            <div class="col-sm-9">
                    <!-- <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span> -->
                    <input type="text" title="Deposit Date" readonly="" required="true" class="form-control notfocus date_range_class" name="date" id="date" value="">
            </div>
        </div>
      
    </div>

    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    
    </div>
    </form>
    
@endsection



