@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>{{$layout_title}}</div>  
    
    
    <div class='panel-body' style="padding:20px 0px 0px 0px">
      <div class="print_area" id="print_area">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">State Wise Details of Election Expenses</td>
   </tr>
   <tr>
      <td style="font-family: Arial; font-size: 14px; line-height: 20px;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td width="20%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px;"> Name of the State</td>
               <td width="80%" align="left" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">
                  <select name="state_id" class="form-control">
                     @foreach($states as $st)
                     <option value="{{$st->state_id}}">{{$st->state_name}}</option>
                     @endforeach
                  </select>
               </td>
            </tr>
         </table>
      </td>
   </tr>
   <tr>
      <td style="font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
   </tr>
</table>

<!--Schedule-12 start-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
   <tr>
      <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Schedule-12</td>
      <td colspan="5" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
   </tr>
   <tr>
      <td colspan="7" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Travel expenses of Star Campaigner(s) authorized/ incurred by State/ Distt./ Local Units</td>
   </tr>
   <tr>

      <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">S. No.</td>
      <td width="13%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Venue</td>
      <td width="14%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date of the meeting</td>
      <td width="15%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name(s) of the star campaigner(s)</td>
      <td width="16%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Mode of Travel (Taxi, Helicopter, Aircraft etc.)</td>
      <td width="16%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of the payee in case of<br>
         Helicopter or<br>
         Aircraft
      </td>
      <td width="19%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total Amount (including outstanding amt.)</td>
   </tr>
   <tr>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">1</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
   </tr>

   <tr>
      <td colspan="6" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
   </tr>
</table>
      <!--Schedule-12 end-->
        </div>

        
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

      