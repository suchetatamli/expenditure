
@if($applicable_flag)
<div class="annexure_tbl">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
         <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">PART - B</td>
      </tr>
      <tr>
         <td>&nbsp;</td>
      </tr>
      <tr>
         <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="2%" align="left" valign="top">6.</td>
                  <td align="left" valign="top">Details of Election Expenditure incurred/authorized by State Unit of the party or by state party headquarter</td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                           <td width="52%">including all district level and local units for the State of</td>
                           <td width="48%" style="border-bottom:1px dashed #000;">
                              {{ $state_name }}
                              {{-- @php $sts = array(); $s = getUserStates(); 
                              foreach($s as $si)
                              {
                                 array_push($sts,$si->state_name);
                              }
                              echo implode($sts,', '); 
                              @endphp  --}}
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
               <tr>
                  <td align="left" valign="top">I.</td>
                  <td align="left" valign="top">If political party incurs/ authorizes election expenses in more than one state, the details for each state is to be given in separate sheet as per this pro- forma,</td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
               <tr>
                  <td align="left" valign="top">II.</td>
                  <td align="left" valign="top">The state political party having headquarters within the state shall submit report in this pro-forma.</td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td>&nbsp;</td>
      </tr>
   </table>
</div>



<!--page 6.1 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <?php foreach($bank_details as $Val){ $bkBal = $bkBal+$Val->balance;} ?>
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.1</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">a. Opening balance of State Unit (including district level units and local units)<br>
            ( on the date of announcement of election)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($cash_in_hand)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(ii) Bank balance<br>(Please mention name of the bank and branch)<br></td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right; vertical-align: top;">{{formatCurrency($bkBal)}}</td>
      </tr>
      @if(sizeof($bank_details)>0)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Bank Name</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @foreach($bank_details as $Val)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         @if($Val->branch_name)
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$Val->bank_name." (Branch-".$Val->branch_name.")"}}</td>
         @else
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$Val->bank_name}}</td>
         @endif
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{ formatCurrency($Val->balance)}}</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @endforeach
      @endif

      @php $total_61 = $cash_in_hand + $bkBal; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;" colspan="2">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_61)}}</td>
      </tr>
   </table>
</div>
<!--page 6.1 end-->



<!--page 6.2 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.2</td>
         <td colspan="3" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross receipts from all sources from the date of announcement of election to the date of completion of election by state unit including district level units and local units in the state</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" colspan="2" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($gross_cash_in_hand)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" colspan="2" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque or draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($cheque_in_hand)}}</td>
      </tr>
      <?php   foreach($in_kind as $Inkind) {  $inKindBalance = $inKindBalance + $Inkind->tran_amount; } ?>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(iii) In kind (Received complimentary goods or services from any person/entity)<br>(Please mention notional value of such item- goods or services such as helicopter services etc. received as complimentary from any person /entity)<br></td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right; vertical-align: top;">{{formatCurrency($inKindBalance)}}</td>
      </tr>
      @if(sizeof($in_kind)>0)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Details</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">National Value</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @foreach($in_kind as $Inkind)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{!!$Inkind->tran_description!!}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{ formatCurrency($Inkind->tran_amount)}}</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @endforeach
      @endif
      @php $total_62 = $gross_cash_in_hand + $cheque_in_hand + $inKindBalance; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" colspan="2" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_62)}}</td>
      </tr>
   </table>
</div>
<!--page 6.2 end-->



<!--page 6.3 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.3</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred / authorized by State Unit (including district level units and local units) for General Party propaganda (from the date of announcement of election to the date of completion of election)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description of Gross expenditure by State Unit</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($tran_cash)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque/ draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($tran_cheque)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expenditure authorized, but remaining outstanding on date of completion of election</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($outStandingsPP)}}</td>
      </tr>
      @php $total_63 = ($tran_cash + $tran_cheque + $outStandingsPP); @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_63)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Break up of expenditure for general party propaganda incurred by State Unit (including
            District level Units and local units)
         </td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Travel expenses on Star Campaigners incurred by state unit<br>
            (Details to be enclosed in format given in Schedule- 12)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s12_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Travel expense on Other leaders by state unit<br>
            (Details to be enclosed in format given in Schedule- 13)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s13_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expense on Media Advertisement (print and electronic, bulk sms, cable, website and TV Channel etc.) on General Party propaganda by state unit<br>
            (Details to be enclosed in format given in Schedule- 14)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s14_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv) Expense on Publicity Materials including posters, banners, badges, stickers, arches, gates, cutouts, hoardings, flags etc for general party propaganda by state unit<br>
            (Details to be enclosed in format given in Schedule- 15)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s15_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Expense on Public meetings/processions/Rally etc. for general party propaganda by Sate Unit (Details to be enclosed in format given in Schedule- 16)</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s16_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(vi) Any other expense for General Party propaganda by Sate Unit<br>
            (Details to be enclosed in format given in Schedule- 17)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s17_total)}}</td>
      </tr>
      @php $total_63b = $s12_total + $s13_total + $s14_total + $s15_total + $s16_total + $s17_total; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_63b)}}</td>
      </tr>
   </table>
