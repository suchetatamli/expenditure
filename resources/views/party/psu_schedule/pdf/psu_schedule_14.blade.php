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
  <div class="tbl_scrl"> 
      <!--Schedule-14 start-->
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
         <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Schedule-14</td>
            <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         </tr>
         <tr>
            <td colspan="6" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Expense(s) on Media Advertisement (print and electronic, bulk sms, cable, website and TV Channel etc. )
               on General Party propaganda authorized/ incurred by State/ Distt./ Local Units
            </td>
         </tr>
         <tr>
            <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">S. No.</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">State</td>
            <td width="18%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of the payee</td>
            <td width="20%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of media (print/electronic/sms, cable tv, website, TV Channeletc</td>
            <td width="21%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date/s (of print/telecast/sms etc.)</td>
            <td width="21%" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total Amount (including outstanding amt.)</td>
         </tr>
         @php
         if(CRUDBooster::myPrivilegeId() == 5){ 
         $grand_total = 0;
         @endphp
         @foreach ($print_data as $pd)

         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">{{$loop->iteration}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->state}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->name_payee}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$pd->name_media}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{indianDateFormat($pd->date)}}</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($pd->total_amount + $pd->outstanding_amount )}}</td>
         </tr>
         @php $grand_total += ($pd->total_amount + $pd->outstanding_amount); @endphp
         @endforeach
         <tr>
            <td colspan="5" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($grand_total)}}</td>
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
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
         </tr>
         @php }@endphp
      </table>
      <!--Schedule-14 end-->
   </div>
   