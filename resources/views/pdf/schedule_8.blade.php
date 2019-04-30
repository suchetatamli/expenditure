<div class="print_area" id="print_area">

<div class="tbl_scrl">

          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">                     
          
          
          <tr>
            <td colspan="7" align="left" valign="top" style="border-collapse:collapse;  border:1px solid #000; padding:5px; font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">Schedule- 8</td>
  </tr>
          <tr>
            <td colspan="7" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height:15px;">Details of Lump sum amount received from the party (ies) in cash or cheque or DD or by Account Transfer</td>
  </tr>
                     
          
          <tr>
            <td width="7%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">S. No.</td>
            <td width="18%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Name of the Political Party</td>
            <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Date</td>
            <td width="10%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Cash</td>
            <td width="23%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">DD/ Cheque no. etc. with details of drawee bank</td>
            <td width="16%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Total Amount {{Config::get('constants.text_labels.amount')}}</td>
            <td width="16%" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">Remarks, if any</td>
          </tr>
          <?php 
            $gtot = 0;
            $castot = 0;
            $chqtot = 0;
            foreach($print_data as $key=>$val){ $gtot +=$val->total_amount; 
              $cash = $cqh = ''; 
              if(strtolower($val->cash) == 'cash'){ 
                $cash = $val->total_amount;
                $castot += $val->total_amount;
              }else{
                $cqh = $val->total_amount;
                $chqtot += $val->total_amount;
              }
            ?> 
          <tr>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;text-align: center;"><?php echo $key+1;?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;"><?php echo $val->name."<br>".$val->address;?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;"><?php echo indianDateFormat($val->date);?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><?php echo formatCurrency($cash);?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;"><?php if(strtolower($val->cash) != 'cash'){ ?><?php //echo formatCurrency($cqh);?>
              <?php 
              if(strtolower($val->cash) == 'cheque'){
                echo "Ch. no. ";
              }else if(strtolower($val->cash) == 'draft'){
                echo "DD. no. ";
              }else if(strtolower($val->cash) == 'pay_order'){
                echo "PO. no. ";
              }else{}
              ?><?php echo $val->dd_or_cheque_no?><?php if($val->bankname || $val->branchname){ echo '<br>'.$val->bankname.' (BR. '.$val->branchname.')';} ?><?php }?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><?php echo formatCurrency($val->total_amount);?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;"><?php echo ucfirst($val->remarks);?></td>
          </tr>
          <?php }?>
          <tr>
            <td colspan="2" align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; font-weight:bold;">Total</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b><?php echo formatCurrency($castot);?></b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><?php //echo formatCurrency($chqtot);?></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px; text-align: right;"><b><?php echo formatCurrency($gtot);?></b></td>
            <td align="left" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 13px; line-height: 15px;">&nbsp;</td>
          </tr>
</table>

</div>
      
    </div>