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

        <button id="print" style="display: none;" class="btn btn-success" type="button"
            onclick="printDiv('print_area')">
        Print
    </button>
      </div>

      </div>
      </form>
</div>
</div>

<!-- <div class="print_area" id="print_area"> -->
<div class="table_listing" id="print_area">
  <div class="tbl_list_scrl">
<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th style="text-align: center;">Date</th>        
        <th style="text-align: center;">Name of Donor</th>    
        <th style="text-align: center;">Amount {{Config::get('constants.text_labels.amount')}}</th>    
        <th style="text-align: center;">Action</th>    
       </tr>
  </thead>
  <tbody>
    <?php $total = 0;?>
    @foreach($result as $row)
      <tr>
        <td style="text-align: center;">{{ indianDateFormat($row->tran_date) }}</td>        
        <td>{{$row->tran_source_name}}</td>
        <td style="text-align: right;">{{formatCurrency($row->tran_amount)}}</td>
        <td style="text-align: center;">

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
          function(){location.href='{{url("/admin/candidate_transaction/party-person-cash-deposit-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
        </td>
       </tr>
       <?php $total += $row->tran_amount;?>
    @endforeach
    <tr>
        <td style="text-align: center;"><b>Total</b></td>        
        <td></td>
        <td style="text-align: right;"><b>{{formatCurrency($total)}}</b></td>
        <td></td>
    </tr>
  </tbody>
</table>
 <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p> 
</div>
</div>
<!-- </div> -->
<!-- ADD A PAGINATION -->

<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

@endsection