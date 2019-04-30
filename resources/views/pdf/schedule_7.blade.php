<div class="print_area" id="print_area">
          
<div class="tbl_scrl">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">                     
          
          
          <tr>
            <td colspan="6" align="left" valign="top" style="border-collapse:collapse;  border:1px solid #000; padding:5px; font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">Schedule- 7</td>
  </tr>
          <tr>
            <td colspan="6" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height:15px;">Details of Amount of own fund used for the election campaign</td>
  </tr>
                     
          
          <tr>
            <td width="8%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">S. No.</td>
            <td width="8%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Date</td>
            <td width="9%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Cash</td>
            <td width="40%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">DD/ Cheque no. etc. with details of drawee bank</td>
            <td width="20%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Total Amount {{Config::get('constants.text_labels.amount')}}</td>
            <td width="15%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Remarks</td>
          </tr>
          <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">1</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">2</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">4</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">5</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">6</td>
          </tr>
        </tr>
          @if( count( $records ) > 0 )
          @php
            $i = 1;
            $grand_total = 0;
          @endphp
          @foreach ($records as $record)  

          <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $i }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ indianDateFormat($record->date) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->cash }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->dd_or_cheque_no }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->total_amount) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->remarks }}</td>
          </tr>
          @php
          $i++;
          $grand_total += $record->total_amount;
       
        @endphp

      @endforeach 
    @endif

          <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; font-weight:bold;">Total</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total) }}</b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
          </tr>
</table>

</div>
      
    </div>