@extends("crudbooster::admin_template")
@section("content")
<div class='panel panel-default'>
    <div class='panel-heading'>Day to Day Accounts of Election Expenditure</div>  
    
    
    <div class='panel-body' style="padding:20px 0px 0px 0px">

        <div class="print_area" id="print_area">
          <h4><center>Schedule 8</center></h4>
          <p>Details of Lump sum amount received from the party (ies) in cash or cheque or DD or by Account Transfer</p>          

          <table style="border: 1px solid #000;  width: 100%; border-collapse:collapse;">
            <tr>
              <td style="border: 1px solid #000; padding:8px;">S. No.</td>
              <td style="border: 1px solid #000; padding:8px;">Name of the Political Party</td>
              <td style="border: 1px solid #000; padding:8px;">Date</td>
              <td style="border: 1px solid #000; padding:8px;">Cash</td>
              <td style="border: 1px solid #000; padding:8px;">DD/ Cheque no. etc. with details of drawee bank</td>
              <td style="border: 1px solid #000; padding:8px;">Total Amount in Rs.</td>
              <td style="border: 1px solid #000; padding:8px;">Remarks, if any</td>
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
              <td style="border: 1px solid #000; padding:8px;"><?php echo $key+1;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $val->name;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo date('Y-m-d',strtotime($val->date));?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $cash;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php if(strtolower($val->cash) != 'cash'){ ?><?php echo $cqh;?><br><?php echo $val->dd_or_cheque_no.'<br>'.$val->bankname.'(BR. '.$val->branchname.')';?><?php }?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $val->total_amount;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo ucfirst($val->remarks);?></td>
            </tr>
          <?php }?>
            <tr>
              <td style="border: 1px solid #000; padding:8px;"></td>
              <td colspan="2" style="border: 1px solid #000; padding:8px;">Total</td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $castot;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $chqtot;?></td>
              <td style="border: 1px solid #000; padding:8px;"><?php echo $gtot;?></td>
              <td style="border: 1px solid #000; padding:8px;"></td>
            </tr>
          </table>
      
    </div>

    <div class='panel-footer'>
      <button id="print" class="btn btn-success" type="button"
            onclick="printDiv('print_area')">
        Print
    </button>
    
    </div>
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection