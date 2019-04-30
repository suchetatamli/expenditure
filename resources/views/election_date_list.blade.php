<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

        <div class="table_listing">
          <div class="tbl_list_scrl">
          <table class='table table-striped table-bordered'>
            <thead>
              <tr>
                <th style="text-align: center;">Sl. No</th> 
                <th style="text-align: center;">Polling Date</th>
                <th style="text-align: center;">State</th>
                <th style="text-align: center;">Action</th> 
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
                <td style="text-align: center;">{{ indianDateFormat($row->election_date) }}</td>
                <td style="text-align: center;">{{ getStateNameById($row->state_id) }}</td>
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
                  function(){location.href='{{url("/admin/profile_edit/election-date-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
              </td>
              </tr>
              @endforeach
              @endempty
              
            </tbody>
          </table>

        </div>

          <!-- ADD A PAGINATION -->
        </div>
        @endsection