</div>
<!--page 6.3 end-->



<!--page 6.4 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.4</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred or authorized by State Unit for Candidate(s) including District level Units and local units attributable to candidate(s) (other than for general party propaganda)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Total lump sum payment(s) to Candidate(s) of the party or other candidate(s) authorized/ incurred by State Unit, either in cash or by Instruments like- cheque/ DD/PO/RTGS/Fund Transfer etc.<br>
            (Details to be enclosed in format given in Schedule- 18)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s18_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii)Total Expense on Media Advertisement (print and electronic, bulk sms, cable, website,<br>
            TV Channel etc.) for the candidate(s) with photo or name of candidate (s) by state Unit<br>
            (Details to be enclosed in format given in Schedule- 19)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s19_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Total expense on Publicity Materials (like posters, banners, cut-outs, election materials etc) with photo and/or name of the candidate(s)by state Unit<br>
            (Details to be enclosed in format given in Schedule- 20)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s20_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv)Total Expense by state Unit (Other than general party propaganda) on
            barricades /audio etc /hired vehicles for the audience /supporter at the rally of Star
            Campaigners with candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 21)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s21_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Any other expense for the candidate(s) by state Unit<br>
            (Details to be enclosed in format given in Schedule- 22)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($s22_total)}}</td>
      </tr>
      @php $total_64a = $s18_total + $s19_total + $s20_total + $s21_total + $s22_total; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on candidate (s)</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_64a)}}</td>
      </tr>
   </table>
</div>
<!--page 6.4 end-->



<!--page 6.5 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.5</td>
         <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total lump sum amount given by State Unit of the Party (including the districts and local units) to Other party(s) for election expenses. If political party makes payment (s) on more than one occasion then date wise details are to be mentioned.</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="45%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of State Unit Of Party to which payment made/ Name of Other Political Party (if any)</td>
         <td width="20%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date(s) of
            Payment
         </td>
         <td width="20%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Cash, Cheq / DD etc no.</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>

      @php $total65 = 0;@endphp
      @foreach($lump_sum_data as $lsd)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$loop->iteration}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$lsd->tran_receiver_name}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{indianDateFormat($lsd->tran_date)}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
            @php echo substr($lsd->tran_method,1,3) == 'ash' ? 'Cash' : $lsd->receipt_no; @endphp
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($lsd->tran_amount)}}</td>
      </tr>
      @php $total65 += $lsd->tran_amount; @endphp
      @endforeach
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="3" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total65)}}</td>
      </tr>
   </table>
</div>
<!--page 6.5 end-->


<!--page 6.6 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.6</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">a. Closing Balance of State Unit of the Party ( including the districts and local units) on the completion of election</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($cashBalLast)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(ii) Bank balance<br>(Please mention name of the bank and branch)<br></td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($nonCashBalLast)}}</td>
      </tr>
      @if(sizeof($bank_details)>0)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Bank Name</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @foreach($bank_details as $Val)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:hidden; border-bottom:0px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         @if($Val->branch_name)
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$Val->bank_name." (Branch-".$Val->branch_name.")"}}</td>
         @else
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$Val->bank_name}}</td>
         @endif
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{ formatCurrency($Val->closing_balance)}}</td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;border-top:hidden;">&nbsp;</td>
      </tr>
      @endforeach
      @endif
      @php  $total_66 = $cashBalLast + $nonCashBalLast; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;" colspan="2">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_66)}}</td>
      </tr>
   </table>
</div>
<!--page 6.6 end-->

@else
<!-- IF THIS SECTION NOT APPLICABLE -->

