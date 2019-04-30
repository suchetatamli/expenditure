 <!--Schedule-3 start-->
 <div class="tbl_scrl">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">
         <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Schedule-3</td>
            <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         </tr>
         <tr>
            <td colspan="6" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Expense(s) on Media Advertisement (print and electronic, bulk sms, cable, website and TV Channel etc. )
               on General Party propaganda authorized/ incurred by Party Central Head Quarters
            </td>
         </tr>
         <tr>
            <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">S. No.</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">State</td>
            <td width="18%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of the payee</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of media
               (print/electronic/ sms.cable tv etc
            </td>
            <td width="21%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date/s (of print/telecast<br>
               /sms
            </td>
            <td width="14%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total Amount (including outstanding amt.)</td>
         </tr>
         @php
         if(CRUDBooster::myPrivilegeId() == 4){ 
         $grand_total = 0;
         @endphp
         @foreach ($print_data as $pd)
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">{{$loop->iteration}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->state}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->name_payee}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               {{$pd->name_media}}
            </td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               {{indianDateFormat($pd->date)}}
            </td>
            
            
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($pd->total_amount+$pd->outstanding_amount)}}</td>
         </tr>
         @php $grand_total += $pd->total_amount+$pd->outstanding_amount; @endphp
         @endforeach
         <tr>
            <td colspan="5" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($grand_total)}}</td>
         </tr>
         @php }else{ @endphp
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;"></td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
         </tr>
         <tr>
            <td colspan="5" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
         </tr>
         @php }@endphp
      </table>
   </div>
      <!--Schedule-3 end-->