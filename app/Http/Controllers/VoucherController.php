<?php namespace App\Http\Controllers;
	use Session;
	use DB;
	use CRUDBooster;
	use Illuminate\Http\Request;
	use Helper;
	use Illuminate\Support\Facades\Validator;
	use Redirect;
	use Carbon\Carbon;
	use App\BankRegister;
	use App\PartyTransactionRegister;
    
	class VoucherController extends \crocodicstudio\crudbooster\controllers\CBController {		

		public function index(Request $request) {
			$data 					= 	[];	
			$user_details 			=	getMyDetails('');
			$data['action_url'] = $request->url();	
			$data['page_title']		= 	'Vouchers';

			if(CRUDBooster::myPrivilegeId() == 3){
				$resultObj 		= 	BankRegister::select('tran_date','tran_amount','tran_purpose','schedule_name','vouchar_filename','vouchar_remarks')
													  ->where('user_id',$user_details->id)
													  ->where('election_id',$user_details->election_id)
													  ->where('trans_parent_id',0)
													  ->where('tran_type','Dr')
													  ->orderBy('tran_date','asc');
			}
			elseif (CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5) {
				$resultObj 		= 	PartyTransactionRegister::select('tran_date','tran_amount','tran_purpose','tag_schedule','tagged_parts','vouchar_filename','vouchar_remarks','expense_type')
				->leftJoin('expensetypes_master','party_transaction_register.tran_purpose', '=', 'expensetypes_master.id')													
													  ->where('user_id',$user_details->id)
													  ->where('election_id',$user_details->election_id)
													  ->where('trans_parent_id',0)
													  ->where('tran_type','Dr')
													  ->orderBy('tran_date','asc');

			  	if(!empty($request->srch_key)){
					$param = urldecode(($request->srch_key));
					$resultObj = $resultObj->where(function ($query) use ($param) {
                		$query->where('tran_purpose','like','%'.$param.'%')
                      		  ->orWhere('expense_type','like','%'.$param.'%')
                      		  ->orWhere('vouchar_filename','like','%'.$param.'%')
                      		  ->orWhere('vouchar_remarks','like','%'.$param.'%');
            		});
				}
			 }else{
			 	return true;
			 } 
	

			$resultObj = !empty($request->from_date) && !empty($request->to_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			
				
			
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';	
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';	
												  
				//pd($data['result']);
			if (CRUDBooster::myPrivilegeId() == 3) {
	        	return view('voucher-list',$data);
	    	}
			elseif (CRUDBooster::myPrivilegeId() == 4) {
	        	return view('voucher-list-party-hq',$data);
	    	}
	    	elseif (CRUDBooster::myPrivilegeId() == 5) {
	        	return view('voucher-list-party-su',$data);
	    	}else{
	    		return true;
	    	}
		} 

	}