<?php namespace App\Http\Controllers;
	use Session;
	use DB;
	use CRUDBooster;
	use Illuminate\Http\Request;
	use Helper;
	use Illuminate\Support\Facades\Validator;
	use Redirect;
	use Carbon\Carbon;
	use App\ExpenditureLimit;
	use App\Schedule1;
	use App\Schedule2;
	use App\Schedule3;
	use App\Schedule4;
	use App\Schedule5;
	use App\Schedule6;
	use App\Schedule8;
	use App\Schedule9;
	use App\BankRegister;
	use App\CashRegister;
	use App\NotesRegulation;
	use App\PartyTransactionRegister;
	use App\PartySchedule1;
	use App\PartySchedule2;
	use App\PartySchedule3;
	use App\PartySchedule4;
	use App\PartySchedule5;
	use App\PartySchedule6;	
	use App\PartySchedule7;
	use App\PartySchedule8;
	use App\PartySchedule9;
	use App\PartySchedule10;
	use App\PartySchedule11;
	use App\PartySchedule12;
	use App\PartySchedule13;
	use App\PartySchedule14;
	use App\PartySchedule15;
	use App\PartySchedule16;	
	use App\PartySchedule17;
	use App\PartySchedule18;
	use App\PartySchedule19;	
	use App\PartySchedule20;
	use App\PartySchedule21;
	use App\PartySchedule22;
	use App\UserStates;
    
	class AdminDashboardController extends \crocodicstudio\crudbooster\controllers\CBController {

		private function totalExpense($user_details_array) {
			$schedule1_total			=	Schedule1::where($user_details_array)->get()->sum('total_amount');
			$schedule2_total			=	Schedule2::where($user_details_array)->get()->sum('total_amount');
			$schedule3_total			=	Schedule3::where($user_details_array)->get()->sum('total_amount');
			$schedule4_total			=	Schedule4::where($user_details_array)->get()->sum('total_amount');
			$schedule5_total			=	Schedule5::where($user_details_array)->get()->sum('total_amount');
			$schedule6_total			=	Schedule6::where($user_details_array)->get()->sum('total_amount');
			$total 						=	$schedule1_total + $schedule2_total + $schedule3_total + $schedule4_total + $schedule5_total + $schedule6_total;

			return $total;
		}

		private function totalExpenseParty($user_details_array) {	
			
			$getTot  = PartyTransactionRegister::filterPartyTransactionData()->where('tran_type','Dr');
			if($user_details_array['state_id']){
				$getTot = $getTot->where('state_id',$user_details_array['state_id']);
			}	
			$getTot = $getTot->select(DB::raw('SUM(tran_amount) as total, user_id'))->groupBy('user_id')->first();
			//pd($getTot->total);
			$total = $getTot->total?$getTot->total:0;

			return $total;
		}

		private function cashDepositedInBank($user_details_array) {
			$total = BankRegister::where($user_details_array)
						->where('inkind',0)
						->where('is_petty',0)
						->where('tran_source','Self')
						->where('tran_purpose','self-deposit')
						->where('is_own_bank','Y')
						->where('tran_type','Cr')->sum('tran_amount');
			return formatCurrency($total);			
		}

		private function recentBankTransaction($user_details_array) {
			
			$res = BankRegister::where($user_details_array)
						 ->orderBy('tran_date','desc')
						 ->limit(5)->get(['tran_type','tran_amount','tran_date'])->toArray();
			
			$res1 = CashRegister::where($user_details_array)
						 ->orderBy('tran_date','desc')
						 ->limit(5)->get(['tran_type','tran_amount','tran_date'])->toArray();

			$resTot = array();			 
			$resTot = array_merge($res, $res1); 
			return $resTot;
		}

		private function recentPartyTransaction($user_details_array) {
			
			$res = PartyTransactionRegister::where($user_details_array);
			if ($user_details_array['state_id']) {
				$res = $res->where('state_id',$user_details_array['state_id']);
			}
			$res = $res->orderBy('tran_date','desc')
						 ->limit(10)->get(['tran_type','tran_amount','tran_date'])->toArray();
			return $res;
		}

		private function electionExpense($user_details_array) {
			$data_array = BankRegister::select('tran_date',DB::raw('SUM(ROUND(tran_amount,0)) as total'))
										->where($user_details_array)
										->where('inkind',0)
										->where('is_petty',0)
										->where('trans_parent_id',0)
										->whereNotNull('schedule_name')
										->where('tran_type','Dr')	
										->groupBy('tran_date')									
										->orderby('tran_date','desc')->get()->toArray();

			//pd($data_array);
			$dates 						= 	$this->generateDateRange();
			//pd($dates);
			$data_array_new = array();
			foreach($dates as $date){
				array_push($data_array_new, array('tran_date'=>$date, 'total' => 0.00));				
			}

			foreach($data_array_new as $key => $date){
				//echo $date;
				foreach($data_array as $data){
					//echo date('Y-m-d',strtotime($data['tran_date']));
					if(date('Y-m-d',strtotime($data['tran_date'])) == $date['tran_date']){
						//array_push($data_array_new, array('tran_date'=>$date, 'total' => 0.00));
						$data_array_new[$key] = $data;
					}
				}				
				
			}
			//pd($data_array_new);die();
			$data_string = '';
			if (!empty($data_array_new)) {
				foreach ($data_array_new as $da) {
					$data_string .= '{"date":"'.date('Y-m-d',strtotime($da['tran_date'])).'","value":'.$da['total'].'},';
				}
				$data_string = !empty($data_string) ? rtrim($data_string,","):'';
			}
			//echo $data_string; die();
			return $data_string;							
		}

		private function electionExpenseParty($user_details_array) {
			$data_array = PartyTransactionRegister::select('tran_date',DB::raw('SUM(ROUND(tran_amount,0)) as total'))
										->where($user_details_array)
										->where('inkind',0)
										->where('is_petty',0)
										->where('trans_parent_id',0)
										->where('tran_type','Dr');
			if($user_details_array['state_id']){
				$data_array = $data_array->where('state_id',$user_details_array['state_id']);
			}
			$data_array = $data_array->groupBy('tran_date')									
										->orderby('tran_date','desc')->get()->toArray();

			//pd($data_array);
			$dates 						= 	$this->generateDateRange();
			//pd($dates);
			$data_array_new = array();
			foreach($dates as $date){
				array_push($data_array_new, array('tran_date'=>$date, 'total' => 0.00));				
			}

			foreach($data_array_new as $key => $date){
				//echo $date;
				foreach($data_array as $data){
					//echo date('Y-m-d',strtotime($data['tran_date']));
					if(date('Y-m-d',strtotime($data['tran_date'])) == $date['tran_date']){
						//array_push($data_array_new, array('tran_date'=>$date, 'total' => 0.00));
						$data_array_new[$key] = $data;
					}
				}				
				
			}
			//pd($data_array_new);die();
			$data_string = '';
			if (!empty($data_array_new)) {
				foreach ($data_array_new as $da) {
					$data_string .= '{"date":"'.date('Y-m-d',strtotime($da['tran_date'])).'","value":'.$da['total'].'},';
				}
				$data_string = !empty($data_string) ? rtrim($data_string,","):'';
			}
			//echo $data_string; die();
			return $data_string;							
		}

		private function generateDateRange()
		{
			/*
				Please note, that our system should record the relevant entries in the relevant registers, statement, schedules, etc. between the date of nomination and date of result only. However, it shall also allow the user to make an entry which is beyond these two dates. These entries which are beyond the DON and DOR do not become visible in the said registers, statements, schedules, etc. , but they can be viewed where all the transactions are recorded..
			*/
				
			/* to override the date range */
			$candidate_details	= 	getMyDetails('');	

			$dateObj 			=	Carbon::now();
			$start_date 		=	$candidate_details->nomination_date;

			//$start_date			=	Carbon::parse($start_date)->gt($dateObj) ? $dateObj->toDateString() : $start_date;
			$start_date			= 	Carbon::parse($start_date);
			
            $result_date   		= 	$candidate_details->date_result;             
            $end_date			=	$result_date;
            $end_date 			= 	Carbon::parse($end_date);

			/* to override the date range */

			$dates = [];
			for($date = $start_date; $date->lte($end_date); $date->addDay()) {
				$dates[] = $date->format('Y-m-d');
			}
			return $dates;
		}

		public function dashboard(Request $request) {

			$data 							= 	[];
			$user_details 					= 	getMyDetails('');
			//pd($user_details);
			$myPrivilegeId					= CRUDBooster::myPrivilegeId();
			$data['myPrivilegeId'] 			=	$myPrivilegeId;

			$user_details_array 			=	['user_id' => $user_details->id,'election_id' => $user_details->election_id];
			$data['user_details'] 			=	$user_details;
			$total_expense_limit 			=	ExpenditureLimit::where(['election_id' => $user_details->election_id,'state_id' => $user_details->state_id])->first()->limit;
			$limit_exhausted 				=	$this->totalExpense($user_details_array);
			$data['total_expense_limit'] 	= 	$total_expense_limit;
			$data['limit_exhausted'] 		= 	$limit_exhausted;
			$data['available_limit'] 		= 	($total_expense_limit - $limit_exhausted) >= 0 ?$total_expense_limit - $limit_exhausted : 0;
			$data['bank_balance'] 			=	formatCurrency(getCurrentBalance());
			$data['cash_balance'] 			=	formatCurrency(getCurrentBalance('cash_register'));
			$data['party_amount'] 			=	formatCurrency(Schedule8::where(['user_id' => $user_details->id,'election_id' => $user_details->election_id])->sum('total_amount'));
			$data['other_amount'] 			=	formatCurrency(Schedule9::where(['user_id' => $user_details->id,'election_id' => $user_details->election_id])->sum('total_amount'));
			$data['cash_deposit_in_bank'] 	=	$this->cashDepositedInBank($user_details_array);
			$data['recent_records'] 		=	$this->recentBankTransaction($user_details_array);
			//pd($data['recent_records']);
			$data['election_expense_data']	=	$this->electionExpense($user_details_array);
			//pd($data['election_expense_data']);
			$data['notes_regulation'] 		=	NotesRegulation::orderBy('id','desc')->get();
	        $data['page_title'] 			= 	'Hello '.$user_details->name.', Welcome to your Dashboard!';
	        

	        

			if($myPrivilegeId == 5) {
				$data['script_files'] 			= 	"js_files/dashboard_su";

				$user_details_array 			=	['user_id' => $user_details->id,'election_id' => $user_details->election_id];
				$data['user_details'] 			=	$user_details; 

				$states = DB::table('user_states')->where('user_id',$user_details->id)->get();
				$data['states'] = $states;
				$state_ids = array();
				foreach ($states as $key => $value) {
					array_push($state_ids, $value->state_id);
				}
				$data['selected_id'] = $request->state_id? $request->state_id : 0;
				//pd($request->state_id);
				$data['dashboard_link'] = url()->current().'-dashboard?state_id='.$request->state_id;
				//pd($state_ids);
				$defaultState = $states[0]; 
				//$total_expense_limit 			=	ExpenditureLimit::where(['election_id' => $user_details->election_id,'state_id' => $defaultState->state_id])->first()->limit;
				

				$total_cash_in_hand = DB::table('user_cash_details')->where('election_id' , $user_details->election_id)->where('user_id' , $user_details->id);
				$total_cash_in_hand_transaction = PartyTransactionRegister::where('inkind',0)->where('tran_method','cash')->where('tran_type','Cr')->filterPartyTransactionData();
				$total_cash_expenses_transaction  = PartyTransactionRegister::where('inkind',0)->where('tran_method','cash')->where('tran_type','Dr')->filterPartyTransactionData();
				$total_bank_amount = DB::table('user_bank_details')->where('election_id' , $user_details->election_id)->where('user_id' , $user_details->id);
				$total_bank_amount_transaction  = PartyTransactionRegister::where('inkind',0)->where('tran_method','!=','cash')->where('tran_type','Cr')->filterPartyTransactionData();
				$total_bank_amount_expenses_transaction  = PartyTransactionRegister::where('inkind',0)->where('tran_method','!=','cash')->where('tran_type','Dr')->filterPartyTransactionData();
				$total_gross_receipt = PartyTransactionRegister::where('tran_type','Cr')->filterPartyTransactionData();
				$total_exp_party_propaganda = PartyTransactionRegister::where('tran_type','Dr')->where('given_to','P')->filterPartyTransactionData();
				$total_exp_candidate = PartyTransactionRegister::where('tran_type','Dr')->where('given_to','C')->filterPartyTransactionData();

				/* CHK and Implement State Search */
				if($data['selected_id']){
					$state_ids = [$data['selected_id']];
					$user_details_array['state_id'] = $data['selected_id']; 
					$total_cash_in_hand = $total_cash_in_hand->where('state_id' , $state_ids);
					$total_cash_in_hand_transaction = $total_cash_in_hand_transaction->where('state_id' , $state_ids);
					$total_cash_expenses_transaction = $total_cash_expenses_transaction->where('state_id' , $state_ids);
					$total_bank_amount = $total_bank_amount->where('state_id' , $state_ids);
					$total_bank_amount_transaction = $total_bank_amount_transaction->where('state_id' , $state_ids);
					$total_bank_amount_expenses_transaction = $total_bank_amount_expenses_transaction->where('state_id' , $state_ids);
					$total_gross_receipt = $total_gross_receipt->where('state_id',$data['selected_id']);
					$total_exp_party_propaganda = $total_exp_party_propaganda->where('state_id',$data['selected_id']);
					$total_exp_candidate = $total_exp_candidate->where('state_id',$data['selected_id']);
				}
				/* .CHK and Implement State Search */

				$total_expense_limit 			=	ExpenditureLimit::where('election_id' , $user_details->election_id)->whereIn('state_id' ,$state_ids)->get()->sum('limit');

				//pd($total_expense_limit);
				$limit_exhausted 				=	$this->totalExpenseParty($user_details_array);
				$data['total_expense_limit'] 	= 	$total_expense_limit;
				$data['limit_exhausted'] 		= 	$limit_exhausted;
				$data['available_limit'] 		= 	($total_expense_limit - $limit_exhausted) >= 0 ?$total_expense_limit - $limit_exhausted : 0;

				$data['election_expense_data']	=	$this->electionExpenseParty($user_details_array);
				$data['recent_records'] 		=	$this->recentPartyTransaction($user_details_array);

				$partyDataTran = $this->partyTranInfos();

				$total_cash_in_hand = $total_cash_in_hand->get()->sum('balance');
				$total_cash_in_hand_transaction = $total_cash_in_hand_transaction->get()->sum('tran_amount');
				$total_cash_expenses_transaction = $total_cash_expenses_transaction->get()->sum('tran_amount');
				$final_cash_in_hand = ($total_cash_in_hand + $total_cash_in_hand_transaction)-$total_cash_expenses_transaction;
				$data['opening_balance_cash'] = $final_cash_in_hand;

				$total_bank_amount = $total_bank_amount->get()->sum('balance');

				$total_bank_amount_transaction = $total_bank_amount_transaction->get()->sum('tran_amount');

				$total_bank_amount_expenses_transaction = $total_bank_amount_expenses_transaction->get()->sum('tran_amount');

				$final_bank_amount = ($total_bank_amount + $total_bank_amount_transaction)-$total_bank_amount_expenses_transaction;
				$data['opening_balance_bank'] = $final_bank_amount;

				$total_gross_receipt = $total_gross_receipt->get()->sum('tran_amount');
				$data['gross_receipts'] = $total_gross_receipt;

				$bkBal = 0;
	               if(sizeof($partyDataTran['bank_details'])>0){
	                  foreach($partyDataTran['bank_details'] as $Val){
	                     $bkBal = $bkBal+$Val->balance;
	                  }  
	               }

				$in_kind = $partyDataTran['in_kind']; $inKindBalance = 0;
				foreach($in_kind as $Inkind) {
                            $inKindBalance = $inKindBalance + $Inkind->tran_amount;
                        }

                $total_exp_party_propaganda = $total_exp_party_propaganda->get()->sum('tran_amount');
				$data['exp_party_propaganda'] = $total_exp_party_propaganda;

				$total_exp_candidate = $total_exp_candidate->get()->sum('tran_amount');
				$data['exp_candidate'] = $total_exp_candidate;


				$totalSu = 0;
				foreach($partyDataTran['lump_sum_data'] as $lsd){
					$totalSu += $lsd->tran_amount;
				}
				$data['exp_state_unit'] = $totalSu;

				//pd($data);pd($partyDataTran);

				 return view('party_state_dashboard',$data);
				
			}

			if($myPrivilegeId == 4) {
				$data['script_files'] 			= 	"js_files/dashboard_hq";

				$user_details_array 			=	['user_id' => $user_details->id,'election_id' => $user_details->election_id];
				$data['user_details'] 			=	$user_details; //pd($user_details);
				$total_expense_limit 			=	ExpenditureLimit::where(['election_id' => $user_details->election_id,'state_id' => $user_details->state_id])->first()->limit;
				$limit_exhausted 				=	$this->totalExpenseParty($user_details_array);
				$data['total_expense_limit'] 	= 	$total_expense_limit;
				$data['limit_exhausted'] 		= 	$limit_exhausted;
				$data['available_limit'] 		= 	($total_expense_limit - $limit_exhausted) >= 0 ?$total_expense_limit - $limit_exhausted : 0;

				$data['election_expense_data']	=	$this->electionExpenseParty($user_details_array);
				$data['recent_records'] 		=	$this->recentPartyTransaction($user_details_array);

				$partyDataTran = $this->partyTranInfos();

				$data['opening_balance_cash'] = $partyDataTran['candidate_details']->party_cash_in_hand;
				$bkBal = 0;
	               if(sizeof($partyDataTran['bank_details'])>0){
	                  foreach($partyDataTran['bank_details'] as $Val){
	                     $bkBal = $bkBal+$Val->balance;
	                  }  
	               }
				$data['opening_balance_bank'] = $bkBal;

				$in_kind = $partyDataTran['in_kind']; $inKindBalance = 0;
				foreach($in_kind as $Inkind) {
                            $inKindBalance = $inKindBalance + $Inkind->tran_amount;
                        }

				$data['gross_receipts'] = $partyDataTran['cash_in_hand'] + $partyDataTran['cheque_in_hand'] + $inKindBalance;

				$data['exp_party_propaganda'] = $partyDataTran['total_amount2']+$partyDataTran['outstanding_amount'];
				$data['exp_candidate'] = $partyDataTran['s7_total']+$partyDataTran['s8_total']+$partyDataTran['s9_total']+$partyDataTran['s10_total']+$partyDataTran['s11_total'];


				$totalSu = 0;
				foreach($partyDataTran['lump_sum_data'] as $lsd){
					$totalSu += $lsd->tran_amount;
				}
				$data['exp_state_unit'] = $totalSu;

				//pd($data);pd($partyDataTran);
				$cashExpanses = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->get()->sum('tran_amount');
				$chqExpanses = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->get()->sum('tran_amount');	
				$data['closing_balance_cash'] = $totCashInhandLast = ( $data['opening_balance_cash'] + $partyDataTran['cash_in_hand'] ) - ( $cashExpanses );
				$data['closing_balance_bank'] = $totBankBalLast = $bkBal + $partyDataTran['cheque_in_hand'] - ($chqExpanses);

				 return view('party_hq_dashboard',$data);
				
			}
			$data['script_files'] 			= 	"js_files/dashboard";
	        return view('dashboard',$data);
		}

		public function partyTranInfos() {
			$data['candidate_details'] = getMyDetails('');
			//pd($data['candidate_details']);
			$user_id = $data['candidate_details']->id;
			$data['bank_details'] = DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get(['bank_name','branch_name','balance']);
			$data['election_details']  = getElectionDates();
			$data['cash_in_hand']  = PartyTransactionRegister::where('inkind',0)->where('tran_method','cash')->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

			$data['cheque_in_hand']  = PartyTransactionRegister::where('inkind',0)->where('tran_method','!=','cash')->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

			
			//$data['in_kind']  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');
			$data['in_kind']  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get(['tran_description','tran_amount']);
			$tranArr1 = PartySchedule1::filterOnlyPartyTransactionData()->with(['party_transaction_register' => function ($query) {
					      	$query->where('tran_type','Dr');
					      	//$query->where('tran_type','Dr');
					}])->get()->toArray();
			//pd($tranArr1);
			$tran_cash = 0;$tran_cheque = 0;$tran_inkind = 0;$outstanding_amount = 0;$total_amount2 = 0;
			foreach ($tranArr1 as $tA1) {
				if (!empty($tA1['party_transaction_register'])) {
					$tran_cash += ($tA1['party_transaction_register']['tran_method'] == 'cash' && $tA1['party_transaction_register']['inkind'] == 0 && $tA1['party_transaction_register']['given_to'] == 'P') ? $tA1['party_transaction_register']['tran_amount'] : 0;
					$tran_cheque += ($tA1['party_transaction_register']['tran_method'] != 'cash'  && $tA1['party_transaction_register']['inkind'] == 0 && $tA1['party_transaction_register']['given_to'] == 'P') ? $tA1['party_transaction_register']['tran_amount'] : 0;
					$tran_inkind += ($tA1['party_transaction_register']['inkind'] == 1 && $tA1['party_transaction_register']['given_to'] == 'P') ? $tA1['party_transaction_register']['tran_amount'] : 0;
					$outstanding_amount += $tA1['outstanding_amount'];
					//$total_amount2 += $tA1['total_amount'];
				}
			}
			$data['tran_cash'] = $tran_cash;
			$data['tran_cheque'] = $tran_cheque;
			$data['tran_inkind'] = $tran_inkind;
			$data['outstanding_amount'] = $outstanding_amount;
			$data['total_amount2'] = $tran_cash + $tran_cheque;
			
			$data['s2_total'] = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','Y')->get()->sum('total_amount');
			$data['s2a_total'] = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','N')->get()->sum('total_amount');
			$data['s3_total'] = PartySchedule3::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s4_total'] = PartySchedule4::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s5_total'] = PartySchedule5::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s6_total'] = PartySchedule6::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s7_total'] = PartySchedule7::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s8_total'] = PartySchedule8::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s9_total'] = PartySchedule9::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s10_total'] = PartySchedule10::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			$data['s11_total'] = PartySchedule11::filterOnlyPartyTransactionData()->get()->sum('total_amount');
			
			$data['s2_total_out'] = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','Y')->get()->sum('outstanding_amount');
			$data['s2a_total_out'] = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','N')->get()->sum('outstanding_amount');
			$data['s3_total_out'] = PartySchedule3::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s4_total_out'] = PartySchedule4::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s5_total_out'] = PartySchedule5::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s6_total_out'] = PartySchedule6::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s7_total_out'] = PartySchedule7::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s8_total_out'] = PartySchedule8::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s9_total_out'] = PartySchedule9::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s10_total_out'] = PartySchedule10::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			$data['s11_total_out'] = PartySchedule11::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
			

			$data['lump_sum_data'] = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','A55')->orderBy('tran_date','desc')->get();
			//pd($data['s4_total']);
		
			return $data;
		}
 

	}