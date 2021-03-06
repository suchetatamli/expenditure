@extends("crudbooster::admin_template")
@section("content")
<style>
	#chartdiv {
		width: 100%;
		height: 250px;		
	}

	#chartdiv2 {
		width: 100%;
		height: 210px;
	}
	h1 span.header-text-span{font-size: 17px; font-weight: bold;}	
	.chart-title-pi{
		text-align: center;
		font-size: 15px;
		font-family: 'Arial';
		font-weight: 700;
		margin-bottom: 0; 
	}

</style>
<div class="exp_dashboard">
	<!-- <h3>Hello {{$user_details->name}}, Welcome to your Dashboard!</h3>
	<div>
	<a href="{{route('guidelines-instruction')}}">Guidelines & Instructions</a> | 
	<a href="{{route('vouchers')}}">Vouchers</a>
</div> -->
<div class="row">
	<div class="col-md-12">
		<p style="font-size: 12px; padding-bottom: 0px !Important;">From the Entry Vouchers in the left menu, the entries are directly & automatically posted in the Schedules, & Statements. Income & Expenditure Statement summary, Annexures, Books, required are automatically prepared. The Expenditure Statements could be submitted to the Election Commission of India. All the Expenditure Statements, Registers & Schedules required to Candidates are separately given.</p>
	</div>
</div>
<div class="row" style="margin-bottom: 20px;">
	<form action="" name="srchForm">
		<div class="form-group">
			<label class="control-label col-sm-2">Select State :</label>
			<div class="col-sm-10">
				<select class="form-control" name="state_id" onchange="srchForm:submit();">
					<option value="0">All State</option>
					@foreach($states as $st)
					<option value="{{$st->state_id}}" @php echo ($selected_id == $st->state_id) ? 'selected': ''; @endphp>{{ $st->state_name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<div class="col-md-6">

		<div class="box_content">
			<div class="heading">Election Expenses Tracker</div>
			<div class="chart">
				<div class="chart-title-pi">
					Total Expense Limit: <?php echo "₹ ".formatCurrency($total_expense_limit); ?>
				</div>
				<!-- <div id="chartdiv"></div> -->
				<div id="piechart"></div>

			</div>
		</div>
					<!-- <div >
				Total Expenses Limit: INR {{formatCurrency($total_expense_limit)}}<br>
				Limit Exhausted: INR {{formatCurrency($limit_exhausted)}}<br>
				Available Limit: INR {{formatCurrency($available_limit)}}
			</div> -->
			
		</div>
		<div class="col-md-6">
			<div class="box_content">
				<div class="heading">Graphical Representation of your Daily Expenses</div>
				<div class="chart">
					<div class="chart-title-pi">
						Rate the Day on a Scale of expense incurred
					</div>
					<!-- <div id="chartdiv2"></div> -->
					<div id="chart_div"></div>
				</div>			
			</div>
		</div>
	</div>
<!--	<div class="row">
	<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Graphical Representation of your Daily Expenses</div>
				<div class="panel-body"><div id="chartdiv2"></div></div>
			</div>
		</div>
	</div> -->
	<div class="row">		
		<div class="col-md-3">
			<div class="box_content">
				<div class="heading">Important Dates</div>
				<div class="txt dates">						
					<?php 
					$date =  date_create($user_details->date_result); 
						   	 //$statement_date = date_add($date,date_interval_create_from_date_string("90 days"));
					if($user_details->election_id == 1)
						$statement_date = date_add($date,date_interval_create_from_date_string("90 days"));
					else
						$statement_date = date_add($date,date_interval_create_from_date_string("75 days"));
					?>
					<div class="dt_row"><label>Date of announcement of election:</label> <span>{{indianDateFormat($user_details->nomination_date)}}</span></div>
					<div class="dt_row"><label>Date of completion of election:</label> <span>{{indianDateFormat($user_details->date_result)}}</span></div>
					<div class="dt_row"><label>Sumission of Expenditure Statements:</label> <span>{{date_format($statement_date,"d/m/y")}}</span></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box_content">
				<div class="txt bank">
					<div class="bnk_row"><label>Cash in hand:</label> <span><i class="fa fa-inr"></i> {{formatCurrency($opening_balance_cash)}}</span></div>
					<div class="bnk_row"><label>Bank Balance :</label> <span><i class="fa fa-inr"></i> {{formatCurrency($opening_balance_bank)}}</span></div>
					<div class="bnk_row"><label>Gross Receipts:</label> <span><i class="fa fa-inr"></i> {{formatCurrency($gross_receipts)}}</span></div>
					<div class="bnk_row"><label>Expense on general party propaganda:</label> <span><i class="fa fa-inr"></i> {{formatCurrency($exp_party_propaganda)}}</span></div>
					<div class="bnk_row"><label>Total expense on candidate (s):</label> <span><i class="fa fa-inr"></i> {{formatCurrency($exp_candidate)}}</span></div>
					<div class="bnk_row" style="display: none;"><label>Total amount given to State Unit(s):</label> <span><i class="fa fa-inr"></i> {{formatCurrency($exp_state_unit)}}</span></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box_content">
				<div class="heading">Recent Entries</div>
				<div class="txt entries">
					<ul>
						@php $tran_type_array = ['Cr' => 'Credited','Dr' => 'Debited']; @endphp
						@foreach($recent_records as $rr)
						<li class="{{$rr['tran_type']}}"><i class="fa fa-inr"></i> {{formatCurrency($rr['tran_amount'])}} - {{$tran_type_array[$rr['tran_type']]}} on {{indianDateFormat($rr['tran_date'])}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box_content">
				<div class="heading">Points to Note:</div>
				<div class="txt note">
					<ul>
						@foreach($notes_regulation as $nr)
						<li>{{$nr->content}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12" style="text-align:right;"><i>For any help, mail us on help@nirvachanguru.com</i></div>
	</div>
</div>
<style type="text/css">
	.rows{width: 100%; display: block;}
</style>
@endsection
