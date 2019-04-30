   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:20px;" id="schState">
      <tr>
            <td align="left" width="20%" valign="top" style="border-collapse:collapse; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;  ">Name of the State :</td>
            <td align="left" width="80%" valign="top" style="border-collapse:collapse; border-bottom: 1px dashed #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$state_name}}</td>
         </tr>
   </table>
   <style>
      @media print {
        #schState {
          display: none;
        }
      }
      @media pdf {
        #schState {
          display: none;
        }
      }
   </style>
<!--Schedule-15 start-->
<div class="tbl_scrl">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
         <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Schedule-18</td>
            <td colspan="5" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         </tr>
         <tr>
            <td colspan="7" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total lump sum payment (s) to Candidate(s) of the party or other candidate(s) if, any authorized/ incurred by State/ Distt./ Local Units, either in cash or by Instruments like- cheque/ DD/PO/RTGS/Fund Transfer etc. If State/ Distt./ Local Units makes payment (s) to candidate(s) on more than one occasion then date wise details are to be mentioned.</td>
         </tr>
         <tr>
            <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">S. No.</td>
            <td width="17%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of the State / No. and
               Name of the Assemby/
               Parl. Constituency
            </td>
            <td width="14%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of Candidate and name of Party</td>
            <td width="14%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date(s) of payment</td>
            <td width="13%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Cash
               Amount
            </td>
            <td width="15%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Cheq / DD no. etc. and Date</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total amount paid</td>
         </tr>
         @php
         if(CRUDBooster::myPrivilegeId() == 5){ 
         $grand_total = 0;
         @endphp
         @foreach ($print_data as $pd)
         @php $total_amount = $pd->amount_cash + $pd->amount_noncash; @endphp
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">{{$loop->iteration}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->state}} / {{$pd->no_name_constituency}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->name}} / {{$pd->party_name}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               {{indianDateFormat($pd->date)}}
            </td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($pd->amount_cash)}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
              @if($pd->cash == 'Cheque') 
              Ch no. {{$pd->dd_or_cheque_no}} dt. {{indianDateFormat($pd->date_of_instruction)}} 
              @elseif($pd->cash == 'DD')
              DD no. {{$pd->dd_or_cheque_no}} dt. {{indianDateFormat($pd->date_of_instruction)}} 
              @elseif($pd->cash == 'PO')
              PO no. {{$pd->dd_or_cheque_no}} dt. {{indianDateFormat($pd->date_of_instruction)}} 
              @elseif($pd->cash == 'RTGS')
              Ref No. {{$pd->dd_or_cheque_no}} dt. {{indianDateFormat($pd->date_of_instruction)}}
              @else
              {{$pd->dd_or_cheque_no}} - {{indianDateFormat($pd->date_of_instruction)}} 
              @endif
            </td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_amount)}}</td>
         </tr>
         @php $grand_total += $total_amount; @endphp
         @endforeach
         <tr>
         <td colspan="6" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($grand_total)}}</td>
         </tr>
         @php }else{ @endphp
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;"></td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               {{Config::get('constants.text_labels.nil')}}
            </td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($pd->amount_cash)}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
              {{Config::get('constants.text_labels.nil')}}
            </td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
         </tr>
         <tr>
         <td colspan="6" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
         </tr>
          @php } @endphp
      </table>
   </div>
      <!--Schedule-15 end-->