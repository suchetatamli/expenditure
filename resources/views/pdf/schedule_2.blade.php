<div class="print_area" id="print_area">

      <div class="tbl_scrl">

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">                     
          
          
          <tr>
            <td colspan="7" align="left" valign="top" style="border-collapse:collapse;  border:1px solid #000; padding:5px; font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">Schedule- 2</td>
  </tr>
          <tr>
            <td colspan="7" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height:15px;">Expenditure in public meeting rally, procession etc. with the Star Campaigner(s) as apportioned to candidate (ie: other than those for general party propaganda)</td>
  </tr>
          <tr>
            <td width="6%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">S. No</td>
            <td width="16%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Date and Venue</td>
            <td width="28%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Name of the Star Campaigner(s) &amp; Name of Party</td>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amount of Expenditure on public meeting rally, procession etc. with the Star Campaigner(s) apportioned to the candidate (As other than for general party propaganda) {{Config::get('constants.text_labels.amount')}}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Remarks, if any</td>
          </tr>
          
          <tr>
            <td width="6%" rowspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">1</td>
            <td width="16%" rowspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">2</td>
            <td width="28%" rowspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3</td>
            <td colspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">4</td>
            <td width="17%" rowspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">5</td>
          </tr>

          <tr>
            <td colspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Source of Expenditure</td>
          </tr>
          <tr>
            <td width="11%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amount by Candidate/Agent <!-- {{Config::get('constants.text_labels.amount')}} --></td>
            <td width="11%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amount by Political Party <!-- {{Config::get('constants.text_labels.amount')}} --></td>
            <td width="11%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amount by Others <!-- {{Config::get('constants.text_labels.amount')}} --></td>
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
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ indianDateFormat($record->date) }}<br>{{ $record->venue }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->name_of_star_campaigne }} @if($record->star_campaign_party)( {{$record->star_campaign_party}} )@endif</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->candidate_or_agent) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->pol_party) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->other) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->remarks }}</td>
          </tr>
           @php
                $i++;
                $grand_total += $record->total_amount;

              @endphp

            @endforeach 
          @endif
          <tr>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; font-weight: bold;">Total</td>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total) }}</b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
          </tr>
</table>
        
</div>

      </div>