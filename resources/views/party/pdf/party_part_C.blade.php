 <!--part C start-->
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td align="center" valign="top" style="font-family: Arial; font-size: 14px; line-height: 20px; font-weight: bold; text-decoration: underline;">PART - C</td>
         </tr>
         <tr>
            <td>&nbsp;</td>
         </tr>
         <tr>
            <td style="font-family: Arial; font-size: 14px; line-height: 20px;">7. Summary of all Receipts and expenditure incurred / authorized by the Political Party during election (from the date of announcement of election till completion of election) as mentioned in tables in Part –A and B.</td>
         </tr>
         <tr>
            <td>&nbsp;</td>
         </tr>
      </table>

      <div class="tbl_scrl">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">
         <tr>
            <td width="5%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">A</td>
            <td width="85%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Name of the Party</td>
            <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$candidate_details->party_name}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">B</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Date(s) of Poll</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">{{$poll_dates}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">C</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Election to:<br>
               (mention the State names and Assembly / Lok Sabha Constituency )
            </td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">
               
                  @php $sts = array(); $s = getUserStates(); 
                     foreach($s as $si){
                     array_push($sts,$si->state_name);
                     }
                     echo implode($sts,', '); 
                  @endphp  
            </td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">D</td>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Opening Balance ( for Party central Head Quarter and state/Dist./Local level units all included)</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">I. Cash in hand [5.1.a.(i)+6.1.a.(i) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; text-align: right;">{{formatCurrency($total_51ai + $total_61ai)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">II. Cash in bank [5.1.a.(ii)+6.1.a.(ii) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_51aii + $total_61aii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">E</td>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Gross receipts from date of announcement of election to the date of completion of election<br>
               (both at Party central Head Quarter and state/Dist./Local level units)
            </td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">I. Cash [5.2.a.(i) + 6.2.a.(i) of all states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_52ai + $total_62ai)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">II. Cheque or Draft [5.2.a.(ii) + 6.2.a.(ii) of all states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_52aii + $total_62aii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">III. In kind (or complementary receipts) [5.2.a.(iii) + 6.2.a.(iii) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_52aiii + $total_62aiii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">IV. Total receipt(s)</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_52ai + $total_62ai + $total_52aii + $total_62aii + $total_52aiii + $total_62aiii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">F</td>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Gross Expenditure incurred/ authorized for general Party propaganda from the date of announcement of election to the date of completion of election (both at central Head Quarter and state/Dist./Local level units)</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">I. Cash or Cheque/DD etc. [5.3.a.(i) +6.3.a.(i) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_53ai + $total_63ai)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">II. Cheque or Draft [5.3.a.(ii) +6.3.a.(ii) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_53aii + $total_63aii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">III. Expenditure authorized, but remaining outstanding on date of completion of election [5.3.a.(iii) +6.3.a.(iii) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_53aiii + $total_63aiii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">IV. Total Expenditure on general party propaganda</td>
            @php $total_FIV = $total_53ai + $total_63ai + $total_53aii + $total_63aii + $total_53aiii + $total_63aiii; @endphp
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_FIV)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">G</td>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Gross Expenditure by Political Party incurred/ authorized for the Candidate(s) other than general party propaganda (both at central Head Quarter and state/Dist./Local level units)</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">I. Cash or Cheque / DD etc. payment to candidate(s) [5.4.a.(i) +6.4.a.(i)]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_54ai + $total_64ai)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">II. In kind-<br>
               a. Media payments [5.4.a.(ii)+6.4.a.(ii) of all election related states]
            </td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_54aii_inkind + $total_64aii_inkind)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Publicity materials [5.4.a.(iii)+6.4(iii) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_54aiii + $total_64aiii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">c. Public meetings, processions etc.,[5.4.a.(iv) +6.4.a.(iv) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_54aiv + $total_64aiv)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">d. Any other expenses [5.4.a.(v) + 6.4.a.(v) of all election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_54av + $total_64av)}}</td>
         </tr>
         @php $total_GIV = $total_54ai + $total_64ai + $total_54aii_inkind + $total_64aii_inkind + $total_54aiii + $total_64aiii + $total_54aiv + $total_64aiv + $total_54av + $total_64av; @endphp
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">IV. Total Expenditure on candidate(s)</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_GIV)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">H</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Gross Total Expenditure for general party propaganda and for candidate(s)<br>
               [Total of F (IV) + G (IV) above of this table]
            </td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_FIV + $total_GIV)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">I</td>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Closing Balance (both at Party central Head Quarter and state/Dist./Local level units)</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Description</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">Amount</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; border-bottom:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">a. Cash in hand [5.6.a.(i)+ 6.6.a.(i) of election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_56ai + $total_66ai)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; border-top:0px; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">b. Bank balance [5.6.a.(ii)+ 6.6.a.(ii) of election related states]</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_56aii + $total_66aii)}}</td>
         </tr>
         <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px; font-weight:bold;">c. Total Closing Balance</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 14px; line-height: 20px;text-align: right;">{{formatCurrency($total_56ai + $total_66ai + $total_56aii + $total_66aii + $total_65)}}</td>
         </tr>
      </table>
   </div>
      <!--part C end-->
      