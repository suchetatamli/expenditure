@extends("crudbooster::admin_template")
@section("content")

<div class='panel panel-default'  >
    <div class='panel-heading'>All Receipts in Kind</div>
    
    <form class='form-horizontal' method='POST' action="{{url('/admin/party_income/goods-add-save')}}" id="PartyTransactionRegisterAdd">
    @csrf
    <div class="panel-body" style="padding:20px 0px 0px 0px">

    <div class='form-group'>
            <label class="control-label col-sm-2">Date of Deposit<span class="text-danger" 
              title="This field is required">*</span></label>
            <div class="col-sm-9">
            <input type='text' name='date' required class='form-control input_date date_range_class' value=''/>
            </div>
      </div>       
         
          <div class='form-group'>
              <label class="control-label col-sm-2">Name of Donor<span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='person_name' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
        
          <div class='form-group'>
              <label class="control-label col-sm-2">Address <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='person_address' required class='form-control person-show-hide' value=''/>
              </div>
          </div>
          
          <div class='form-group'>
              <label class="control-label col-sm-2">Details of Goods/Services received as complimentary <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
              <textarea name="goods_desc" class="form-control" required></textarea>
                
              </div>
          </div>

  
          <div class='form-group'>
              <label class="control-label col-sm-2">Notional Value <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='number' min ="1" name='amount' required class='form-control' value=''/>
              </div>
          </div>

          <div class='form-group'>
              <label class="control-label col-sm-2">Remarks <span class="text-danger" title="This field is required">*</span></label>
              <div class="col-sm-9">
                <input type='text' name='remarks' required class='form-control' value=''/>
              </div>
          </div>

        </div>
        
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Submit'/>
    
    </div>
    </div>
    </form>

@endsection
