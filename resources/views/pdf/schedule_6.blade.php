<div class="print_area" id="print_area">

<div class="tbl_scrl">         
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">                     

          <tr>
            <td colspan="9" align="left" valign="top" style="border-collapse:collapse;  border:1px solid #000; padding:5px; font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">Schedule- 6</td>
  </tr>
          <tr>
            <td colspan="9" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height:15px;">Details of expenditure on Campaign workers / agents and on candidates' booths (kiosks) outside polling stations for distribution of voter's slips</td>
  </tr>
 
          <tr>
            <td width="6%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">S. No</td>
            <td width="8%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Date and Venue</td>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Expenses on Campaign workers</td>
            <td width="12%" rowspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Total amt. incurred/ auth. {{Config::get('constants.text_labels.amount')}}</td>
            <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Sources of Expenditure</td>
          </tr>
          <tr>
            <td width="15%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Nature of Expenses</td>
            <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Rate</td>
            <td width="15%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">No. of workers / agents No. of kiosks</td>
            <td width="14%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By candidate/ agent <!-- {{Config::get('constants.text_labels.amount')}} --></td>
            <td width="11%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By Pol. Party <!-- {{Config::get('constants.text_labels.amount')}} --></td>
            <td width="9%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Amt. By others <!-- {{Config::get('constants.text_labels.amount')}} --></td>
          </tr>
          <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">1</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">2</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3a</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3b</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">3c</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">4</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">5</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">6</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">7</td>
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
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ indianDateFormat($record->date) }}<br/>{{ $record->venue }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->title }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->rate) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">{{ $record->no_agents_or_kiosks }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->total_amount) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->candidate_or_agent) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->pol_party) }}</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;">{{ formatCurrency($record->other) }}</td>
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
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total) }}</b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total_candidate) }}</b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total_pol_party) }}</b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b>{{ formatCurrency($grand_total_other) }}</b></td>

          </tr>
</table>

</div>
      
    </div>