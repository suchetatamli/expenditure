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
        <div class="form-group">
            <label class="control-label">Search by keyword</label>
              <input type="text" name="srch_key" class="form-control" value="{{$srch_key}}">            
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
        <th>State</th>
        <th>Expense Type</th>
        <th>Schedule No.</th>
        <th>Payment Type</th>
        <th>Amount Paid {{Config::get('constants.text_labels.amount')}}</th>
        <th>Amount Outstanding {{Config::get('constants.text_labels.amount')}}</th>
        <!-- <th>Amount Outstanding{{Config::get('constants.text_labels.amount')}}</th> -->
        <!-- <th>Bank Name</th> -->
          
        <th>Action</th>    
       </tr>
  </thead>
  <tbody>
  @if (sizeof($result) >0)
    @foreach($result as $row)
      <tr>
        <td>{{ indianDateFormat($row->tran_date) }}</td>
        <td><?php echo getStateNameById($row->state_id); ?></td>
        <td>{{ $row->tran_purpose }}</td>
        <td>{{ $row->tag_schedule }}</td>
        <td>
          @if($row->tran_method == 'chq'){{'Cheque'}}
          @elseif($row->tran_method == 'dd') {{'Draft'}}
          @else {{'Cash'}}
         @endif
        </td>
        <td style="text-align: right;">{{formatCurrency($row->tran_amount)}}</td>
        <td class="text-right">{{formatCurrency($row->tran_amount_outstanding)}}</td>
        <!-- <td>{{ $row->receipt_no}}</td> -->
        <td>

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
          function(){location.href='{{url("/admin/party_income/party-transaction-register-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
        </td>
        <?php $totalPaid += $row->tran_amount;?>
        <?php $totalOutstanding += $row->tran_amount_outstanding;?>
       </tr>
    @endforeach
      <tr>
        <td colspan="5"><b>Total Amount</b></td>      
        <td class="text-right"><b>{{formatCurrency($totalPaid)}}</b></td>
        <td class="text-right"><b>{{formatCurrency($totalOutstanding)}}</b></td>
        <td></td>
      </tr>
   @else 
   <td>No Data to Show</td>
   @endif 
  </tbody>
</table>
 <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p> 
</div>
</div>
<!-- ADD A PAGINATION -->
@endsection