@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
  <div class='panel-heading'>Purchase Log</div>


  <form method='POST' class='form-horizontal' action="{{route('save-purchase-register')}}" id="purchaseRegisterForm">
    @csrf
    <div class='panel-body' style="padding:20px 0px 0px 0px">

      <div class='form-group'>
      <label class="control-label col-sm-2">Date <span class="text-danger" 
          title="This field is required">*</span></label>
          <div class="col-sm-9">
            <input type='text' name='purchase_date' max="{{ date('Y-m-d') }}" required class='form-control date_range_class' value=''/>
          </div>

        </div>
        <div class='form-group'>
          <label class="control-label col-sm-2">Mode<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
              <select class="form-control" name="purchase_mode" reuired>
                  @foreach (Config::get('constants.purchase_register_mode') as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
              </select>
          </div>
          
        </div>
        <div class='form-group'>
          <label class="control-label col-sm-2">Vendor Name<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
              <input type='text' name='vendor_name' required class='form-control' value=''/>
          </div>
          
        </div>
        <div class='form-group'>
          <label class="control-label col-sm-2">Description of Items<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
              <input type='text' name='description' required class='form-control' />
          </div>
          
        </div>
        <div class='form-group'>
          <label class="control-label col-sm-2">Quantity<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
              <input type='text' name='quantity' maxlength="10" required class='form-control' />
          </div>
          
        </div>
        <div class='form-group'>
          <label class="control-label col-sm-2">Net Amount<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
            <input type='number' min ="0" name='net_amount' required class='form-control' value='' min="1" />
          </div>
          
        </div>

        <div class='form-group'>
          <label class="control-label col-sm-2">Remarks<span class="text-danger" title="This field is required">*</span></label>
          <div class="col-sm-9">
            <textarea class="form-control" name="remarks" required=""></textarea>
          </div>
          
        </div>       

      </div>

      <div class='panel-footer'>
        <input type='submit' class='btn btn-primary' value='Save changes'/>

      </div>
    </form>

    @endsection
