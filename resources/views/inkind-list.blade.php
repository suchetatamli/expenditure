<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{$action_url}}">
  @csrf
  <div class="col-sm-4">
     <div class='form-group'>
            <label class="control-label">From Date</label>            
            <input type='text' name='from_date'  class='form-control date_range_class input_date' value='{{$from_date}}'/>      
            
        </div>
      </div>
      <div class="col-sm-4">
        <div class='form-group'>
            <label class="control-label">To Date</label>
              <input type='text' name='to_date'  class='form-control date_range_class input_date' value='{{$to_date}}'/>            
        </div>
      </div>
   
      <div class="col-sm-4">
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
        <th>Date</th>
        <th>Description</th>
        <th>Provided By</th>
        <th>Quantity (Unit Price)</th>
        <th>Total Value</th>
        <th>Remarks</th>
        <th>Action</th>
       </tr>
  </thead>
  <tbody>
    @php
    $me = getMyDetails('');
    $tot = 0;
    @endphp
    @foreach($result as $row)
      <tr>
        <td>{{ indianDateFormat($row->tran_date) }}</td>
        <td>{{$row->tran_description}}</td>
        <td>          
          {{$row->tran_source_name}}          
        </td>
        <td>{{round($row->tran_quantity,0)}} ({{$row->tran_rate}})</td>
        <td style="text-align: right;">{{formatCurrency($row->tran_amount)}}</td>
        <td>{{$row->tran_remarks}}</td>
        <td>
          <!-- To make sure we have read access, wee need to validate the privilege -->
          
          <a class="btn btn-xs btn-danger btn-delete" title="Delete" href="javascript:void(0);" 
          onclick="swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record data!',
            type: 'warning',
            showCancelButton: true,   
            confirmButtonColor: '#ff0000',   
            confirmButtonText: 'Yes!',  
            cancelButtonText: 'No',  
            closeOnConfirm: false 
          },
          function(){location.href='{{url("/admin/test/service-inkind/delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
        </td>
       </tr>
       @php
       $tot += $row->tran_amount;
       @endphp
    @endforeach

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: center; font-weight: bold;">Total</td>
        <td style="text-align: right; font-weight: bold;">{{formatCurrency($tot)}}</td>
        <td></td>
        <td></td>
       </tr>
  </tbody>
</table>
</div>
</div>
<!-- ADD A PAGINATION -->
<!-- <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p> -->
@endsection