<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{$action_url}}">
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
                    <label class="control-label">Search by keyword</label>
                      <input type='text' name='srch_key'  class='form-control' value='{{$srch_key}}'/>            
                </div>
              </div>
   
      <div class="col-sm-3">
      <div class='form-group'>
        <label>&nbsp;</label>
        <button class="btn btn-sm btn-success" type="submit">Search</button>
        <button class="btn btn-sm btn-waring" type="button" onclick="window.location='{{$action_url}}'">Reset</button>
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
        <th>Sl. No</th>
        <th>Date</th>    
        <th>Mode</th>
        <th>Vendor Name</th>
        <th>Description of Items</th>    
        <th>Quantity</th> 
        <th>Net Amount</th>    
        <th>Remarks</th>     
        <th>Action</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($records as $row)
      <tr>
        <td align="center">{{$loop->iteration}}</td>
        <td align="center">{{indianDateFormat($row->purchase_date)}}</td>
        <td align="center">{{Config::get('constants.purchase_register_mode')[$row->purchase_mode]}}</td>
        <td align="center">{{$row->vendor_name}}</td>
        <td align="center">{{$row->description}}</td>
        <td align="center">{{$row->quantity}}</td>
        <td align="right">{{formatCurrency($row->net_amount)}}</td>
        <td align="center">{{$row->remarks}}</td>
        <td align="center">
            <a class="btn btn-xs btn-danger btn-delete" title="Delete" href="javascript:void(0);" 
            onclick="swal({
              title: 'Want to delete this item?',
              text: 'You will not be able to recover this record data!',
              type: 'warning',
              showCancelButton: true,   
              confirmButtonColor: '#ff0000',   
              confirmButtonText: 'Yes!',  
              cancelButtonText: 'No',  
              closeOnConfirm: false 
            },
            function(){location.href='{{url("/admin/candidate_transaction/purchase-register-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
          </td>
      </tr>
      @endforeach
      <tr>
        <td></td>
        <td></td>    
        <td></td>
        <td></td>
        <td></td>    
        <td style="text-align: center; font-weight: bold;">Total</td> 
        <td style="text-align: right; font-weight: bold;">{{formatCurrency($total_amount)}}</td>    
        <td></td>     
        <td></td> 
      </tr>
    </tbody>
  </table>
<p>{!! urldecode(str_replace("/?","?",$records->appends(Request::all())->render())) !!}</p> 
  <!-- ADD A PAGINATION -->
</div>
</div>
@endsection
