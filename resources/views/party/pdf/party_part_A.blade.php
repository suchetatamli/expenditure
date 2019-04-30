 
@if($applicable_flag)
<!--page 224 start-->
<div class="annexure_tbl">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
         <td align="center" valign="top" style="font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">STATEMENT OF ELECTION EXPENDITURE OF POLITICAL PARTY IN ELECTIONS TO LOK SABHA/ASSEMBLY</td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">(from the date of announcement of election till the date of completion of election)</td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="22%" style="font-family: Arial; font-size: 14px; line-height: 20px;">1. Name of political party:</td>
                  <td width="78%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{$candidate_details->party_name}}</td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="49%" style="font-family: Arial; font-size: 14px; line-height: 20px;">2. Election to the Lok Sabha/ Legislative Assembly of State</td>
                  <td width="51%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">
                     @if($candidate_details->election_id == 1) Lok Sabha @else 
                     @php $sts = array(); $s = getUserStates(); 
                     foreach($s as $si)
                     {
                        array_push($sts,$si->state_name);
                     }
                     echo implode($sts,', '); 
                     @endphp
                     @endif
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td align="left" valign="top">(mention the name of the state in case of Assembly and strike out which is not relevant)</td>
      </tr>

      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="30%">3. Date of announcement of election:</td>
                  <td width="20%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{indianDateFormat($election_details->date_of_announcement)}}</td>
                  <td width="28%" align="center">4. Date of completion of election</td>
                  <td width="22%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{indianDateFormat($election_details->date_of_completion)}}</td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">PART - A</td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top">5. Details of Election Expenditure incurred/authorized at Party Central Headquarters</td>
      </tr>
      <tr>
         <td align="left" valign="top">&nbsp;</td>
      </tr>
   </table>
</div>
<!--page 224 end-->
<!--page 5.1 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <?php foreach($bank_details as $Val){ $bkBal = $bkBal+$Val->balance; }?>
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.1</td>
         <td width="85%" colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Opening balance of party funds at Party Central Headquarters<br>
            (on date of announcement of election)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($candidate_details->party_cash_in_hand)}}</td>
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
      @php 
      $total_balance1 = $candidate_details->party_cash_in_hand + $bkBal;
      @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="2" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_balance1)}}</td>
      </tr>
   </table>
</div>
<!--page 5.1 end-->
<!--page 5.2 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.2</td>
         <td width="85%" colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross receipts of Party Central Headquarters from all sources from the announcement of election to the date of completion of election</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" colspan="2" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" colspan="2" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($cash_in_hand)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" colspan="2" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque or draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($cheque_in_hand)}}</td>
      </tr>
      <?php   foreach($in_kind as $Inkind) { $inKindBalance = $inKindBalance + $Inkind->tran_amount; } ?>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(iii) In kind (Received complimentary goods or services from any person/entity)<br> (Please mention details and notional value of such item- goods or services such as helicopter services etc. received as complimentary from any person /entity)<br></td>
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
      @php $total2 = $cash_in_hand + $cheque_in_hand + $inKindBalance; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" colspan="2" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total2)}}</td>
      </tr>
   </table>
</div>
<!--page 5.2 end-->
@php $total_51_52 = $total_balance1 + $total2;@endphp
<!--page 5.3 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.3</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred/ authorized by Party Central Headquarters for general Party propaganda from the announcement of election to the date of completion of election ( If more than one state are involved, then the state wise total expenses incurred by the Party Central Head Quarters is to be given in Schedule-1)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description of Gross expenditure by Party Central Headquarters</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($tran_cash)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque/ draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($tran_cheque)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expenditure authorized, but remaining outstanding on date of completion of election</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($outstanding_amount)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_amount2+$outstanding_amount)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Break up of the above general Party propaganda expenses incurred/<br>
            authorized by Party central headquarters
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Travel expenses of Star Campaigners as mentioned in explanation 1 of Section<br>
            77 of R.P. Act,1951<br>
            (Details to be enclosed in format given in Schedule- 2)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s2_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Travel expenses of leaders other than Star campaigners.<br>
            (Details to be enclosed in format given in Schedule- 2A)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s2a_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expense on Media advertisement (print and electronic, bulk sms, cable, website, TV channel etc) on General Party propaganda<br>
            (Details to be enclosed in format given in Schedule- 3)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s3_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv) Expense on Publicity Materials including posters, banners, badges, stickers, arches, gates, cutouts, hoardings, flags etc for general party propaganda<br>(Details to be enclosed in format given in Schedule- 4)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s4_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Expense on Public meetings /processions/rally etc. for general party propaganda<br>
            (Details to be enclosed in format given in Schedule- 5)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s5_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(vi) Any other expense towards General Party propaganda<br>
            (Details to be enclosed in format given in Schedule- 6)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s6_total)}}</td>
      </tr>
      @php $total_53 = $s2_total + $s2a_total + $s3_total + $s4_total + $s5_total + $s6_total ;@endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on general party propaganda</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_53)}}</td>
      </tr>
   </table>
