<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

<div class="table_listing">
   <div class="tbl_list_scrl">
      <table class='table table-striped table-bordered'>
         <thead>
            <tr>
               <th>Sl. No</th>
               <th>State Name</th> 
               <th>Action</th> 
            </tr>
         </thead>
         <tbody>
            @php $total_net_amount = 0; @endphp
            @if(sizeof($records) == 0)
            <tr>
               <td>No record exists</td>
            </tr>
            @else
            @foreach($records as $key=>$row)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$row->state_name}}</td>
               <td>
                  @if($key > 0)
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
                  function(){location.href='{{url("/admin/profile_edit/state-delete/$row->id")}}';})"><i class="fa fa-trash"></i></a>
                  @endif
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
