@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>{{Config::get('constants.text_labels.schedule_heading')}}</div>  
    
    
    <div class='panel-body' style="padding:20px 0px 0px 0px">

         <!-- pdf area -->
  @include('pdf.schedule_7')
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