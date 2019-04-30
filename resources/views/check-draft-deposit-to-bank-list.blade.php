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
        <th style="text-align: center;">Date</th>
        <th style="text-align: center;">Transaction Method</th>
        <th style="text-align: center;">Reference No.</th>
        <th style="text-align: center;">Amount {{Config::get('constants.text_labels.amount')}}</th>
        <th style="text-align: center;">Details</th>
        <th style="text-align: center;">Action</th>
       </tr>
  </thead>
  <tbody>
    <?php $totAmt = 0; ?>
    @foreach($result as $row) 
    <?php $totAmt += $row->tran_amount; ?>
      <tr>
        <td style="text-align: center;">{{ indianDateFormat($row->tran_date) }}</td>
        <td style="text-align: center;">{{ucwords(str_replace('_',' ',$row->tran_method))}}</td>
        <td style="text-align: center;">{{$row->receipt_no}}</td>
        <td style="text-align: right;">{{formatCurrency($row->tran_amount)}}</td>
        <td style="text-align: center;">
            <?php echo getIssueType($row->tran_source); ?>

        </td>
        <td style="text-align: center;">
          <!-- To make sure we have read access, wee need to validate the privilege -->
          
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
          function(){location.href='{{url("/admin/candidate_transaction/check-draft-payorder-to-bank-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
        </td>
       </tr>
    @endforeach

      <tr>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"><b>Total</b></td>
        <td style="text-align: right;"><b>{{formatCurrency($totAmt)}}</b></td>
        <td style="text-align: center;">  </td>
        <td style="text-align: center;">  </td>
       </tr>

  </tbody>
</table>
 <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p> 
</div>
</div>
<!-- ADD A PAGINATION -->
@endsection