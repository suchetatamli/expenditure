    <?php
    $myDel = getMyDetails('');
    //print_r($myDel);
    ?>
    <div class="print_area" id="print_area">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">
        <tbody>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="font-family: Arial; font-size: 16px; line-height: 25px; font-weight: bold;">(Part B )<br>
              Cash Register for Maintenance of Day to Day Accounts by Contesting Candidates</td>
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
            <td colspan="4" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Receipt</td>
            <td colspan="4" align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Payment</td>
            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Balance<br>
              Amount</td>
              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Remarks, if any</td>
            </tr>
            <tr>
              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Date</td>
              <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Name and<br>
                address of person/ party/ association/ body/any other from whom<br>
                the amount received</td>
                <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Receipt<br>
                  No.</td>
                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Amount <!-- {{Config::get('constants.text_labels.amount')}} --></td>
                  <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Bill No./<br>
                    Voucher No. and Date</td>
                    <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Name of<br>
                      payee and address</td>
                      <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Nature of<br>
                        Expenditure</td>
                        <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Amount <!-- {{Config::get('constants.text_labels.amount')}} --></td>
                        <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Places at<br>
                          which or person with whom the balance is kept (if cash is kept at more<br>
                          than one place/ persons, mention name and balance available)</td>
                          <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">Any expense<br>
                            mentioned in column 7 of this table and not mentioned in column 2 of table of Part-A should be clarified here.</td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">1.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">2.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">3.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">4.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">5.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">6.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">7.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">8.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">9.</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">10.</td>
                          </tr>  
                          @php $balance = 0; @endphp                        
                          @foreach($dates as $date) 
                          @php $break_date = 0;@endphp
                          @foreach ($print_data as $data)
                          @if(date('Y-m-d',strtotime($data->tran_date)) == $date)
                          @php
                          $break_date = 1;
                          $receipt_name = $data->tran_type == 'Cr' ? ucfirst($data->tran_source_name).'<br>'.ucfirst($data->tran_source_address) : '';
                          $receipt_no = $data->tran_type == 'Cr' ? $data->receipt_no : '';
                          $receipt_amount = $data->tran_type == 'Cr' ? formatCurrency($data->tran_amount) : '';
                          $payment_bill_no = $data->tran_type == 'Dr' ? ($data->receipt_no?$data->receipt_no.'&nbsp;&amp;&nbsp;':''). indianDateFormat($data->tran_date): '';
                          $name_of_payee = $data->tran_type == 'Dr' ? $data->tran_receiver_name.'<br>'.$data->tran_receiver_address : '';
                          $nature_of_exp = $data->tran_type == 'Dr' ? textFieldNameByShortTag($data->tran_purpose) : '';
                          $trans_amt = $data->tran_type == 'Dr' ? formatCurrency($data->tran_amount) : '';
                          $balance += $data->tran_type == 'Cr' ? $data->tran_amount : -$data->tran_amount;
                          @endphp
                          <tr>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{indianDateFormat($data->tran_date)}}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">@if($data->is_petty == 1) Self @else {!! $receipt_name !!} @endif</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">@if($data->is_petty == 1) Withdrawal from Bank @else{{$receipt_no}} @endif</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px; text-align: right;">{{$receipt_amount}}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{!! $payment_bill_no !!}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">
                              @if(($data->tran_receiver_name == 'Own' || $data->tran_receiver_name == 'Self' || $data->tran_receiver_name == 'self') && $data->tran_type == 'Dr') 
                              {{$myDel->bankname}} A/C - {{$myDel->acc_no}}
                              @else
                              {!! $name_of_payee !!}
                              @endif
                            </td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;">{{ $nature_of_exp }}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px; text-align: right;">{{ $trans_amt }}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px; text-align: right;">{{ formatCurrency($balance) }}<br>{!! formatPettyDescription($data->tran_description) !!}</td>
                            <td align="center" valign="top" style="border-collapse:collapse; border:1px solid #000; padding:5px; font-family: Arial; font-size: 10px; line-height: 15px;"></td>
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

                          </tr>
                          @endif
                          @endforeach
                        </table>

                        <!-- eof content table -->
                      </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; border-collapse:collapse;">

                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="font-family: Arial; font-size: 13px; line-height: 20px;">Certified that this is a true account kept by me/my election agent under Section 77 of the Representation of the People Act, 1951 (Certificate to be furnished after the date of declaration of result).</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
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
                      </div>