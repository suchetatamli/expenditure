
<?php 
  $me = getMyDetails('');
?>
<div class="print_area" id="print_area">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">
        <tbody>
        
          <tr>
            <td align="right" valign="top" style="font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold; text-decoration: underline;">Annexure-E1</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">(Part A)<br>
              Register for Maintenance of Day to Day Accounts of Election Expenditure by
              Contesting Candidates</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Name of the Candidate</td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">

                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{$candidate_details->name}}</td>              
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Name of Political Party, if any</td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{$candidate_details->party_name}}</td>              
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Constituency from which contested</td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{$candidate_details->constituency}}</td>              
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Date of Declaration of Result</td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{indianDateFormat($candidate_details->date_result)}}</td>              
                        </tr>
                      </table>

                    </td>
                  </tr>
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Name and address of Election Agent </td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{$candidate_details->agent_name}}, {{$candidate_details->agent_address}}</td>              
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">Total expenditure incurred / authorized </td>
                    <td width="50%" align="left" valign="top" style="padding-bottom:10px;">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" align="left" valign="top">: </td>
                          <td align="left" valign="top" style="border-bottom: 1px dotted #000;">{{$expenditure_limit}}</td>              
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="left" valign="top">(From the date of nomination to the date of declaration of result of election, both dates inclusive)</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </tbody>   
        </table>
        <!-- sof content table -->
        <div class="tbl_scrl">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #000;" autosize="1">
          <tr>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">1.</td>
            <td colspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">2.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">3.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">4.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">5.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">6.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">7.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">8.</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">9.</td>
          </tr>
          
          <tr>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Date of<br>
              expendit ure/ event</td>
              <td colspan="3" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Nature of expenditure</td>
              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Total<br>
                Amount in<br>
                Rupees (paid<br>
                +<br>
                outstanding) <!-- {{Config::get('constants.text_labels.amount')}} --></td>
                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Name<br>
                  and address of payee</td>
                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Bill No. /<br>
                    voucher No. and date</td>
                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Amount<br>
                      incurred/ authorized by<br>
                      candidate or his election agent <!-- {{Config::get('constants.text_labels.amount')}} --></td>
                      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Amount<br>
                        incurred/ authorized by political party and name of political party <!-- {{Config::get('constants.text_labels.amount')}} --></td>
                        <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Amount <!-- {{Config::get('constants.text_labels.amount')}} --><br>
                          incurred/ authorized by other individual/ association/ body/any other (mention full Name and Address)</td>
                          <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Remarks,<br>
                            if any</td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Des<br>
                              crip tion</td>
                              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Qty.</td>
                              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Rate<br>
                                per unit</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">&nbsp;</td>
                              </tr>
                              @foreach($dates as $date) 

                                  @php $break_date = 0;@endphp {{-- to check if any transaction done for a given date --}}
                                  @foreach($print_data as $data)
                                  @if(date('Y-m-d',strtotime($data->tran_date)) == $date)
                                  @php $break_date = 1; @endphp
                                  <tr>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{indianDateFormat($data->tran_date)}}</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{$data->tran_description}}</td>
                                  @php                                    
                                    $quantity = $data->tran_quantity?$data->tran_quantity:1;
                                    $rate     = $data->tran_rate>0?$data->tran_rate:'';
                                  @endphp
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{$quantity}}</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px; text-align: right;">{{$rate}}</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px; text-align: right;">{{formatCurrency($data->tran_amount)}}</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{$data->tran_receiver_name}}</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{$data->receipt_no}}
                                    @if($data->receipt_date) dated {{indianDateFormat($data->receipt_date)}} @endif
                                  </td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;"> 
                                  	@if($data->tran_amount_brkup_ow > 0){{formatCurrency($data->tran_amount_brkup_ow)}} <br>Self @endif</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">
                                  	@if($data->tran_amount_brkup_pt > 0) {{formatCurrency($data->tran_amount_brkup_pt)}} <br> @if($data->source_name_pt){{$data->source_name_pt}} @else {{$data->tran_source_name}}@if($data->tran_source_address && 1==2), {{$data->tran_source_address}}@endif @endif @endif</td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">
                                    @if($data->tran_amount_brkup_ot > 0)
                                      {{formatCurrency($data->tran_amount_brkup_ot)}} <br> @if($data->source_name_ot){{$data->source_name_ot}} @else {{$data->tran_source_name}}@endif 
                                      <br>
                                      @if($data->tran_source_address) {{$data->tran_source_address}} @endif
                                    @endif
                                    
                                  </td>
                                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{$data->tran_remarks}}</td>
                                  </tr>
                                  @endif
                                  @endforeach  
                                  @if($break_date == 0)
                                    <tr>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{indianDateFormat($date)}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{Config::get('constants.text_labels.nil')}}</td>
                                   
                                    </tr>  
                                  @endif                           
                              @endforeach

                              
                            </table>
                            <!-- eof content table -->
                          </div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">
                              
                              <tr>
                                <td align="left" width="70%" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2" align="left" valign="top" style="font-family: Arial; font-size: 13px; line-height: 20px;">Certified that this is a true account kept by me/my election agent under Section 77 of the Representation of the People Act, 1951 (Certificate to be furnished after the date of declaration of result).</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                              </tr>
                                                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                              </tr>
                             
                              <tr>
                                <td align="left" valign="top" width="70%">&nbsp;</td>
                                <td align="right" valign="top" style="font-family: Arial; font-size: 13px; line-height: 35px; border-top: 1px dashed #000;">
                                  Signature of the  Candidate
                                  
                                </td>
                                
                              </tr>
                              
                            </table>
         
                            
                            <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse; clear: both;">
                              <tr>
                                <td colspan="2" align="left" valign="top" style="font-family: Arial; font-size: 13px; font-weight:bold;">Note:</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">1.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">This register must be maintained on a daily basis and shall be subject to inspection at any time by the Observer appointed by the Election Commission, the District Election Officer/Returning Officer or by any other officer authorized in this behalf.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">2.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">The register must be lodged in original with the District Election Officer as the return of Election Expenditure under Section 78 of the Representation of the People Act, 1951. It must be accompanied by an abstract statement (Part I to IV and schedules 1 to 9) of election expenses and supporting affidavit in the prescribed formats. No return of expenditure will be accepted as complete without the abstract statement of election expenses and the affidavit.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">3.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">Vouchers may not be attached only in respect of those items which are listed in Rule 86(2) of the Conduct of Election Rules, 1961, like postage, travel by air. For any voucher not attached vide this rule, an explanation to the affect why it was not practicable to obtain the required vouchers must be given in the prescribed register.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">4.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">The account and abstract statement shall be countersigned by the candidate if it is lodged by his election agent and should be certified by the candidate himself to be the correct copy of the account kept. The affidavit should be sworn by the candidate himself.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">5.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">Apart from the expenses incurred or authorized by the candidate/election agent directly, all expenditure incurred or authorized by the political party, other associations, bodies of persons, individuals in connection with the election of the candidate with his consent are also required to be included in the account. The only exception is the expenses incurred on travel of specified leaders of the political party on account of their travel for propagating the programme of the party. (See Explanation 1 and 2 of Section 77(1) of the Representation of the People Act, 1951).</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">6.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">If the expenditure on any item shown above in columns 2 and 3 above is incurred/authorized by any political party/association/body of persons/any individual (other than the candidate or his election agent), its / his name and complete address must be shown in columns 7 and 8.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">7.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">The total expenditure referred in columns 2 and 3 of the above table should include all expenditure in cash and the value of all goods and services received in kind by the candidate or his election agent from any source.</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px; padding-right:10px;">8.</td>
                                <td align="left" valign="top" style="font-family: Arial; font-size: 13px;">This register should include Day to Day Account Register as is Part A in White Pages , Cash Register as mentioned in Part-B in Pink pages and Bank Register as mentioned in Part-C in Yellow pages, as per the formats prescribed.</td>
                              </tr>
                            </table> -->
                          </div>