</div>
<!--page 5.3 end-->
<!--page 5.4 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.4</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred/ authorized by Party Central Head Quarters for the Candidate(s)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Total lump sum payment(s) to Candidate(s) of the party or other candidate(s) authorized/ incurred by Party Central Head Quarters, either in cash or by Instruments like- cheque/ DD/PO/RTGS/Fund Transfer etc.<br>
            (Details to be enclosed in format given in Schedule- 7)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s7_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Total Expense on Media Advertisement(print and electronic, bulk sms, cable, website, TV channel etc.) for specific candidate(s) with photo or name or attributable as election expenses of candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 8)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s8_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Total expense on Publicity Materials (like posters, banners, election material etc) with photo and/or name of the candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 9)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s9_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv)Total Expense (Other than general party propaganda) on Public meetings/processions etc. (barricades /audio etc. /hired vehicles for the audience<br>
            /supporters) at the rally of Star Campaigners or other leaders with candidate(s) (Details to be enclosed in format given in Schedule- 10)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s10_total)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Any other expense for candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 11)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($s11_total)}}</td>
      </tr>
      @php $total_54 = $s7_total + $s8_total + $s9_total + $s10_total + $s11_total ; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on candidate (s)</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_54)}}</td>
      </tr>
   </table>
</div>
<!--page 5.4 end-->
<!--page 5.5 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.5</td>
         <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total lump sum amount given by Party Central Headquarters to State Unit(s) of the Party (including the districts and local units) or other party for election expenses (Please mention state wise amount). If political party makes payment (s) on more than one occasion then date wise details are to be mentioned.</td>
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
      @php $total3 = 0;@endphp
      @foreach($lump_sum_data as $lsd)
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$loop->iteration}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; ">{{$lsd->tran_receiver_name}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{indianDateFormat($lsd->tran_date)}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
            @php echo substr($lsd->tran_method,1,3) == 'ash' ? 'Cash' : $lsd->receipt_no; @endphp
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($lsd->tran_amount)}}</td>
      </tr>
      @php $total3 += $lsd->tran_amount; @endphp
      @endforeach
      @php $total_55 = $total3; @endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="3" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total3)}}</td>
      </tr>
   </table>
</div>
<!--page 5.5 end-->

<!--page 5.6 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.6</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">a. Closing Balance of party funds at Party Central Headquarters on the completion of election</td>
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
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($totCashInhandLast)}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;" colspan="2">(ii) Bank balance<br>(Please mention name of the bank and branch)<br></td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($totBankBalLast)}}</td>
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
      @php $total_56 = $totCashInhandLast + $totBankBalLast;@endphp
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;" colspan="2">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_56)}}</td>
      </tr>
   </table>
</div>
<!--page 5.6 end-->

<!-- IF THSI SECTION IS NOT APPLICABLE -->
@else
<!--page 224 start-->
<div class="annexure_tbl">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td align="center" valign="top" style="font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">STATEMENT OF ELECTION EXPENDITURE OF POLITICAL PARTY IN ELECTIONS TO LOK SABHA/ASSEMBLY</td>
   </tr>
   <tr>
      <td align="left" valign="top">&nbsp;</td>
   </tr>
   <tr>
      <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">(from the date of announcement of election till the date of completion of election)</td>
   </tr>
   <tr>
      <td align="left" valign="top">&nbsp;</td>
   </tr>
   <tr>
      <td align="left" valign="top">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td width="22%" style="font-family: Arial; font-size: 14px; line-height: 20px;">1. Name of political party:</td>
               <td width="78%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{$candidate_details->party_name}}</td>
            </tr>
         </table>
      </td>
   </tr>
   <tr>
      <td align="left" valign="top">&nbsp;</td>
   </tr>
   <tr>
      <td align="left" valign="top">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td width="49%" style="font-family: Arial; font-size: 14px; line-height: 20px;">2. Election to the Lok Sabha/ Legislative Assembly of State</td>
               <td width="51%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">@if(CRUDBooster::myPrivilegeId() == 4) {{$candidate_details->state_name}} @else 
                  @php $sts = array(); $s = getUserStates(); 
                  foreach($s as $si){
                  array_push($sts,$si->state_name);
               }
               echo implode($sts,', '); 
               @endphp
            @endif</td>
         </tr>
      </table>
   </td>
</tr>
<tr>
   <td align="left" valign="top">(mention the name of the state in case of Assembly and strike out which is not relevant)</td>
</tr>

<tr>
   <td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
   <td align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="30%">3. Date of announcement of election:</td>
            <td width="20%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{indianDateFormat($election_details->date_of_announcement)}}</td>
            <td width="28%" align="center">4. Date of completion of election</td>
            <td width="22%" style="font-family: Arial; font-size: 14px; line-height: 20px; border-bottom: 1px dashed #000;">{{indianDateFormat($election_details->date_of_completion)}}</td>
         </tr>
      </table>
   </td>
</tr>
<tr>
   <td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
   <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">PART - A</td>
</tr>
<tr>
   <td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
   <td align="left" valign="top">5. Details of Election Expenditure incurred/authorized at Party Central Headquarters</td>
</tr>
<tr>
   <td align="left" valign="top">&nbsp;</td>
</tr>
</table>
</div>
<!--page 224 end-->



<!--page 5.1 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.1</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Opening balance of party funds at Party Central Headquarters<br>
            (on date of announcement of election)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>         
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Bank balance<br>
            (Please mention name of the bank and branch)

         </td>

         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 5.1 end-->


<!--page 5.2 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.2</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross receipts of Party Central Headquarters from all sources from the announcement of election to the date of completion of election</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque or draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) In kind (Received complimentary goods or services from any person/entity)<br>
            (Please mention details and notional value of such item- goods or services such as helicopter services etc. received as complimentary from any person /entity)


         </td>
         <td align="left" valign="bottom" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 5.2 end-->


<!--page 5.3 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.3</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred/ authorized by Party Central Headquarters for general Party propaganda from the announcement of election to the date of completion of election ( If more than one state are involved, then the state wise total expenses incurred by the Party Central Head Quarters is to be given in Schedule-1)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description of Gross expenditure by Party Central Headquarters</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Cheque/ draft etc.</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expenditure authorized, but remaining outstanding on date of completion of election</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Break up of the above general Party propaganda expenses incurred/<br>
            authorized by Party central headquarters
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Travel expenses of Star Campaigners as mentioned in explanation 1 of Section<br>
            77 of R.P. Act,1951<br>
            (Details to be enclosed in format given in Schedule- 2)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Travel expenses of leaders other than Star campaigners.<br>
            (Details to be enclosed in format given in Schedule- 2A)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Expense on Media advertisement (print and electronic, bulk sms, cable, website, TV channel etc) on General Party propaganda<br>
            (Details to be enclosed in format given in Schedule- 3)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv) Expense on Publicity Materials including posters, banners, badges, stickers, arches, gates, cutouts, hoardings, flags etc for general party propaganda<br>
           (Details to be enclosed in format given in Schedule- 4)
        </td>
        <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
     </tr>

     <tr>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Expense on Public meetings /processions/rally etc. for general party propaganda<br>
         (Details to be enclosed in format given in Schedule- 5)
      </td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
   </tr>
   <tr>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(vi) Any other expense towards General Party propaganda<br>
         (Details to be enclosed in format given in Schedule- 6)
      </td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
   </tr>

   <tr>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on general party propaganda</td>
      <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
   </tr>
</table>
</div>
<!--page 5.3 end-->


<!--page 5.4 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.4</td>
         <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Gross Expenditure incurred/ authorized by Party Central Head Quarters for the Candidate(s)</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Total lump sum payment(s) to Candidate(s) of the party or other candidate(s) authorized/ incurred by Party Central Head Quarters, either in cash or by Instruments like- cheque/ DD/PO/RTGS/Fund Transfer etc.<br>
            (Details to be enclosed in format given in Schedule- 7)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Total Expense on Media Advertisement(print and electronic, bulk sms, cable, website, TV channel etc.) for specific candidate(s) with photo or name or attributable as election expenses of candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 8)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iii) Total expense on Publicity Materials (like posters, banners, election material etc) with photo and/or name of the candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 9)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(iv)Total Expense (Other than general party propaganda) on Public meetings/processions etc. (barricades /audio etc. /hired vehicles for the audience<br>
            /supporters) at the rally of Star Campaigners or other leaders with candidate(s) (Details to be enclosed in format given in Schedule- 10)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(v) Any other expense for candidate(s)<br>
            (Details to be enclosed in format given in Schedule- 11)
         </td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>

      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total expense on candidate (s)</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 5.4 end-->


<!--page 5.5 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.5</td>
         <td colspan="4" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Total lump sum amount given by Party Central Headquarters to State Unit(s) of the Party (including the districts and local units) or other party for election expenses (Please mention state wise amount). If political party makes payment (s) on more than one occasion then date wise details are to be mentioned.</td>
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
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;"></td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; ">{{Config::get('constants.text_labels.nil')}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{Config::get('constants.text_labels.nil')}}</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">

         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td colspan="3" align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 5.5 end-->

<!--page 5.6 start-->
<div class="tbl_scrl">
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000; margin-top:20px;" autosize="1">
      <tr>
         <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">5.6</td>
         <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Closing Balance of party funds at Party Central Headquarters on the completion of election</td>
         <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: center;">Amount</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(i) Cash in hand</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">(ii) Bank balance<br>
            (Please mention name of the bank and branch)
         </td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>         
      <tr>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
         <td align="right" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">Total</td>
         <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{Config::get('constants.text_labels.nil')}}</td>
      </tr>
   </table>
</div>
<!--page 5.6 end-->

@endif