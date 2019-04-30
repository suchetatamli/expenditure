@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
 <div class='panel-heading'>{{$layout_title}}</div>  


 <div class='panel-body' style="padding:20px 0px 0px 0px">
 <div style="padding: 10px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
         <td align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">State Wise Details of Election Expenses</td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="20%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px;"> Select State</td>
                  <td width="80%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">
                     <form action="" name="srchForm">
                        <select name="state_id" class="form-control" onchange="srchForm:submit();">
                           @foreach($states as $st)
                           <option value="{{$st->state_id}}" @php echo ($selected_id == $st->state_id) ? 'selected': ''; @endphp>{{$st->state_name}}</option>
                           @endforeach
                        </select>
                     </form>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td style="font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
   </table>
   </div>

   <div class="print_area" id="print_area">
      @include('party.psu_schedule.pdf.psu_schedule_16')
   </div>
</div>


<div class='panel-footer'>
   <button id="print" class="btn btn-success" type="button"
   onclick="printDiv('print_area')">
   Print
</button>
<button id="print" class="btn btn-warning" type="button"
onclick="window.location = '{{$pdf_link}}'">
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

