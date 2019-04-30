@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
  <div class='panel-heading'>Bank Register for Maintenance of Day to Day Accounts by Contesting Candidates
</div>  


  <div class='panel-body' style="padding:20px 0px 0px 0px">
     <!-- pdf area -->
  @include('pdf.e1_part_c')
  <!-- pdf area -->

    
                          <div class='panel-footer'>
                            <button id="print" class="btn btn-success" type="button"
                            onclick="printDiv('print_area')">
                            Print
                          </button>
                           <button id="print" class="btn btn-warning" type="button"
                           onclick="window.location = '{{url()->current().'-pdf'}}'">
                            Download PDF
                          </button>
                        </div>
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