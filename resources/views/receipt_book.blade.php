<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{url('admin/register_reports/receipt-book')}}" id="">
  @csrf
  <div class="col-sm-4">
     <div class='form-group'>
            <label class="control-label">From Date</label>            
            <input type='text' name='from_date' required class='form-control date_range_class input_date' value='{{$from_date}}'/>      
            
        </div>
      </div>
      <div class="col-sm-4">
        <div class='form-group'>
            <label class="control-label">To Date</label>
              <input type='text' name='to_date' required class='form-control date_range_class input_date' value='{{$to_date}}'/>            
        </div>
      </div>
      <div class="col-sm-4">
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
                <th>Name of Donor</th>    
                <th>Mode</th>
                <th style="text-align: right;">Total Amount {{Config::get('constants.text_labels.amount')}}</th>    
                <th>Remarks</th> 
              </tr>
            </thead>
            <tbody>
              @php $total_net_amount = 0; @endphp
              @if(sizeof($records) == 0)
              <tr>
              <td>No record exists</td>
              </tr>
              @else
                @foreach($records as $row)
              <tr>
                <td style="text-align: center;">{{$loop->iteration}}</td>
                <td style="text-align: center;">{{indianDateFormat($row->tran_date)}}</td>
                <td>{{$row->tran_source_name}}</td>
                <td>{{ucwords(str_replace('_',' ',$row->tran_method))}}</td>
                <td style="text-align: right;">{{formatCurrency($row->tran_amount)}}</td>
                <td>{{$row->tran_remarks}}</td>
              </tr>
              @php $total_net_amount += $row->tran_amount; @endphp
              @endforeach
              <tr>
                <td colspan="4" style="border-collapse: collapse; border-top: 1px solid #000;"><b>Total Receipt</b></td>
                <td style="border-collapse: collapse; border-top: 1px solid #000; text-align: right;"><b>{{formatCurrency($total_net_amount)}}</b></td>
                <td style="border-collapse: collapse; border-top: 1px solid #000;"></td>
              </tr>
              @endempty
              
            </tbody>
          </table>
        </div>

          <!-- ADD A PAGINATION -->
        </div>
        @endsection
