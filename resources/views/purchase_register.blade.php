<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{url('admin/candidate_transaction/purchase-register')}}">
  @csrf
  <div class="col-sm-3">
     <div class='form-group'>
            <label class="control-label">From Date</label>            
            <input type='text' name='from_date'  class='form-control date_range_class input_date' value='{{$from_date}}'/>      
            
        </div>
      </div>
      <div class="col-sm-3">
        <div class='form-group'>
            <label class="control-label">To Date</label>
              <input type='text' name='to_date'  class='form-control date_range_class input_date' value='{{$to_date}}'/>            
        </div>
      </div>
      <div class="col-sm-3">
        <div class='form-group'>
            <label class="control-label">Mode</label>
             <select class="form-control" name="purchase_mode" >
                  <option value="">Please Select</option>
                  @foreach (Config::get('constants.purchase_register_mode') as $key => $value)
                    <option value="{{$key}}" @if($key == $purchase_mode) selected @endif>{{$value}}</option>
                  @endforeach
              </select>       
        </div>
      </div>
      <div class="col-sm-3">
      <div class='form-group'>
        <label>&nbsp;</label>
        <button class="btn btn-sm btn-success" type="submit">Search</button>
        <button class="btn btn-sm btn-waring" type="button" onclick="window.location='{{$reset_url}}'">Reset</button>
      </div>
      </div>
      </form>
  </div>

</div>

  
        <div class="table_listing">
          <div class="tbl_list_scrl">
          <table class='table table-striped table-bordered'>
            <thead>
              <tr>
                <th style="text-align: center;">Sl. No</th>
                <th style="text-align: center;">Date</th>    
                <th>Mode</th>
                <th>Vendor Name</th>
                <th>Description of Items</th>    
                <th style="text-align: center;">Quantity</th> 
                <th style="text-align: right;">Net Amount {{Config::get('constants.text_labels.amount')}}</th>    
                <th>Remarks</th> 
              </tr>
            </thead>
            <tbody>
              @php $total_net_amount = 0.00;@endphp
              @foreach($records as $row)
              <tr>
                <td style="text-align: center;">{{$loop->iteration}}</td>
                <td style="text-align: center;">{{indianDateFormat($row->purchase_date)}}</td>
                <td>{{Config::get('constants.purchase_register_mode')[$row->purchase_mode]}}</td>
                <td>{{$row->vendor_name}}</td>
                <td>{{$row->description}}</td>
                <td style="text-align: center;">{{$row->quantity}}</td>
                <td style="text-align: right;">{{formatCurrency($row->net_amount)}}</td>
                <td>{{$row->remarks}}</td>
              </tr>
              @php $total_net_amount += $row->net_amount; @endphp
              @endforeach
        
              <tr>
                <td colspan="6" style="border-collapse: collapse; border-top: 1px solid #000;"><b>Total Purchase</b></td>
                <td style="border-collapse: collapse; border-top: 1px solid #000;text-align: right;"><b>{{formatCurrency($total_net_amount)}}</b></td>
                <td style="border-collapse: collapse; border-top: 1px solid #000;">&nbsp;</td>
             
              </tr>
            </tbody>
          </table>
        </div>

          <!-- ADD A PAGINATION -->
        </div>
        @endsection
