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
                <td>Total Income</td>                 
                <td style="text-align: right;">{{$total_income}}</td>
              </tr>               

              <tr style="background:#BFBFBF;">
                <th>EXPENDITURE</th>
                <th>&nbsp;</th>  
              </tr>
              <tr>
                <td>Expenses in Travel Expense of star campaigner (s) </td>
                <td style="text-align: right;">{{$star}}</td>
              </tr>
              <tr>
                <td>Expenses in Travel Expense of other leader (s) (including expenses after announcement and before nomination)  </td>
                <td style="text-align: right;">{{$leader}}</td>
              </tr>
              <tr>
                <td>Expenses in Media Advertisement (Print and Electronic, Bulk SMS, Cable, Website and TV Channel etc.)  </td>
                <td style="text-align: right;">{{$media}}</td>
              </tr>
              <tr>
                <td>Expenses on Publicity Materials including Posters Banners, badges, stickers, arches, gates, 
 cutouts, hoardings, flags etc. </td>
                <td style="text-align: right;">{{$publicity}}</td>
              </tr>
              <tr>
                <td>Expense on Public meetings/Procession/rally (like dias/audio/barricades/vehicles etc) </td>
                <td style="text-align: right;">{{$meeting}}</td>
              </tr>
              <tr>
                <td>Other expense (s) </td>
                <td style="text-align: right;">{{$other}}</td>
              </tr>   
              <tr>
                <td>Expense in Lump sum Payment (s) to Candidate(s) of the Party or other Candidate(s) </td>
                <td style="text-align: right;">{{$lumpsum_cand}}</td>
              </tr> 
              <tr>
                <td>Expense on Media Advertisement(Print & Electronic, Bulk SMS, Cable, Website, etc) for specific Candidate(s) with photo or name of Candidate </td>
                <td style="text-align: right;">{{$media_cand}}</td>
              </tr> 
              <tr>
                <td>Expense on Publicity Materials(Posters, Banners, Election Materials, etc.) with Photo and/or name of Candidate </td>
                <td style="text-align: right;">{{$publicity_cand}}</td>
              </tr> 
              <tr>
                <td>Expense on Public meetings/ Procession etc. (barricades/audio etc. hired Vehicles for audience/ supporters at the rally of Star Campaigners or other leaders with Candidates) </td>
                <td style="text-align: right;">{{$meeting_cand}}</td>
              </tr> 
              <tr>
                <td>Other expense (s) for Candidate (s)</td>
                <td style="text-align: right;">{{$other_candidate}}</td>
              </tr> 
              <tr>
                <td>Lump Sum amount given to State Units</td>
                <td style="text-align: right;">{{$lumpsum_to_su}}</td>
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
