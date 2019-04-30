@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>Day to Day Accounts of Election Expenditure</div>  

    <div class='panel-body' style="padding:20px 0px 0px 0px">

        <div class="print_area" id="print_area">

          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">                     

          <tr>
            <td colspan="8" align="left" valign="top" style="border-collapse:collapse;  border:1px solid #000; padding:5px; font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">Schedule- 4A</td>
  </tr>
          <tr>
            <td colspan="8" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height:15px;">Details of expenditure on campaign through print and electronic media including cable network, bulk SMS or Internet or social media, news items/TV/radio channel etc., including the paid news so decided by MCMC or voluntarily admitted by the candidate. The details should include the expenditure incurred on all such news items appearing in newspapers/TV/radio channels, owned by the candidate or by the political party sponsoring the candidate.</td>
  </tr>
          
          <tr>
            <td width="6%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">S. No</td>
            <td width="16%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Nature of medium (electronic / print) and duration</td>
            <td width="16%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Name and address of media provider (print /electronic /SMS / voice/ cable TV, social media etc.)</td>
            <td width="19%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Name and address of agency, reporter, stringer, company or any person to whom charges / commission etc. paid/ payable, if any</td>
            <td width="13%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Total Amount in Rs.</td>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Sources of Expenditure</td>
          </tr>
          <tr>
            <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Col. (3) +(4)</td>
            <td width="13%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By candidate/ agent</td>
            <td width="9%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By Pol. Party</td>
            <td width="8%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By others</td>
  </tr>
          
          <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">1</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">2</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">4</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">5</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">6</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">7</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">8</td>
          </tr>
          @if( count( $records ) > 0 )
          @php
            $i = 1;
            $grand_total = 0;
            $grand_total_candidate = 0;
            $grand_total_pol_party = 0;
            $grand_total_other = 0;
          @endphp
          @foreach ($records as $record)

          <tr>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $i }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->nature_of_medium }}-{{ $record->medium_duration }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->media_provider_name }}<br/>{{ $record->media_provider_address }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->agency_name }}<br/>{{ $record->agency_address }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->total_amount }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->candidate_or_agent }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->pol_party }}</td>
              <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->other }}</td>
            </tr>
            
          @php
              $i++;
              $grand_total += $record->total_amount;
              $grand_total_candidate += $record->candidate_or_agent;
              $grand_total_pol_party += $record->pol_party;
              $grand_total_other += $record->other;
            @endphp

          @endforeach 
        @endif
        <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; font-weight:bold;">Total</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Rs.{{ $grand_total }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Rs.{{ $grand_total_candidate }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Rs.{{ $grand_total_pol_party }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Rs.{{ $grand_total_other }}</td>
          </tr>
          
</table>
      
    </div>

    <div class='panel-footer'>
      <button id="print" class="btn btn-success" type="button"
            onclick="printDiv('print_area')">
        Print
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