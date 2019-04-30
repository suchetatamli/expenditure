<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="top_date">
<div class="row">
  <form action="{{$action_url}}">
  @csrf
  <div class="col-sm-4">
     <div class='form-group'>
            <label class="control-label">From Date</label>            
            <input type='text' name='from_date'  class='form-control date_range_class input_date' value='{{$from_date}}'/>      
            
        </div>
      </div>
      <div class="col-sm-4">
        <div class='form-group'>
            <label class="control-label">To Date</label>
              <input type='text' name='to_date'  class='form-control date_range_class input_date' value='{{$to_date}}'/>            
        </div>
      </div>
   
      <div class="col-sm-4">
      <div class='form-group'>
        <label>&nbsp;</label>
        <button class="btn btn-sm btn-success" type="submit">Search</button>
        <button class="btn btn-sm btn-waring" type="button" onclick="window.location='{{$action_url}}'">Reset</button>
      </div>
      </div>
      </form>
  </div>

</div>

        <div class="table_listing">
          <div class="tbl_list_scrl">
          <table class='table table-striped table-bordered'>
     
              <tr style="background:#BFBFBF;">
                <th>INCOME</th>
                <th style="text-align: right;">Amount {{Config::get('constants.text_labels.amount')}}</th>  
              </tr>
              <tr>
                <td>Own Fund for Campaigning</td> 
                <!-- {{$schedule7_total}} -->
                <td style="text-align: right;">{{$own_fund}}</td>
              </tr>
              <tr>
                <td>Funds received from Party</td>
                <td style="text-align: right;">{{$schedule8_total}}</td>
              </tr>
              <tr>
                <td>Funds received from Others</td>
                <td style="text-align: right;">{{$schedule9_total}}</td>
              </tr>
              <tr>
                <td><b>Total</b></td>
                <td style="text-align: right;"><b>{{$total_income}}</b></td>
              </tr>   

              <tr style="background:#BFBFBF;">
                <th>EXPENDITURE</th>
                <th>&nbsp;</th>  
              </tr>
              <tr>
                <td>Expenses in Public Meetings, Rally, etc (Without Star Campaigner)</td>
                <td style="text-align: right;">{{$schedule1_total}}</td>
              </tr>
              <tr>
                <td>Expenses in Public Meetings, Rally, etc (With Star Campaigner)</td>
                <td style="text-align: right;">{{$schedule2_total}}</td>
              </tr>
              <tr>
                <td>Expenses on Campaign Materials</td>
                <td style="text-align: right;">{{$schedule3_total}}</td>
              </tr>
              <tr>
                <td>Expense on Campaign through Print, Electroni & Other Media</td>
                <td style="text-align: right;">{{$schedule4_total}}</td>
              </tr>
              <tr>
                <td>Expense on Campaign Vehicles</td>
                <td style="text-align: right;">{{$schedule5_total}}</td>
              </tr>
              <tr>
                <td>Expense on Campaign Worker/ Agents</td>
                <td style="text-align: right;">{{$schedule6_total}}</td>
              </tr>
              <tr>
                <td>Other Campaign Expenditure</td>
                <td style="text-align: right;">{{$schedule6_part_2_total}}</td>
              </tr> 
              <tr>
                <td><b>Total</b></td>
                <td style="text-align: right;"><b>{{$total_expense}}</b></td>
              </tr> 
              <tr>
                <td>Excess of Income over Expenses</td>
                <td style="text-align: right;">{{$net_income}}</td>
              </tr>   
              <tr>
                <td>Excess of Expense over Income</td>
                <td style="text-align: right;">{{$net_expense}}</td>
              </tr>
          </table>
        </div>

          <!-- ADD A PAGINATION -->
        </div>
        @endsection
