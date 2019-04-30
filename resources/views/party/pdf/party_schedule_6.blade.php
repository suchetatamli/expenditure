<!--Schedule-6 start-->
<div class="tbl_scrl">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">
         <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Schedule-6</td>
            <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         </tr>
         <tr>
            <td colspan="6" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Any other expense(s) for General Party propaganda authorized/ incurred by Party Central Head Quarters</td>
         </tr>
         <tr>
            <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">S. No.</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">State</td>
            <td width="18%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Purpose</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date</td>
            <td width="21%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Details of items</td>
            <td width="21%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total Amount (including outstanding amt.)</td>
         </tr>        
         
         @php
         if(CRUDBooster::myPrivilegeId() == 4){ 
         $grand_total = 0;
         @endphp
         @foreach ($print_data as $pd)
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">{{$loop->iteration}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->state}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->purpose}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               {{indianDateFormat($pd->date)}}
            </td>
           <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->item_details}}</td>
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
      <!--Schedule-6 end-->