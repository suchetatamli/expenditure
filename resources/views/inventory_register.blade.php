<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{url('admin/register_reports/inventory-register')}}" id="">
  @csrf
  <div class="col-sm-3">
     <div class='form-group'>
            <label class="control-label">From Date</label>            
            <input type='text' name='from_date' readonly="" class='form-control input_date date_range_class' value='{{$from_date}}'/>      
            
        </div>
      </div>
      <div class="col-sm-3">
        <div class='form-group'>
            <label class="control-label">To Date</label>
              <input type='text' name='to_date' readonly="" class='form-control input_date date_range_class' value='{{$to_date}}'/>            
        </div>
      </div>
      <div class="col-sm-3">
        <div class='form-group'>
            <label class="control-label">Material</label>
              <input type='text' name='material' class='form-control input_text' value='{{$material}}'/>            
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
                <th>Material</th>    
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: right;">Value of Stock {{Config::get('constants.text_labels.amount')}}</th>    
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
                <td style="text-align: center;">{{indianDateFormat($row->purchase_date)}}</td>
                <td>{{$row->description}}</td>
                <td style="text-align: center;">{{$row->quantity}}</td>
                <td style="text-align: right;">{{formatCurrency($row->net_amount)}}</td>
                <td>{{$row->remarks}}</td>
              </tr>
              @php $total_net_amount += $row->net_amount; @endphp
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
