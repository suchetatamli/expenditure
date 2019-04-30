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
        <th>Date</th> 
        <th>Voucher Reference</th>   
        <th>Voucher Filename</th> 
        <th>Voucher Remarks</th>           
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
    @php
    $sch = candidateScheduleReceipt();
    @endphp
      <tr>
        <td>{{indianDateFormat($row->tran_date)}}</td>
        <td>{{formatCurrency($row->tran_amount)}} @if($row->tran_purpose != NULL)paid for {{$row->tran_purpose}} @else paid for {{$sch[$row->schedule_name]}}@endif</td>
        <td>
        @if (!empty($row->vouchar_filename)) <a href="{{url('/')}}/{{$row->vouchar_filename}}" target="_blank">View File</a>
        @endif
        </td>
        <td>{{$row->vouchar_remarks}}</td>
       </tr>
    @endforeach
  </tbody>
</table>
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!} </p> 
</div>
</div>
<!-- ADD A PAGINATION -->

@endsection