<div class="annexure_tbl">

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
         <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">PART - B</td>
      </tr>
      <tr>
         <td>&nbsp;</td>
      </tr>
      <tr>
         <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="2%" align="left" valign="top">6.</td>
                  <td align="left" valign="top">Details of Election Expenditure incurred/authorized by State Unit of the party or by state party headquarter  </td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                           <td width="52%">including all district level and local units for the State of</td>
                           <td width="48%" style="border-bottom:1px dashed #000;"></td>
                        </tr>
                     </table>
                  </td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
               <tr>
                  <td align="left" valign="top">I.</td>
                  <td align="left" valign="top">If political party incurs/ authorizes election expenses in more than one state, the details for each state is to be given in separate sheet as per this pro- forma,</td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
               <tr>
                  <td align="left" valign="top">II.</td>
                  <td align="left" valign="top">The state political party having headquarters within the state shall submit report in this pro-forma.</td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td>&nbsp;</td>
      </tr>
   </table>
</div>



<!--page 6.1 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.1</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Opening balance of State Unit (including district level units and local units)<br>
            ( on the date of announcement of election)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Bank balance<br>
            (Please mention name of the bank and branch)              

         </td>

         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.1 end-->



<!--page 6.2 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.2</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross receipts from all sources from the date of announcement of election to the date of completion of election by state unit including district level units and local units in the state</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque or draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) In kind (Received complimentary goods or services from any person/entity)<br>
            (Please mention notional value of such item- goods or services such as 
            helicopter services etc. received as complimentary from any person /entity)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.2 end-->



<!--page 6.3 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.3</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred / authorized by State Unit (including district level units and local units) for General Party propaganda (from the date of announcement of election to the date of completion of election)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description of Gross expenditure by State Unit</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque/ draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expenditure authorized, but remaining outstanding on date of completion of election</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Break up of expenditure for general party propaganda incurred by State Unit (including
            District level Units and local units)
         </td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Travel expenses on Star Campaigners incurred by state unit<br>
            (Details to be enclosed in format given in Schedule- 12)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Travel expense on Other leaders by state unit<br>
            (Details to be enclosed in format given in Schedule- 13)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expense on Media Advertisement (print and electronic, bulk sms, cable, website and TV Channel etc.) on General Party propaganda by state unit<br>
            (Details to be enclosed in format given in Schedule- 14)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv) Expense on Publicity Materials including posters, banners, badges, stickers, arches, gates, cutouts, hoardings, flags etc for general party propaganda by state unit<br>
            (Details to be enclosed in format given in Schedule- 15)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Expense on Public meetings/processions/Rally etc. for general party propaganda by Sate Unit (Details to be enclosed in format given in Schedule- 16)</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(vi) Any other expense for General Party propaganda by Sate Unit<br>
            (Details to be enclosed in format given in Schedule- 17)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.3 end-->



<!--page 6.4 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.4</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred or authorized by State Unit for Candidate(s) including District level Units and local units attributable to candidate(s) (other than for general party propaganda)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Total lump sum payment(s) to Candidate(s) of the party or other candidate(s) authorized/ incurred by State Unit, either in cash or by Instruments like- cheque/ DD/PO/RTGS/Fund Transfer etc.<br>
            (Details to be enclosed in format given in Schedule- 18)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii)Total Expense on Media Advertisement (print and electronic, bulk sms, cable, website,<br>
            TV Channel etc.) for the candidate(s) with photo or name of candidate (s) by state Unit<br>
            (Details to be enclosed in format given in Schedule- 19)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Total expense on Publicity Materials (like posters, banners, cut-outs, election materials etc) with photo and/or name of the candidate(s)by state Unit<br>
            (Details to be enclosed in format given in Schedule- 20)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv)Total Expense by state Unit (Other than general party propaganda) on
            barricades /audio etc /hired vehicles for the audience /supporter at the rally of Star
            Campaigners with candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 21)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Any other expense for the candidate(s) by state Unit<br>
            (Details to be enclosed in format given in Schedule- 22)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on candidate (s)</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.4 end-->



<!--page 6.5 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.5</td>
         <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total lump sum amount given by State Unit of the Party (including the districts and local units) to Other party(s) for election expenses. If political party makes payment (s) on more than one occasion then date wise details are to be mentioned.</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="45%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of State Unit Of Party to which payment made/ Name of Other Political Party (if any)</td>
         <td width="20%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date(s) of
            Payment
         </td>
         <td width="20%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Cash , Cheq / DD etc no.</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>


      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;"></td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="3" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.5 end-->


<!--page 6.6 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-bottom:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">6.6</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Closing Balance of State Unit of the Party ( including the districts and local units) on the completion of election</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Bank balance<br>
            (Please mention name of the bank and branch)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 6.6 end-->

@endif