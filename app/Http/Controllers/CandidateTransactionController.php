<?php namespace App\Http\Controllers;

	//use Session;
	//use Request;
use DB;
use CRUDBooster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\BankRegister;
use App\CashRegister;
use App\PartyMaster;
use App\Sc1NatureOfExpenditure;
use App\Sc6NatureOfExpenses;
use App\Schedule1;
use App\Schedule2;
use App\Schedule3;
use App\Schedule4;
use App\Schedule4A;
use App\Schedule5;
use App\Schedule6;
use App\Schedule7;
use App\Schedule8;
use App\Schedule9;
use App\PurchaseRegister;
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
use PDF;
use Helper;

class CandidateTransactionController extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->title_field = "tran_source_name";
		$this->limit = "20";
		$this->orderby = "id,desc";
		$this->global_privilege = true;
		$this->button_table_action = true;
		$this->button_bulk_action = true;
		$this->button_action_style = "button_icon";
		$this->button_add = true;
		$this->button_edit = true;
		$this->button_delete = true;
		$this->button_detail = true;
		$this->button_show = true;
		$this->button_filter = true;
		$this->button_import = false;
		$this->button_export = false;
		$this->table = "cash_register";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = [];
		$this->col[] = ["label"=>"Tran Date","name"=>"tran_date"];
		$this->col[] = ["label"=>"Tran Amount","name"=>"tran_amount"];
		$this->col[] = ["label"=>"Tran Source","name"=>"tran_source"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
		$this->form = [];
			//$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'users,id'];
			//$this->form[] = ['label'=>'Election Id','name'=>'election_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'elections,id'];
			//$this->form[] = ['label'=>'Bank Register Id','name'=>'bank_register_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'bank_register,tran_source_name'];
			//$this->form[] = ['label'=>'Trans Parent Id','name'=>'trans_parent_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'trans_parent,id'];
		$this->form[] = ['label'=>'Tran Date','name'=>'tran_date','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Tran Amount','name'=>'tran_amount','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source','name'=>'tran_source','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Name','name'=>'tran_source_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Address','name'=>'tran_source_address','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Receipt No','name'=>'receipt_no','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Purpose','name'=>'tran_purpose','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Purpose Other','name'=>'tran_purpose_other','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Deposited Same Day','name'=>'deposited_same_day','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Method','name'=>'tran_method','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bank Deposited','name'=>'bank_deposited','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Own Bank','name'=>'is_own_bank','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'Array'];
			//$this->form[] = ['label'=>'Tran Source Bank Name','name'=>'tran_source_bank_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Bank Branch','name'=>'tran_source_bank_branch','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Remarks','name'=>'tran_remarks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Type','name'=>'tran_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Description','name'=>'tran_description','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Quantity','name'=>'tran_quantity','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Rate','name'=>'tran_rate','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Receiver Id','name'=>'tran_receiver_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tran_receiver,id'];
			//$this->form[] = ['label'=>'Tran Receiver Name','name'=>'tran_receiver_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Receiver Address','name'=>'tran_receiver_address','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tag Schedule','name'=>'tag_schedule','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bank Consolidated','name'=>'bank_consolidated','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'user,id'];
			//$this->form[] = ['label'=>'Election Id','name'=>'election_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'election,id'];
			//$this->form[] = ['label'=>'Bank Register Id','name'=>'bank_register_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'bank_register,tran_source_name'];
			//$this->form[] = ['label'=>'Trans Parent Id','name'=>'trans_parent_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'trans_parent,id'];
			//$this->form[] = ['label'=>'Tran Date','name'=>'tran_date','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Amount','name'=>'tran_amount','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source','name'=>'tran_source','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Name','name'=>'tran_source_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Address','name'=>'tran_source_address','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Receipt No','name'=>'receipt_no','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Purpose','name'=>'tran_purpose','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Purpose Other','name'=>'tran_purpose_other','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Deposited Same Day','name'=>'deposited_same_day','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Method','name'=>'tran_method','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bank Deposited','name'=>'bank_deposited','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Is Own Bank','name'=>'is_own_bank','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'Array'];
			//$this->form[] = ['label'=>'Tran Source Bank Name','name'=>'tran_source_bank_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Source Bank Branch','name'=>'tran_source_bank_branch','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Remarks','name'=>'tran_remarks','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Type','name'=>'tran_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Description','name'=>'tran_description','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Quantity','name'=>'tran_quantity','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Rate','name'=>'tran_rate','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Receiver Id','name'=>'tran_receiver_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tran_receiver,id'];
			//$this->form[] = ['label'=>'Tran Receiver Name','name'=>'tran_receiver_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tran Receiver Address','name'=>'tran_receiver_address','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tag Schedule','name'=>'tag_schedule','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bank Consolidated','name'=>'bank_consolidated','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();


	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here

	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }


	    //By the way, you can still create your own method in here... :) 

	    public function getCashDepositList(Request $request){

			//Create your own query 
	    	$userdetails = getMyDetails('');
	    	$data = [];
	    	$data['page_title'] = 'Deposit of Self Cash in Bank (Opened for Election Expense)';
	    	$data['ignore_chks'] = true;
	    	$data['icon_header'] = 'icon_b depositself_b';
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/candidate_transaction/cash-deposit';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = false;
	    	$data['from_date'] = $request->from_date;
	    	$data['to_date'] = $request->to_date;
	    	$data['action_url'] = url('admin/candidate_transaction/cash-deposit-list');
			//echo CRUDBooster::isCreate();
	    	$resultObj = DB::table('bank_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',0)
	    	->where('is_petty',0)
	    	->where('tran_source','Self')
	    	->where('tran_purpose','self-deposit')
	    	->where('is_own_bank','Y')
	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;					
	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate();
			//print_r($data['result']);
	    	return view('candidate-cash-deposit-list',$data);
	    }

	    public function getCashDepositDelete($id){

	    	if(DB::table('bank_register')->where('id',$id)->where('user_id',CRUDBooster::myId())->delete())
	    		return redirect('admin/candidate_transaction/cash-deposit-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
	    }

	    public function getcashDeposit(){



			//Candidate deposit cash form calling area
	    	$data['page_title'] = "Deposit Voucher";
	    	$data['script_files'] = "js_files/candidate_cash_deposit";
	    	$data['icon_header'] = ' icon_b depositself_b ';
	    	return view('cash_deposit',$data);

	    }


		/* Cash received from other person party but may or may not deposited to bank.
		Operation occur when when deposited to bank/not to bank same day
		*/

		public function getPartyPersonCashDepositList(Request $request){
			//Create your own query 
			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Cash Receipts - From Political Party & Others';
			$data['ignore_chks'] = true;			
			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/candidate_transaction/party-person-cash-deposit';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			$data['icon_header'] = 'icon_b cashdepositbank_b';
			//echo CRUDBooster::isCreate();
			$resultObj = DB::table('cash_register')
			->where('user_id',$userdetails->id)
			->where('election_id',$userdetails->election_id)
			->where('inkind',0)
			->where('is_petty',0)
			->where(function($query) {
				$query->where('tran_source', '=', "party")
				->orWhere('tran_source', '=', "other");
			})
			->where('tran_type','Cr');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate();
			//->paginate(config('app.pagination'));
			//print_r($data['result']);
			return view('party-person-cash-deposit-list',$data);
		}

		public function getPartyPersonCashDepositDelete($id){

			if($id == 0) return redirect('admin/test/party-person-cash-deposit-list')->with(['message'=> "Faliure. There is some problem",'message_type'=>'warning']);
			if(DB::table('cash_register')->where('id',$id)->where('user_id',CRUDBooster::myId())->delete()){
				DB::table('cash_register')->where('trans_parent_id',$id)->where('user_id',CRUDBooster::myId())->delete();
				DB::table('bank_register')->where('cash_register_id',$id)->where('user_id',CRUDBooster::myId())->delete();
				DB::table('schedule8')->where('cash_register',$id)->delete();
				DB::table('schedule9')->where('cash_register',$id)->delete();

				return redirect('admin/candidate_transaction/party-person-cash-deposit-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
			}
		}

		public function getPartyPersonCashDeposit(){
			$data['party_all'] = PartyMaster::all();
			$data['page_title'] = "Receipt Voucher";
			$data['icon_header'] = 'icon_b cashdepositbank_b';
			$data['script_files'] = "js_files/cash_party_other";
			return view('party_person_cash_deposit',$data);
			
		}

		/* Cash received from other person party deposited to bank.
		Operation may occur when cash received and not deposited to bank, same day
		*/
		public function getPartyPersonCashToBank(){

			//$data['script_files'] = "js_files/cash_party_other";
			$data['page_title'] = 'Transfer Cash from Party/ Person to Bank';
			$data['icon_header'] = 'icon_b cashdepositbank_b';
			$user_id = CRUDBooster::myId();
			$data['script_files'] = "js_files/party_person_cash_to_bank";
			$data['cash_record'] = DB::select("select cr.`id`,cr.`trans_parent_id`,
				cr.`tran_date`,cr.`tran_amount`,cr.`tran_source`, cr.`tran_source_name` 
				from `cash_register` as cr 
				where cr.`bank_deposited` = 'N' AND cr.`trans_parent_id` = '0' 
				AND cr.`id` NOT IN (select `cash_register_id` from `bank_register` where 
				`user_id`='". $user_id ."' AND `tran_type`='Cr' ) AND cr.`user_id`='". $user_id ."'");

			return view('party_person_cash_to_bank',$data);
			
		}

		// When Check Draft Pay order is deposited to bank
		
		public function getCheckDraftToBank(){

			$data['page_title'] = "Deposit Voucher (Cheque, DD, PO & Online Transfer) ";
			$data['script_files'] = "js_files/check_draft_to_bank";
			$data['icon_header'] = 'icon_b noncash_b';
			return view('check_draft_to_bank',$data);
			
		}

		// From The ccStudio the Listing page menu is fired and it willopen the related 
		// listing page the add menu will call the add form url 

		public function getCheckDraftToBankList(Request $request){
			//Create your own query 
			$data = [];
			$data['page_title'] = "Deposit of Cheque, DD, PO & Online Transfer";
			$data['icon_header'] = 'icon_b noncash_b';
			$data['action_url'] = $request->url();
			$data['ignore_chks'] = true;
			$userdetails = getMyDetails('');
			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/candidate_transaction/check-draft-to-bank';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			//echo CRUDBooster::isCreate();
			$resultObj = DB::table('bank_register')
			->where('user_id',$userdetails->id)
			->where('election_id',$userdetails->election_id)
			->where('inkind',0)
			->where('is_petty',0)
			->whereIn('tran_method', array('cheque','draft', 'pay_order','online_transfer'))
			->where('tran_type','Cr');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate();
			//print_r($data['result']);
			return view('check-draft-deposit-to-bank-list',$data);
		}


		//Delete record from the menu 

		public function getCheckDraftPayorderToBankDelete($id){
			
			if($id == 0) return redirect('admin/candidate_transaction/check-draft-deposit-to-bank-list')->with(['message'=> "Faliure. There is some problem",'message_type'=>'warning']);
			if(DB::table('bank_register')->where('id',$id)->where('user_id',CRUDBooster::myId())->delete()){
				
				if (BankRegister::where('tran_purpose', '=', 'election_expense')->count() > 0) {
					DB::table('schedule8')->where('bank_register',$id)->delete();
				}else{
					DB::table('schedule9')->where('bank_register',$id)->delete();
				}
				DB::table('schedule8')->where('bank_register',$id)->delete();
				DB::table('schedule9')->where('bank_register',$id)->delete();

				return redirect('admin/candidate_transaction/check-draft-to-bank-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
			}
		}


		// Record Election Expense total 6 schedule in drop down
		// First create the listing of the file
		public function getElectionExpensesListing(Request $request){
			
			$data = [];
			$userdetails = getMyDetails('');
			$data['page_title'] = 'Record Election Expenses';
			$data['icon_header'] = 'icon_b recordexpense_b';
			$data['action_url'] = $request->url();
			$data['ignore_chks'] = true;

			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/candidate_transaction/election-expense';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			$data['script_files'] = "js_files/election_expense_list";
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			//echo CRUDBooster::isCreate();
			$resultObj = DB::table('bank_register')
			->leftjoin('scheduleText_master','bank_register.schedule_name','=','scheduleText_master.schedule_name_txt')
			->where('user_id',$userdetails->id)
			->where('election_id',$userdetails->election_id)
			->where('inkind',0)
			->where('is_petty',0)
			->whereNotNull('bank_register.schedule_name')
			->where('tran_type','Dr');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			
			if(!empty($request->srch_key)){
				$param = urldecode(str_replace(",","",$request->srch_key));
				$resultObj = $resultObj->where(function ($query) use ($param) {
					$query->where('tran_method','like','%'.$param.'%')
					->orWhere('tran_amount','like','%'.$param.'%')
                      		  //->orWhere('vouchar_filename','like','%'.$param.'%')
					->orWhere('scheduleText_master.text','like','%'.$param.'%');
				});
			}

			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';					
			//print_r($data['result']);
			return view('election-expense-list',$data);
		}

		public function getElectionExpense(){

			$data['page_title'] = 'Add Election Expenses';
			$data['icon_header'] = 'icon_b recordexpense_b';
			$data['script_files'] = "js_files/election_expense";
			return view('election_expense',$data);
			
		}
		
		// Delete from bank_register and from related Schedule table. Relation with the 
		// selection table is 'schedule_name' in the bank_register

		public function getElectionExpensesDelete($id){
			//dd($id);

			$schedule_name = BankRegister::where('id', $id)->pluck('schedule_name');

			if(DB::table('bank_register')->where('id',$id)->where('user_id',CRUDBooster::myId())->delete()){
				
				switch ($schedule_name[0]) {
					case 'schedule1':
					DB::table('schedule1')->where('bank_reg_id',$id)->delete();
					break;

					case 'schedule2':
					DB::table('schedule2')->where('bank_reg_id',$id)->delete();
					break;

					case 'schedule3':
					DB::table('schedule3')->where('bank_reg_id',$id)->delete();
					break;

					case 'schedule4':
					DB::table('schedule4')->where('bank_reg_id',$id)->delete();
					break;

					case 'schedule5':
					DB::table('schedule5')->where('bank_reg_id',$id)->delete();
					break;

					case 'schedule6':
					DB::table('schedule6')->where('bank_reg_id',$id)->delete();
					break;
				}

				//Need to remove from Schedule7
				if (Schedule7::where('bank_register', '=', $id)->exists()) {
					DB::table('schedule7')->where('bank_register',$id)->delete();
				}

				
				return redirect('admin/candidate_transaction/election-expenses-listing')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
			}

		}
		

		/*  
		*******************************************
		All the data save part will start form here
		*******************************************
		*/
		// Form selection Part here we need to choose one schedule from the 6 schedule

		public function ChooseScheduleForm(Request $request){

			$mydetails = getMyDetails($user_id);
			$data['candidate_name'] =$mydetails->name;
			
			$selectedSchedule = Input::get('schedule_selection'); 
			if($selectedSchedule ==''){
				return redirect()->back();
			}
			$data['script_files'] = "js_files/schedules";
			$data['party_all'] = PartyMaster::all();


			
			switch ($selectedSchedule) {
				case 'schedule1':
				$data['natures'] = Sc1NatureOfExpenditure::where('is_active','Y')->pluck('title','id');
				$data['schedule_title'] = "Schedule 1";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule1", $data );
				break;

				case 'schedule2':
				$data['schedule_title'] = "Schedule 2";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule2", $data );
				break;

				case 'schedule3':
				$data['schedule_title'] = "Schedule 3";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule3", $data );
				break;

				case 'schedule4':
				$data['schedule_title'] = "Schedule 4";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule4", $data );
				break;

				case 'schedule4A':
				$data['schedule_title'] = "Schedule 4A";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule4A", $data );
				break;

				case 'schedule5':
				$data['schedule_title'] = "Schedule 5";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule5", $data );
				break;

				case 'schedule6':
				$data['expenditure'] = Sc6NatureOfExpenses::where('is_active','Y')->pluck('title','id');
				$data['schedule_title'] = "Schedule 6";
				$data['icon_header'] = 'icon_b expstatements_b';
				return view( "schedules.schedule6", $data );
				break;
			}

		}	

		//After selecting schedule process form save

		public function ScheduleSelectionFormSave(Request $request){

			// need to finalize flds 
			$rules = array(
				'date' => 'required|date',
				'payment_type'=>'required',
				'total_amount'=>'required|integer|min:1',

			);
			
			if ( $request->input('payment_type') == 'cash' ) {
				$rules['paid_incurred_by'] = 'required';
				//$rules['bill_voucher_no'] = 'required';

			}else{
				$rules['cheque_no'] = 'required';
				$rules['payee_name'] = 'required';
			}
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails()):
				$message = $validator->errors()->all();
				
				return redirect('/admin/candidate_transaction/election-expense')->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

				//Need to take some action on this
			else:
				$user_id = CRUDBooster::myId();
				$mydetails = getMyDetails($user_id);

				$schedule_choice = Input::get('schedulename');
				$payment_type = Input::get('payment_type');
				$BankRegister = new BankRegister;
				$date_input = Input::get('date');

				if(Input::get('pol_party_name')):
					$party_record = PartyMaster::find(Input::get('pol_party_name'));
					$party_name  = $party_record->party_name; 
				else:
					$party_name  = ""; 
				endif;
				$save_success = "false";

				$fileNameUploaded = ''; 
			//print_r($request);
			//die('asas');


				if ($request->hasFile('vouchar_filename')) {
					$image = $request->file('vouchar_filename');
					$name = time().'.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/uploads');
					$fileNameUploaded =  "uploads/".  $name;
					$image->move($destinationPath, $name);
				//$article->image = $name;
				}

				// if($request->vouchar_filename !=''){
				// $contents = file_get_contents($request->vouchar_filename);
				// $fileNameUploaded = 'uploads/'. substr($request->vouchar_filename, strrpos($request->vouchar_filename, '/') + 1);
				// Storage::put($fileNameUploaded, $contents);
				// }
				if($schedule_choice == 'schedule1'){
					$exp = getExpenseType(Input::get('nature_id'),'schedule1');
				}else if($schedule_choice == 'schedule6'){
					$exp = getExpenseType(Input::get('nature_expenses_id'),'schedule6');
				}else{
					$exp = Input::get('nature_of_expenses')?Input::get('nature_of_expenses'):'';
				}
				
				if(Input::get('payment_type')=="cash"){	
				//Save to cash register as guided by client
					$CashRegister        = new CashRegister;
					$CashRegister->user_id = CRUDBooster::myId();
					$CashRegister->election_id = $mydetails->election_id;
					$CashRegister->tran_date = $date_input;
					$CashRegister->tran_amount = Input::get('total_amount');

					$CashRegister->tran_source_name = (Input::get('paid_incurred_by') =="self")?"Own fund":(Input::get('paid_incurred_by') =="pol_party")?Input::get('other_per_name'):Input::get('other_per_name');

					$CashRegister->tran_method = Input::get('payment_type');
				$CashRegister->tran_type = 'Dr';//'Cr';
				$CashRegister->tran_receiver_name = Input::get('payee_name');//'Own';
				$CashRegister->deposited_same_day ="N";
				$CashRegister->bank_deposited = "N";

				$CashRegister->receipt_no = (Input::get('bill_voucher_no')!="")?Input::get('bill_voucher_no'):"";
				$CashRegister->is_own_bank = 'Y';
				$CashRegister->tran_source_bank_name = $mydetails->bankname;
				$CashRegister->tran_source_bank_branch = $mydetails->branch_address;


				$CashRegister->tran_quantity = Input::get('quantity');
				$CashRegister->tran_rate = Input::get('rate_per_unit');


				$CashRegister->balance = getCurrentBalance('cash_register');

				// if(Input::get('paid_incurred_by') == "self"){
				// 	$CashRegister->tran_source ="Self";
				// 	$CashRegister->tran_source_name ="Self";
				// 	$CashRegister->tran_amount_brkup_ow = Input::get('total_amount');
				// 	$CashRegister->balance = getCurrentBalance('cash_register') - Input::get('total_amount');

				// }else if(Input::get('paid_incurred_by') == "pol_party"){
				// 	$CashRegister->tran_source ="Party";
				// 	$CashRegister->tran_source_name = getPartyNameById(Input::get('pol_party_name'));
				// 	$CashRegister->tran_amount_brkup_pt = Input::get('total_amount');

				// }else{
				// 	$CashRegister->tran_source = 'Others';
				// 	$CashRegister->tran_source_name = Input::get('other_per_name');
				// 	$CashRegister->tran_amount_brkup_ot = Input::get('total_amount');

				// }

				$CashRegister->tran_source ="Self";
				$CashRegister->tran_source_name ="Self";
				$CashRegister->tran_amount_brkup_ow = Input::get('candidate_or_agent');
				$CashRegister->tran_amount_brkup_pt = Input::get('pol_party');
				$CashRegister->tran_amount_brkup_ot = Input::get('other');
				$CashRegister->source_name_pt = getPartyNameById(Input::get('pol_party_name'));
				$CashRegister->source_name_ot = Input::get('other_per_name');
				$CashRegister->balance = getCurrentBalance('cash_register') - Input::get('total_amount');



				$CashRegister->tran_remarks = Input::get('remarks')?Input::get('remarks'):"";//Input::get('remarks');
				$CashRegister->tran_description = (Input::get('description')!="")?Input::get('description'):"";

				$CashRegister->tran_purpose = $exp;

				$CashRegister->vouchar_filename = $fileNameUploaded;
				$CashRegister->vouchar_remarks = Input::get('vouchar_remarks');
				$CashRegister->receipt_date = Input::get('bill_voucher_date');
				
				$CashRegister->save();
				$CashReg_last_id = $CashRegister->id;
			}
			// For any schedule bank register will be populated
			$currentBalance = getCurrentBalance() - Input::get('total_amount');
			$record_bank = [
				"user_id"=>$user_id,
				"election_id"=>$mydetails->election_id,
				"tran_date"=>$date_input,
				"tran_amount"=>Input::get('total_amount'),
				"tran_source"=> (Input::get('paid_incurred_by') =="self")?"Self":"Others",
				"tran_source_name"=>(Input::get('paid_incurred_by') =="self")?"Own fund":Input::get('paid_incurred_by'),
				"receipt_no"=>(Input::get('cheque_no')!="")?Input::get('cheque_no'):"",	
				"is_own_bank"=>'Y',
				"tran_method"=>Input::get('payment_type'),
				"tran_type"=>'Dr',
				"tran_description"=>(Input::get('description')!="")?Input::get('description'):"",	
				"tran_receiver_name"=>Input::get('payee_name')?Input::get('payee_name'):'Own',
				"tran_remarks"=>Input::get('remarks')?Input::get('remarks'):"",//"Day to day accounts of election expenditure",
				"tran_source_bank_name"=>$mydetails->bankname,
				"tran_source_bank_branch"=>$mydetails->branch_address,
				"tran_amount_brkup_ow"=>Input::get('candidate_or_agent'),
				"tran_amount_brkup_pt"=>Input::get('pol_party'),
				"tran_amount_brkup_ot"=>Input::get('other'),
				"tran_quantity" => Input::get('quantity'),
				"tran_rate" => Input::get('rate_per_unit'),
				"source_name_pt" => getPartyNameById(Input::get('pol_party_name')),
				"source_name_ot" => Input::get('other_per_name'),
				"balance"=>$currentBalance,
				"schedule_name"=>$schedule_choice,
				"cash_register_id" => $CashReg_last_id,
				"vouchar_filename" => $fileNameUploaded,
				"vouchar_remarks"  => Input::get('vouchar_remarks'),
				"tran_purpose"  => $exp,
				"receipt_date"  => Input::get('bill_voucher_date')

			];
			if(Input::get('payment_type')!="cash"){
				$BankRegister_last_id = $this->saveToBankRegister($record_bank);
			}else{
				$record_bank["cash_reg_refe"] = 1;
				$BankRegister_last_id = $this->saveToBankRegister($record_bank);
			}
			// Save data in Schedule7 if there is any value 'candidate_or_agent' fld
			// This means that candidate own fund used for the election campaign 
			if ( Input::get('candidate_or_agent') > 0):  //  || Input::get('paid_incurred_by') == "self"
			$recordS7= [
				"name"=>$mydetails->name,
				"address"=>$mydetails->candidate_address,
				"date"=>$date_input,
				"cash"=>Input::get('payment_type'),
				"dd_or_cheque_no"=>(Input::get('payment_type')=="cash")?"":Input::get('cheque_no'),	
				"total_amount"=>Input::get('candidate_or_agent'),
				"cash_register"=>(Input::get('payment_type')=="cash")?$CashReg_last_id:0,
				"bank_register"=>(Input::get('payment_type')!="cash")?$BankRegister_last_id:0,
				"remarks"=>(Input::get('remarks') !="")?Input::get('remarks'):$schedule_choice,
				"party_name"=>$mydetails->party_name,
				"user_id" => $user_id,
				"election_id" => $mydetails->election_id
			];

			Schedule7::create($recordS7);
		endif;

		switch ($schedule_choice):

			case 'schedule1':

				//Save the data in Schedule1
			if($BankRegister_last_id || $CashReg_last_id):
				$record= [
					"nature_id"=>Input::get('nature_id'),
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),	
					"party_name"=>$party_name,
					"other_per_name"=>(Input::get('other_per_name')=="")?"":Input::get('other_per_name'),
					"date"=>$date_input,
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];

				Schedule1::create($record);
				$save_success = "true";
			endif;
			break;

			case 'schedule2':
				//$BankRegister_last_id = $this->saveToBankRegister($record_bank);
				//Save the data in Schedule2
			if($BankRegister_last_id || $CashReg_last_id):
				$record= [
					"date"=>$date_input,
					"venue"=>Input::get('venue'),
					"name_of_star_campaigne"=>Input::get('name_of_star_campaigne'),
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"star_campaign_party" =>Input::get('star_campaign_party'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),	
					"party_name"=>$party_name,
					"other_per_name"=>Input::get('other_per_name'),
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"remarks"=>(Input::get('remarks') !="")?Input::get('remarks'):"",
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];

				Schedule2::create($record);
				$save_success = "true";
			endif;
			break;

			case 'schedule3':
				//$BankRegister_last_id = $this->saveToBankRegister($record_bank);
				//Save the data in Schedule3
			if($BankRegister_last_id || $CashReg_last_id):
				$record= [
					"date"=>$date_input,
					"nature_of_expenses"=>Input::get('nature_of_expenses')?Input::get('nature_of_expenses'):'',
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),	
					"other_per_name"=>Input::get('other_per_name'),
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"remarks"=>(Input::get('remarks') !="")?Input::get('remarks'):"",
					"party_name"=>$party_name,
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];

				Schedule3::create($record);
				$save_success = "true";
			endif;
			break;

			case 'schedule4':
				//$BankRegister_last_id = $this->saveToBankRegister($record_bank);
				//Save the data in Schedule4
			if($BankRegister_last_id || $CashReg_last_id):
				$is_self_owned = (Input::get('self_owned')=="checked")?"Y":"N";
				$record= [
					"date"=>$date_input,
					"nature_of_medium"=>Input::get('nature_of_medium'),
					"medium_duration"=>Input::get('medium_duration'),
					"media_provider_name"=>Input::get('media_provider_name'),
					"media_provider_address"=>Input::get('media_provider_address'),
					"agency_name"=>Input::get('agency_name'),	
					"agency_address"=>Input::get('agency_address'),
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),
					"other_per_name"=>Input::get('other_per_name'),
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"party_name"=>$party_name,
					"self_owned"=>$is_self_owned,
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id

				];
				Schedule4::create($record);

				$save_success = "true";
			endif;
			break;

			case 'schedule5':
				//$BankRegister_last_id = $this->saveToBankRegister($record_bank);
				//Save the data in Schedule4
			if($BankRegister_last_id || $CashReg_last_id):
				$record= [
					"date"=>$date_input,
					"vehicle_regn_no_or_type"=>Input::get('vehicle_regn_no_or_type'),
					"vehicle_type"=>Input::get('vehicle_type'),
					"hiring_rate_or_mentainance"=>Input::get('hiring_rate_or_mentainance'),
					"fuel_charges"=>Input::get('fuel_charges'),
					"driver_charges"=>Input::get('driver_charges'),	
					"days_used"=>Input::get('days_used'),
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),
					"other_per_name"=>Input::get('other_per_name'),
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"party_name"=>$party_name,
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];

				Schedule5::create($record);
				$save_success = "true";
			endif;
			break;

			case 'schedule6':
				//$BankRegister_last_id = $this->saveToBankRegister($record_bank);
				//Save the data in Schedule4
			if($BankRegister_last_id || $CashReg_last_id):
				$record= [
					"date"=>$date_input,
					"venue"=>Input::get('venue'),
					"nature_expenses_id"=>Input::get('nature_expenses_id'),
					"rate"=>Input::get('rate'),
					"no_agents_or_kiosks"=>Input::get('no_agents_or_kiosks'),
					"total_amount"=>Input::get('total_amount'),
					"candidate_or_agent"=>Input::get('candidate_or_agent'),
					"pol_party"=>Input::get('pol_party'),
					"other"=>Input::get('other'),
					"other_per_name"=>Input::get('other_per_name'),
					"bank_reg_id"=>$BankRegister_last_id?$BankRegister_last_id:0,
					"cash_reg_id"=>$CashReg_last_id?$CashReg_last_id:0,
					"party_name"=>$party_name,
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];

				Schedule6::create($record);
				$save_success = "true";
			endif;
			break;

		endswitch;

	endif;

	if( $save_success = "true" ):
		return redirect('/admin/candidate_transaction/election-expense')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);

	else:
		return redirect('/admin/candidate_transaction/election-expense')->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
	endif;	

}

public function saveToBankRegister($data){
	if($id = DB::table('bank_register')->insertGetId($data)){
		return $id;
	}
}


public function myfundSave(Request $request) {			

	$user_id = CRUDBooster::myId();
	$mydetails = getMyDetails($user_id);
			//dd(getCurrentBalance());
	$rules = array(
		'amount' => 'required|max:10',
		'date' => 'required'
	);
	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()):
		$message = $validator->errors()->all();
		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
		
				//Need to take some action on this
	else:

		$BankRegister = new BankRegister;
		$BankRegister->user_id = $user_id;
		$BankRegister->election_id = $mydetails->election_id;
		$BankRegister->tran_date = Input::get('date');
		$BankRegister->tran_amount = Input::get('amount');
		$BankRegister->tran_source = 'Self';
		$BankRegister->tran_source_name = 'Candidates Own fund';
		$BankRegister->is_own_bank = 'Y';
		$BankRegister->tran_method = 'Cash';
		$BankRegister->tran_type = 'Cr';
		$BankRegister->tran_receiver_name = 'Own';
		$BankRegister->tran_source_bank_name = $mydetails->bankname;
		$BankRegister->tran_source_bank_branch = $mydetails->branch_address;
		$BankRegister->tran_purpose = 'self-deposit';
		$BankRegister->deposited_same_day = 'Y';
		$BankRegister->balance = getCurrentBalance() + Input::get('amount');
		$BankRegister->save();
				//dd($BankRegister->id);
				//return redirect('admin')->with('status', 'Success');
		return redirect('/admin/candidate_transaction/cash-deposit-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
				//return redirect()->back()->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);
	endif;	

}

		// Cash is received from other person or party. This may save to bank or not
		// If not insert in cash register 2 times cash reg received
		// If deposit to bank then cash reg in payment and bank register in deposit 
		//dd($request->all());

public function PartyPersonDepositSave(Request $request){

	$user_id = CRUDBooster::myId();
	$mydetails = getMyDetails($user_id);

	$rules = array(
		'received_type' => 'required',
		'date' => 'required',
		'amount' => 'required',
		'purpose' => 'required'
	);

	if ( $request->input('received_type') == 'other' ) {
		$rules['person_name'] = 'required';
		$rules['person_address'] = 'required';
	}

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()):
		$message = $validator->errors()->all();
		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
	else:
		$CashRegister = new CashRegister;
		$BankRegister = new BankRegister;

				//deposit_relation field is whether it is deposited to ban same day or not
				//Depending upon deposit_relation save type changes

		$deposit_relation = Input::get('deposit_relation');
		$purpose = Input::get('purpose');
		$received_type = Input::get('received_type');

		if($received_type == 'party'):
			$party_id = Input::get('party_name');
			$party_record = PartyMaster::find($party_id);
			$source_name = $party_record->party_name; 
			$source_address = Input::get('party_address')?Input::get('party_address'):$party_record->party_address;
		else:
			$source_name = Input::get('person_name');
			$source_address = Input::get('person_address');
		endif;

				//Always save to cash register
		$CashRegister->user_id = $user_id;
		$CashRegister->election_id = 1;
		$CashRegister->tran_date = Input::get('date');
		$CashRegister->tran_amount = Input::get('amount');
		$CashRegister->tran_source = Input::get('received_type');
		$CashRegister->tran_source_name = $source_name;
		$CashRegister->tran_source_address = $source_address;
		$CashRegister->tran_purpose = $purpose;
		$CashRegister->tran_purpose_other = ($purpose=="others")?Input::get('purpose_other'):"" ;
		$CashRegister->tran_method = 'Cash';
		$CashRegister->tran_type = 'Cr';
		$CashRegister->tran_receiver_name = 'Own';
		$CashRegister->deposited_same_day = ($deposit_relation == "deposited_to_bank")?"Y":"N";
		$CashRegister->bank_deposited =  ($deposit_relation == "deposited_to_bank")?"Y":"N";
		$CashRegister->receipt_no = Input::get('receipt_no');
		$CashRegister->is_own_bank = 'Y';
		$CashRegister->tran_source_bank_name = $mydetails->bankname;
		$CashRegister->tran_source_bank_branch = $mydetails->branch_address;
		$CashRegister->balance = getCurrentBalance('cash_register') + Input::get('amount');
		$CashRegister->tran_remarks = Input::get('remarks');
		$CashRegister->save();
				//return redirect()->route('party_person_cash')->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);
				//Cash Register last id
		$CashRegister_last_id = $CashRegister->id;

		if( $deposit_relation == "deposited_to_bank" ):
					//Save to cash register Payment side
					//Save to cash register received, payment and bank register deposit
			$CashRegister = new CashRegister;
			$CashRegister->user_id = $user_id;
			$CashRegister->election_id = 1;
			$CashRegister->trans_parent_id = $CashRegister_last_id;
			$CashRegister->tran_date = Input::get('date');
			$CashRegister->tran_amount = Input::get('amount');
			$CashRegister->tran_source = Input::get('received_type');
			$CashRegister->tran_source_name = $source_name;
			$CashRegister->tran_source_address = $source_address;
					$CashRegister->tran_purpose = 'Deposit';//$purpose;
					$CashRegister->tran_purpose_other = ($purpose=="others")?Input::get('purpose_other'):"" ;
					$CashRegister->tran_method = 'Cash';
					$CashRegister->bank_deposited = 'Y';
					$CashRegister->tran_type = 'Dr';
					$CashRegister->tran_receiver_name = 'Own';
					$CashRegister->receipt_no = Input::get('receipt_no');
					$CashRegister->is_own_bank = 'Y';
					$CashRegister->tran_source_bank_name = $mydetails->bankname;
					$CashRegister->tran_source_bank_branch = $mydetails->branch_address;
					$CashRegister->balance = getCurrentBalance('cash_register') - Input::get('amount');
					$CashRegister->tran_remarks = Input::get('remarks');
					$CashRegister->save();

					$CashRegister_payment_lastid = $CashRegister->id;

					//Save to Bask Register table

					$BankRegister->user_id = $user_id;
					$BankRegister->election_id = 1;
					$BankRegister->cash_register_id = $CashRegister_last_id;
					$BankRegister->tran_date = Input::get('date');
					$BankRegister->tran_amount = Input::get('amount');
					$BankRegister->tran_source = 'Self';
					$BankRegister->tran_source_name = "Candidate's own Cash";
					$BankRegister->tran_method = 'Cash';
					$BankRegister->tran_type = 'Cr';
					$BankRegister->tran_receiver_name = 'Own';
					$BankRegister->deposited_same_day = 'Y';
					$BankRegister->tran_purpose = 'Deposit'; // cash to bank 
					$BankRegister->balance = getCurrentBalance() + Input::get('amount');
					$BankRegister->tran_remarks = Input::get('remarks');
					$BankRegister->save();
					$BankRegister_payment_lastid = $BankRegister->id;

				endif;	

				// If Party & Purpose is Election Exp then schedule 8 save
				// Sending to the function at the bottom of the page

				if( $purpose == "election_expense" ):
					$record= [
						"date"=>Input::get('date'),
						"cash"=>'cash',
						"dd_or_cheque_no"=>Input::get('receipt_no'),
						"total_amount"=>Input::get('amount'),	
						"cash_register"=>$CashRegister_last_id,	
						"bank_register"=>($deposit_relation == "deposited_to_bank")?$BankRegister_payment_lastid:0,	
						"remarks"=>Input::get('remarks')?Input::get('remarks'):'election expense',
						"name"=>$source_name,
						"address"=>$source_address,	
						"user_id" => $user_id,
						"election_id" => $mydetails->election_id
					];
					$this->saveToSchedule8($record); 

				else:
					//Save to table 9 Collecting the data sending to the function 
					//at the bottom of the page
					$record= ["name"=>($received_type !="party")?Input::get('person_name'):"party",
					"address"=>($received_type !="party")?Input::get('person_address'):"party",
					"date"=>Input::get('date'),
					"cash"=>'cash',
					"dd_or_cheque_no"=>Input::get('receipt_no'),	
					"loan_or_gift"=>($purpose=="others")?Input::get('purpose_other'):"",	
					"total_amount"=>Input::get('amount'),	
					"cash_register"=>$CashRegister_last_id,	
					"bank_register"=>($deposit_relation == "deposited_to_bank")?$BankRegister_payment_lastid:0,	
					"remarks"=>Input::get('remarks')?Input::get('remarks'):$purpose,	
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];
				$this->saveToSchedule9($record);

			endif;	
			return redirect('/admin/candidate_transaction/party-person-cash-deposit-list')->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);

		endif;

	}

		//Depositing party_person_cash_to_bank Save data
	public function PartyPersonCashToBankSave(Request $request){

		$rules = array(
			'date' => 'required',
			'cash_reg_record' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()):
			$message = $validator->errors()->all();
			return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

		else:
			$user_id = CRUDBooster::myId();
			$mydetails = getMyDetails($user_id);
				//echo Input::get('cash_reg_record');
			$single_party_record = CashRegister::find(Input::get('cash_reg_record'));

				//Update the `bank_deposited` field to 'Y' on the refrence field
			CashRegister::where('id', $single_party_record->id)->update(array('bank_deposited' => 'Y'));

					//Save to cash register Payment side
					//Save to cash register received, payment and bank register deposit
			$CashRegister = new CashRegister;
			$CashRegister->user_id = $user_id;
			$CashRegister->election_id = 1;
			$CashRegister->trans_parent_id = $single_party_record->id;
			$CashRegister->tran_date = Input::get('date');
			$CashRegister->tran_amount = $single_party_record->tran_amount;
			$CashRegister->tran_source = $single_party_record->received_type;
			$CashRegister->tran_source_name = 'Own fund';
			$CashRegister->tran_method = 'Cash';
			$CashRegister->bank_deposited = 'Y';
			$CashRegister->tran_type = 'Dr';
			$CashRegister->tran_receiver_name = 'Own';
			$CashRegister->tran_purpose = 'Deposit';
			$CashRegister->receipt_no = $single_party_record->receipt_no;
			$CashRegister->is_own_bank = 'Y';
			$CashRegister->tran_source_bank_name = $mydetails->bankname;
			$CashRegister->tran_source_bank_branch = $mydetails->branch_address;
			$CashRegister->balance = getCurrentBalance('cash_register') - $single_party_record->tran_amount;
			$CashRegister->save();
			$CashRegister_payment_lastid = $CashRegister->id;

					//Now save the record in Bank Register
			$BankRegister = new BankRegister;
			$BankRegister->user_id = $user_id;
			$BankRegister->election_id = 1;
			$BankRegister->cash_register_id = $single_party_record->id;
			$BankRegister->tran_date = Input::get('date');
			$BankRegister->tran_amount = $single_party_record->tran_amount;
			$BankRegister->tran_source = 'Self';
			$BankRegister->tran_source_name = "Candidate's own Cash";
			$BankRegister->tran_method = 'Cash';
			$BankRegister->tran_type = 'Cr';
			$BankRegister->tran_receiver_name = 'Own';
			$BankRegister->tran_purpose = 'Deposit';
			$BankRegister->balance = getCurrentBalance() + $single_party_record->tran_amount;
			$BankRegister->save();
			$BankRegister_lastid = $BankRegister->id;

				// Update Schedule8/9 table depending upon tran_purpose field  
				// in cash_register search the **** Point to check the id realation ****

			if( $single_party_record->tran_purpose == "election_expense" ):

					//Update only the bank_reg_id depending on the Cash_reg_id

				Schedule8::where('cash_register', $single_party_record->id)->update(array( 'bank_register' => $BankRegister_lastid ));

			else:
					// Save to table 9 Collecting the data sending to the function 
					// Update only the bank_reg_id depending on the Cash_reg_id
				Schedule9::where('cash_register', $single_party_record->id)->update(array( 'bank_register' => $BankRegister_lastid ));

			endif;	

			return redirect()->back()->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);	
			
		endif;

	}

		//Save Check Draft Payo rder To Bank, Bank selection is important here
		//If same bank save the data bank name & address automatically to db
		//else store the data for other person

	public function CheckDraftPayorderToBankSave(Request $request){

			//dd($request->all());

		$rules = array(
			'date' => 'required',
			'issue_type' => 'required',
			'payment_type' => 'required',
			'receipt_no' => 'required',
			'amount' => 'required|integer',
			'purpose' => 'required'
		);

		if ( $request->input('issue_type') == 'other_person_party' ) {
			$rules['received_from'] = 'required';
			$rules['address'] = 'required';
				//$rules['bank_name'] = 'required';
				//$rules['bank_branch'] = 'required';
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()):
			$message = $validator->errors()->all();
			return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

		else:

			$BankRegister = new BankRegister;
			$user_id = CRUDBooster::myId();
			$mydetails = getMyDetails($user_id);

			$issue_type = Input::get('issue_type');
			$purpose = (Input::get('purpose')== 'others')?Input::get('other_purpose'):Input::get('purpose');

			$BankRegister->user_id = $user_id;
			$BankRegister->election_id = 1;
			$BankRegister->tran_date = Input::get('date');
			$BankRegister->tran_amount = Input::get('amount');
			$BankRegister->receipt_no = Input::get('receipt_no');
			$BankRegister->tran_source = $issue_type;
			$BankRegister->tran_source_name = ($issue_type == "own_bank")?'Candidate\'s own Fund':Input::get('received_from');
			$BankRegister->tran_source_address = ($issue_type == "own_bank")?'':Input::get('address');
			$BankRegister->tran_method = Input::get('payment_type');
			$BankRegister->tran_purpose = $purpose;
			$BankRegister->tran_type = 'Cr';
			$BankRegister->tran_receiver_name = 'Own';
			$BankRegister->balance = getCurrentBalance() + Input::get('amount');
			$BankRegister->is_own_bank = ($issue_type == "own_bank")?"Y":"N";
			$BankRegister->tran_remarks = Input::get('remarks');
			
			if ($issue_type == "own_bank"):
				$BankRegister->tran_source_bank_name = $mydetails->bankname;
				$BankRegister->tran_source_bank_branch = $mydetails->branch_address;
			else:
				$BankRegister->tran_source_bank_name =  Input::get('bank_name');
				$BankRegister->tran_source_bank_branch =  Input::get('bank_branch');
			endif;
			
			$BankRegister->save();
			$BankRegister_payment_lastid = $BankRegister->id;
			//If Party & Purpose is Election Exp then schedule 8 save
			if($purpose == "election_expense"):

				$record= [
					"date"=>Input::get('date'),
					"cash"=> Input::get('payment_type'),
					"dd_or_cheque_no"=>Input::get('receipt_no'),
					"total_amount"=>Input::get('amount'),	
					"cash_register"=>0,	
					"bank_register"=>$BankRegister_payment_lastid,	
					"remarks"=>Input::get('remarks'),
					"name"=>($issue_type !="own_bank")?Input::get('received_from'):"own bank",
					"address"=>($issue_type !="own_bank")?Input::get('address'):"own bank",	
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id
				];
				if ($issue_type != "own_bank"){
					$this->saveToSchedule8($record);
				}else{

				}

			else:
					//Save to table 9
				$record= [
					"name"=> ($issue_type == "own_bank")?"Self":Input::get('received_from'),
					"address"=>($issue_type =="own_bank")?"Self":Input::get('address'),
					"date"=>Input::get('date'),
					"cash"=>Input::get('payment_type'),
					"dd_or_cheque_no"=>Input::get('receipt_no'),	
					"loan_or_gift"=>$purpose,	
					"total_amount"=>Input::get('amount'),	
					"cash_register"=>0,	
					"bank_register"=>$BankRegister_payment_lastid,	
					"remarks"=>Input::get('remarks'),	
					"user_id" => $user_id,
					"election_id" => $mydetails->election_id	
				];
				if ($issue_type != "own_bank"){
					$this->saveToSchedule9($record);
				}else{}

			endif;
			return redirect('/admin/candidate_transaction/check-draft-to-bank-list')->with(['message'=> "Success. Record saved successfully",'message_type'=>'success']);
				//return redirect()->back()->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);	
		endif;
	}

	public function saveToSchedule8($data){

		Schedule8::create($data);
		return;
	}

	public function saveToSchedule9($data){

		Schedule9::create($data);
		return;
	}

		//Annexure Statement Election Form
	private function getAbstractStatementPart1Data() {
		$user_id 	= 	CRUDBooster::myId();
		$mydetails 	= 	getMyDetails($user_id);
			//dd($mydetails);
		$dataArr['candidate_name'] = $mydetails->name;
		$dataArr['constituency'] = $mydetails->constituency;
		$dataArr['constituency_no'] = $mydetails->constituency_no;
		$dataArr['result_date'] = indianDateFormat($mydetails->date_result);
		$dataArr['agent_name'] = $mydetails->agent_name;
		$dataArr['agent_address'] = $mydetails->agent_address;
		$dataArr['state_name'] = $mydetails->state_name;
		$dataArr['election_name'] = $mydetails->election_name;
		$dataArr['party_name'] = $mydetails->party_name;
		$data['icon_header'] = 'icon_b expstatements_b';
		return $dataArr;
	}

	public function getAbstractStatementPart1() {
		$data  =  $this->getAbstractStatementPart1Data();
		$data['icon_header'] = 'icon_b expstatements_b';
		$data['page_title'] = 'Abstract Statement - Part I';
			//dd($data);
		return view('reports.abstract_statement_part_1',$data);		
	}

	public function getAbstractStatementPart1Pdf() {
		$data  =  $this->getAbstractStatementPart1Data();
		$pdf = PDF::loadView('pdf.abstract_statement_part_1', $data);
		return $pdf->download('abstract_statement_part_1.pdf');

	}

	private function getScheduleData($schedule_model, $dateFlg = false) {
		$schedule 				= 	$schedule_model;
		$total_brkup_ow 		= 	0;
		$total_brkup_pt 		= 	0;
		$total_brkup_ot 		= 	0;
		$total_amount 			= 	0;
		$bank_register_array 	= 	[];
		$user_id				=	CRUDBooster::myId();
		$mydetails 				= 	getMyDetails($user_id);

		foreach ($schedule as $sh) {
			$schVal = $sh->bank_register()->where('user_id',$user_id)->where('election_id',$mydetails->election_id);
			if($dateFlg) $schVal = $schVal->whereBetween('tran_date',[$mydetails->nomination_date,$mydetails->date_result]);
			$schVal = $schVal->first();
			$bank_register_array 	= 	!is_null($schVal)?$schVal->toArray():[];
			$total_brkup_ow 		+= 	$bank_register_array['tran_amount_brkup_ow'];
			$total_brkup_pt 		+= 	$bank_register_array['tran_amount_brkup_pt'];
			$total_brkup_ot 		+= 	$bank_register_array['tran_amount_brkup_ot'];	
			$total_amount			+=	$bank_register_array['tran_amount'];			
		}

		return [						
			'total_brkup_ow' => $total_brkup_ow,
			'total_brkup_pt' => $total_brkup_pt,
			'total_brkup_ot' => $total_brkup_ot,
			'total_amount' 	 => $total_amount
		];
	}

	private function getAbstractStatementPart2Data() {
		$schedule1_array 		=   $this->getScheduleData(Schedule1::all(),true);
		$schedule2_array 		=   $this->getScheduleData(Schedule2::all(),true);
		$schedule3_array 		=   $this->getScheduleData(Schedule3::all(),true);
		$schedule4_array 		=   $this->getScheduleData(Schedule4::all(),true);
		$schedule5_array 		=   $this->getScheduleData(Schedule5::all(),true);
		$schedule6_array 		=   $this->getScheduleData(Schedule6::all(),true);
			//echo '<pre>';print_r($schedule1_array);exit;
		$grand_total_brkup_ow	=	0;
		$grand_total_brkup_pt	=	0;
		$grand_total_brkup_ot	=	0;
		$grand_total_amount		=	0;		

		$user_id				=	CRUDBooster::myId();
		$mydetails 				= 	getMyDetails($user_id);
		$petty_expense			=	BankRegister::where(['user_id' => $user_id,'election_id' => $mydetails->election_id,'is_petty' => 1])->sum('tran_amount');		

		$grand_total_brkup_ow	=	$schedule1_array['total_brkup_ow'] + $schedule2_array['total_brkup_ow'] + $schedule3_array['total_brkup_ow'] + $schedule4_array['total_brkup_ow'] + $schedule5_array['total_brkup_ow'] + $schedule6_array['total_brkup_ow'] + $petty_expense;
		$grand_total_brkup_pt	=	$schedule1_array['total_brkup_pt'] + $schedule2_array['total_brkup_pt'] + $schedule3_array['total_brkup_pt'] + $schedule4_array['total_brkup_pt'] + $schedule5_array['total_brkup_pt'] + $schedule6_array['total_brkup_pt'];
		$grand_total_brkup_ot	=	$schedule1_array['total_brkup_ot'] + $schedule2_array['total_brkup_ot'] + $schedule3_array['total_brkup_ot'] + $schedule4_array['total_brkup_ot'] + $schedule5_array['total_brkup_ot'] + $schedule6_array['total_brkup_ot'];
		$grand_total_amount		=	$schedule1_array['total_amount'] + $schedule2_array['total_amount'] + $schedule3_array['total_amount'] + $schedule4_array['total_amount'] + $schedule5_array['total_amount'] + $schedule6_array['total_amount'] + $petty_expense;


		return [
			'schedule1_array' 		=> $schedule1_array,
			'schedule2_array' 		=> $schedule2_array,
			'schedule3_array' 		=> $schedule3_array,
			'schedule4_array' 		=> $schedule4_array,
			'schedule5_array' 		=> $schedule5_array,
			'schedule6_array' 		=> $schedule6_array,
			'grand_total_brkup_ow' 	=> formatCurrency($grand_total_brkup_ow),
			'grand_total_brkup_pt' 	=> formatCurrency($grand_total_brkup_pt),
			'grand_total_brkup_ot' 	=> formatCurrency($grand_total_brkup_ot),
			'grand_total_amount' 	=> formatCurrency($grand_total_amount),
			'petty_expense'			=> formatCurrency($petty_expense)

		];

	}

	public function getAbstractStatementPart2() {
		$data  =  $this->getAbstractStatementPart2Data();
		$data['icon_header'] = 'icon_b expstatements_b';
		$data['page_title'] = 'Abstract Statement - Part II';
		return view('reports.abstract_statement_part_2',$data);		
	}

	public function getAbstractStatementPart2Pdf() {
		$data  =  $this->getAbstractStatementPart2Data();
		$pdf   =  PDF::loadView('pdf.abstract_statement_part_2', $data);
		return $pdf->download('abstract_statement_part_2.pdf');

	}

	private function getAbstractStatementPart3Data() {
		$user_id			=	CRUDBooster::myId();
		$mydetails 			=	getMyDetails($user_id);
		$schedule7_total 	= 	Schedule7::filterPartyScheduleData()->where(['user_id' => $user_id,'election_id' => $mydetails->election_id])->sum('total_amount');
		$schedule8_total 	= 	Schedule8::filterPartyScheduleData()->where(['user_id' => $user_id,'election_id' => $mydetails->election_id])->sum('total_amount');
		$schedule9_total 	= 	Schedule9::filterPartyScheduleData()->where(['user_id' => $user_id,'election_id' => $mydetails->election_id])->sum('total_amount');
			$schedule_total 	=	$schedule8_total + $schedule9_total + $schedule7_total; // previously $schedule8_total + $schedule9_total - $schedule7_total; // 18-03-2019
			return [
				'schedule7_total' => formatCurrency($schedule7_total),
				'schedule8_total' => formatCurrency($schedule8_total),
				'schedule9_total' => formatCurrency($schedule9_total),
				'schedule_total'  => formatCurrency($schedule_total)
			];
		}

		public function getAbstractStatementPart3() {
			$data  =  $this->getAbstractStatementPart3Data();
			$data['page_title'] = 'Abstract Statement - Part III';
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('reports.abstract_statement_part_3',$data);		
		}

		public function getAbstractStatementPart3Pdf() {
			$data  =  $this->getAbstractStatementPart3Data();
			$pdf = PDF::loadView('pdf.abstract_statement_part_3', $data);
			return $pdf->download('abstract_statement_part_3.pdf');

		}

		private function getAbstractStatementPart4Data() {
			$user_id			=	CRUDBooster::myId();
			$mydetails 			=	getMyDetails($user_id);
			$mydetails->age 	=	Carbon::parse($mydetails->dob)->age;
			return (array) $mydetails;
		}

		public function getAbstractStatementPart4() {
			$data  =  $this->getAbstractStatementPart4Data();
			$data['icon_header'] = 'icon_b expstatements_b';
			$data['page_title'] = 'Affidavit';
			//pd($data);
			return view('reports.abstract_statement_part_4',$data);		
		}

		public function getAbstractStatementPart4Pdf() {
			$data  =  $this->getAbstractStatementPart4Data();
			$pdf = PDF::loadView('pdf.abstract_statement_part_4', $data);
			return $pdf->download('abstract_statement_part_4.pdf');

		}

		public function getAbstractStatementAcknowledgementForm() {
			$data  =  [];
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('reports.abstract_statement_acknowledgement_form',$data);		
		}

		public function getAbstractStatementAcknowledgementFormPdf() {
			$data  =  [];
			$pdf = PDF::loadView('pdf.abstract_statement_acknowledgement_form', $data);
			return $pdf->download('abstract_statement_acknowledgement_form.pdf');

		}
		//Annexure Statement Election Form

		// Creating all the schedule report
		// Schedule 1 to 6, related to Election Expenses 
		private function getSchedule1Data() {
			// $data['records'] = DB::table('schedule1')
			// 					->join('sc1_nature_of_expenditure', 'schedule1.nature_id', '=', 'sc1_nature_of_expenditure.id')
			// 					->select('schedule1.*', 'sc1_nature_of_expenditure.title')
			// 					->get();
			$data['records'] = Schedule1::filterPartyScheduleData()->join('sc1_nature_of_expenditure', 'schedule1.nature_id', '=', 'sc1_nature_of_expenditure.id')
			->select('schedule1.*', 'sc1_nature_of_expenditure.title')
			->orderby('date','desc')->get();

			$data['page_title'] = 'Schedule 1';
			$data['icon_header'] = 'icon_b expstatements_b';

			$data['records2'] = Schedule2::filterPartyScheduleData()->get();
			$data['records3'] = Schedule3::filterPartyScheduleData()->get();
			$data['records4'] = Schedule4::filterPartyScheduleData()->where('self_owned','Y')->get();
			$data['records4a'] = Schedule4::filterPartyScheduleData()->where('self_owned','N')->get();
			$data['records5'] = Schedule5::filterPartyScheduleData()->get();
			$data['records6'] = Schedule6::filterPartyScheduleData()->join('sc6_nature_expenses', 'schedule6.nature_expenses_id', '=', 'sc6_nature_expenses.id')->select('schedule6.*', 'sc6_nature_expenses.title')->get();
			$data['records7'] = Schedule7::filterPartyScheduleData()->get();
			$mydetails 			=	getMyDetails('');
			$sql = "SELECT schedule8.*, bank_register.user_id as usrid, bank_register.election_id as electionid, bank_register.tran_source_bank_name as bankname, bank_register.tran_source_bank_branch as branchname
					FROM schedule8
					LEFT JOIN bank_register ON 
				    		schedule8.bank_register = bank_register.id
				    		and schedule8.bank_register != 0 and schedule8.cash_register = 0
				    	WHERE bank_register.user_id=".CRUDBooster::myId()." and bank_register.election_id=".$mydetails->election_id
				    	." and schedule8.date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result." order by date ASC' 
				    UNION 
				    SELECT schedule8.*, cash_register.user_id as usrid, cash_register.election_id as electionid, cash_register.tran_source_bank_name as bankname, cash_register.tran_source_bank_branch as branchname
					FROM schedule8
					LEFT JOIN cash_register ON 
				    		schedule8.cash_register = cash_register.id
				    		and schedule8.cash_register != 0
				    	WHERE cash_register.user_id=".CRUDBooster::myId()."
				    	and cash_register.election_id=".$mydetails->election_id
				    	." and schedule8.date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result."' order by date ASC";
    		$data['print_data8'] = DB::select($sql);
    		$sql = "SELECT schedule9.*, bank_register.user_id as usrid, bank_register.election_id as electionid, bank_register.tran_source_bank_name as bankname, bank_register.tran_source_bank_branch as branchname
					FROM schedule9
					LEFT JOIN bank_register ON 
				    		schedule9.bank_register = bank_register.id
				    		and schedule9.bank_register != 0 and schedule9.cash_register = 0
				    	WHERE bank_register.user_id=".CRUDBooster::myId()." and bank_register.election_id=".$mydetails->election_id
				    	." and schedule9.date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result." order by date ASC'
				    UNION 
				    SELECT schedule9.*, cash_register.user_id as usrid, cash_register.election_id as electionid, cash_register.tran_source_bank_name as bankname, cash_register.tran_source_bank_branch as branchname
					FROM schedule9
					LEFT JOIN cash_register ON 
				    		schedule9.cash_register = cash_register.id
				    		and schedule9.cash_register != 0
				    	WHERE cash_register.user_id=".CRUDBooster::myId()."
				    	and cash_register.election_id=".$mydetails->election_id
				    	." and schedule9.date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result."' order by date ASC";
    		$data['print_data9'] = DB::select($sql);
			return $data;
		}

		public function getSchedule1(){
			$data = $this->getSchedule1Data();			
			return view('reports.schedule_1',$data);
		}

		public function getSchedule1Pdf(){
			$data = $this->getSchedule1Data();
			$pdf = PDF::loadView('pdf.schedule_1', $data);
			return $pdf->download('schedule1.pdf');
		}

		private function getSchedule2Data() {
			//$data['records'] = DB::table('schedule2')->get();
			$data['records'] = Schedule2::filterPartyScheduleData()->get();
			//pd($data['records']);
			$data['page_title'] = 'Schedule 2';
			$data['icon_header'] = 'icon_b expstatements_b';
			return $data;
		}

		public function getSchedule2(){
			$data = $this->getSchedule2Data();			
			return view('reports.schedule_2',$data);
		}

		public function getSchedule2Pdf(){
			$data = $this->getSchedule2Data();
			$pdf = PDF::loadView('pdf.schedule_2', $data);
			return $pdf->download('schedule2.pdf');
		}

		private function getSchedule3Data() {
			//$data['records'] = DB::table('schedule3')->get();
			$data['records'] = Schedule3::filterPartyScheduleData()->get();
			$data['page_title'] = 'Schedule 3';
			$data['icon_header'] = 'icon_b expstatements_b';
			return $data;
		}

		public function getSchedule3(){
			$data = $this->getSchedule3Data();			
			return view('reports.schedule_3',$data);
		}

		public function getSchedule3Pdf(){
			$data = $this->getSchedule3Data();
			$pdf = PDF::loadView('pdf.schedule_3', $data);
			return $pdf->download('schedule3.pdf');
		}

		private function getSchedule4Data() {
			//$data['records'] = DB::table('schedule4')->where('self_owned','N')->get();
			//$data['records4a'] = DB::table('schedule4')->where('self_owned','Y')->get();
			$data['records'] = Schedule4::filterPartyScheduleData()->where('self_owned','Y')->get();
			$data['records4a'] = Schedule4::filterPartyScheduleData()->where('self_owned','N')->get();
			$data['page_title'] = 'Schedule 4';
			$data['icon_header'] = 'icon_b expstatements_b';
			return $data;
		}

		public function getSchedule4(){
			$data = $this->getSchedule4Data();
			// echo "<pre>";
			// print_r($data['records']);	
			// print_r($data['records4a']);exit;		
			return view('reports.schedule_4',$data);
		}

		public function getSchedule4Pdf(){
			
			$data = $this->getSchedule4Data();
			$pdf = PDF::loadView('pdf.schedule_4', $data);
			return $pdf->download('schedule4.pdf');
		}

		public function getSchedule4a(){

			$data['records'] = DB::table('schedule4A')->get();;
			$data['page_title'] = 'Schedule 4A';
			$data['icon_header'] = 'icon_b expstatements_b';
			
			return view('reports.schedule_4a',$data);
		}

		private function getSchedule5Data() {
			// $data['records'] = DB::table('schedule5')->get();
			$data['records'] = Schedule5::filterPartyScheduleData()->get();
			$data['page_title'] = 'Schedule 5';
			$data['icon_header'] = 'icon_b expstatements_b';
			return $data;
		}

		public function getSchedule5(){
			$data = $this->getSchedule5Data();			
			return view('reports.schedule_5',$data);
		}

		public function getSchedule5Pdf(){
			$data = $this->getSchedule5Data();
			$pdf = PDF::loadView('pdf.schedule_5', $data);
			return $pdf->download('schedule5.pdf');
		}

		private function getSchedule6Data() {
			// $data['records'] = DB::table('schedule6')
			// 					->join('sc6_nature_expenses', 'schedule6.nature_expenses_id', '=', 'sc6_nature_expenses.id')
			// 					->select('schedule6.*', 'sc6_nature_expenses.title')
			// 					->get();
			$data['records'] = Schedule6::filterPartyScheduleData()->join('sc6_nature_expenses', 'schedule6.nature_expenses_id', '=', 'sc6_nature_expenses.id')
			->select('schedule6.*', 'sc6_nature_expenses.title')
			->get();					
			$data['page_title'] = 'Schedule 6';
			$data['icon_header'] = 'icon_b expstatements_b';		
			return $data;
		}

		public function getSchedule6(){
			$data = $this->getSchedule6Data();
			return view('reports.schedule_6',$data);
		}

		public function getSchedule6Pdf(){
			$data = $this->getSchedule6Data();
			$pdf = PDF::loadView('pdf.schedule_6', $data);
			return $pdf->download('schedule6.pdf');
		}

		private function getSchedule7Data(){
			//$data['records'] = DB::table('schedule7')->get();
			$data['records'] = Schedule7::filterPartyScheduleData()->get();
			$data['page_title'] = 'Schedule 7';
			$data['icon_header'] = 'icon_b expstatements_b';
			return $data;
		}

		public function getSchedule7(){
			$data = $this->getSchedule7Data();			
			return view('reports.schedule_7',$data);
		}

		public function getSchedule7Pdf(){
			$data = $this->getSchedule7Data();
			$pdf = PDF::loadView('pdf.schedule_7', $data);
			return $pdf->download('schedule7.pdf');
		}

		public function getPurchaseRegisterView() {
			$data = [];
			$data['page_title']   = 'Purchase Log';
			$data['icon_header'] = 'icon_b purchaselog_b';
			$data['script_files'] = 'js_files/purchase_register_add';
			return view('purchase_register_add',$data);
		}

		public function getPurchaseRegisterList(Request $request) {
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['action_url'] = $request->url();
			$data['button_add'] 		= true;
			$data['ignore_chks'] 		= true;
			$data['button_add_url'] 	= 'admin/candidate_transaction/purchase-register-view';
			$data['button_delete'] 		= true;
			$data['button_show'] 		= false;
			$data['button_filter'] 		= false;
			$data['page_title']   		= 'Purchase Log';
			$data['icon_header'] = 'icon_b purchaselog_b';
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			$user_id 					=	CRUDBooster::myId();
			$mydetails 					=	getMyDetails($user_id);
			$election_id 				=	$mydetails->election_id;
			$resultObj      	  		=  PurchaseRegister::where('user_id',$user_id)->where('election_id',$election_id);
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('purchase_date',[$request->from_date,$request->to_date]) : $resultObj;
			
			if(!empty($request->srch_key)){
				$param = urldecode(str_replace(",","",$request->srch_key));
				$resultObj = $resultObj->where(function ($query) use ($param) {
					$query->where('vendor_name','like','%'.$param.'%')
					->orWhere('description','like','%'.$param.'%')
					->orWhere('purchase_mode','like','%'.$param.'%')
					->orWhere('remarks','like','%'.$param.'%');
				});
			}

			$data['records'] = $resultObj->orderby('purchase_date','desc')->paginate();	//config('app.pagination')

			$totObj = PurchaseRegister::where('user_id',$user_id)->where('election_id',$election_id);

			
			$totObj = !empty($request->from_date) && !empty($request->from_date) ? $totObj->whereBetween('purchase_date',[$request->from_date,$request->to_date]) : $totObj;
			
			if(!empty($request->srch_key)){
				$param = urldecode(str_replace(",","",$request->srch_key));
				$totObj = $totObj->where(function ($query) use ($param) {
					$query->where('vendor_name','like','%'.$param.'%')
					->orWhere('description','like','%'.$param.'%')
					->orWhere('purchase_mode','like','%'.$param.'%')
					->orWhere('remarks','like','%'.$param.'%');
				});
			}

			$totObj = $totObj->groupBy('user_id')->select(DB::raw('SUM(net_amount) as total_amount, user_id'))->get();

			$data['total_amount'] = $totObj[0]?$totObj[0]->total_amount:0;

			//pd($totObj[0]->total_amount);
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';
			return view('purchase_register_list',$data);
		}

		public function getPurchaseRegisterDelete($id){

			if(PurchaseRegister::where('id',$id)->delete())
				return redirect('admin/candidate_transaction/purchase-register-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
		}

		public function savePurchaseRegister(Request $request) {
			$rules 		= array(
				'purchase_date' => 'required',
				'purchase_mode' => 'required',
				'vendor_name' => 'required',
				'description' => 'required',
				'quantity' => 'required',
				'net_amount' => 'required',
				'remarks' => 'required'
			);		
			
			$validator 	= Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				$message = $validator->errors()->all();
				return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
			} else {
				$purchase_register_obj	=	new PurchaseRegister;
				$user_id 				=	CRUDBooster::myId();
				$mydetails 				=	getMyDetails($user_id);
				$election_id 			=	$mydetails->election_id;
				$purchase_register_obj->user_id       = $user_id;
				$purchase_register_obj->election_id   = $election_id;
				$purchase_register_obj->purchase_date = $request->purchase_date;
				$purchase_register_obj->purchase_mode = $request->purchase_mode;
				$purchase_register_obj->vendor_name   = $request->vendor_name;
				$purchase_register_obj->description   = $request->description;
				$purchase_register_obj->quantity      = $request->quantity;
				$purchase_register_obj->net_amount    = $request->net_amount;
				$purchase_register_obj->remarks       = $request->remarks;
				
				$check   =   $purchase_register_obj->save();
				if ($check) {
					return redirect('/admin/candidate_transaction/purchase-register-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
				} else {
					return redirect('/admin/candidate_transaction/purchase-register-list')->with(['message'=> "Some error occured",'message_type'=>'danger']);
				}

			}
		}

		public function getPurchaseRegister(Request $request) {
			$data['page_title']   		= 'Purchase Register';
			$data['icon_header'] 		= 'icon_b purchaseregister_b';
			$user_id 				=	CRUDBooster::myId();
			$mydetails 				=	getMyDetails($user_id);
			$election_id 			=	$mydetails->election_id;
			if ((!empty($request->from_date) && !empty($request->to_date)) || !empty($request->purchase_mode)) {
				$purchase_obj 			= new PurchaseRegister;
				$purchase_obj 			= $purchase_obj->where('user_id',$user_id)->where('election_id',$election_id);
				if (!empty($request->from_date) && !empty($request->to_date)) {
					$purchase_obj 		=  $purchase_obj->whereBetween('purchase_date',[$request->from_date,$request->to_date]);
				}
				if (!empty($request->purchase_mode)) {
					$purchase_obj 		=  $purchase_obj->where('purchase_mode',$request->purchase_mode);
				}
				$data['records'] 	  	= $purchase_obj->orderBy('id','desc')->get();
				$data['from_date'] 		= $request->from_date;
				$data['to_date'] 		= $request->to_date;
				$data['purchase_mode'] 	= $request->purchase_mode;
			} else {
				$data['records'] 	  	=  PurchaseRegister::orderBy('id','desc')->where('user_id',$user_id)->where('election_id',$election_id)->get();
			}	
			$data['reset_url'] 			=  url('admin/candidate_transaction/purchase-register');	
			$data['script_files'] 		= 'js_files/purchase_register';		
			return view('purchase_register',$data);
		}

		public function getIncomeExpenditure(Request $request) {
			$data 						= 	[];
			$user_details 				=	getMyDetails('');
			$user_details_array 		=	['user_id' => $user_details->id,'election_id' => $user_details->election_id];
			//pd($user_details_array);
			$data['from_date']  		=	$request->from_date;
			$data['to_date'] 	  		=	$request->to_date;
			$date_array 				=	(!empty($request->from_date) && !empty($request->to_date))?[$request->from_date,$request->to_date]:[];

			
			if(CRUDBooster::myPrivilegeId() == 3){

				if (!empty($data_array)) { /*Do search*/
					$own_fund = BankRegister::whereBetween('tran_date',$date_array)
					->where('tran_type','=','Cr')
					->where(function ($query) {
						$query->where('tran_source', '=', 'own_bank')
						->orWhere('tran_purpose', '=', 'self-deposit');
					})->get()->sum('tran_amount');

					$schedule1_total			=	Schedule1::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule2_total			=	Schedule2::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule3_total			=	Schedule3::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule4_total			=	Schedule4::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule5_total			=	Schedule5::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule6_total			=	Schedule6::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule7_total			=	Schedule7::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule8_total			=	Schedule8::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
					$schedule9_total			=	Schedule9::where($user_details_array)->whereBetween('date',$date_array)->get()->sum('total_amount');
				} else {
					$own_fund = BankRegister::where('tran_type','=','Cr')
					->where(function ($query) {
						$query->where('tran_source', '=', 'own_bank')
						->orWhere('tran_purpose', '=', 'self-deposit');
					})->get()->sum('tran_amount');
					$schedule1_total			=	Schedule1::where($user_details_array)->get()->sum('total_amount');
					$schedule2_total			=	Schedule2::where($user_details_array)->get()->sum('total_amount');
					$schedule3_total			=	Schedule3::where($user_details_array)->get()->sum('total_amount');
					$schedule4_total			=	Schedule4::where($user_details_array)->get()->sum('total_amount');
					$schedule5_total			=	Schedule5::where($user_details_array)->get()->sum('total_amount');
					$schedule6_total			=	Schedule6::where($user_details_array)->get()->sum('total_amount');
					$schedule7_total			=	Schedule7::where($user_details_array)->get()->sum('total_amount');
					$schedule8_total			=	Schedule8::where($user_details_array)->get()->sum('total_amount');
					$schedule9_total			=	Schedule9::where($user_details_array)->get()->sum('total_amount');
				}

				$total_income 				=	$own_fund + $schedule8_total + $schedule9_total;//$schedule7_total + $schedule8_total + $schedule9_total;
				$schedule6_part_2_total 	=   $this->getScheduleData(Schedule6::all())['total_amount'];
				$total_expense				=	$schedule1_total + $schedule2_total + $schedule3_total + $schedule4_total + $schedule5_total + $schedule6_total + $schedule6_part_2_total;

				$data['own_fund'] = formatCurrency($own_fund);
				$data['schedule1_total'] 	= 	formatCurrency($schedule1_total);
				$data['schedule2_total'] 	= 	formatCurrency($schedule2_total);
				$data['schedule3_total'] 	= 	formatCurrency($schedule3_total);
				$data['schedule4_total'] 	= 	formatCurrency($schedule4_total);
				$data['schedule5_total'] 	= 	formatCurrency($schedule5_total);
				$data['schedule6_total'] 	= 	formatCurrency($schedule6_total);
				$data['schedule7_total'] 	= 	formatCurrency($schedule7_total);
				$data['schedule8_total'] 	= 	formatCurrency($schedule8_total);
				$data['schedule9_total'] 	= 	formatCurrency($schedule9_total);	
				$data['total_income'] 		= 	formatCurrency($total_income);	
				$data['schedule6_part_2_total'] 	= 	formatCurrency($schedule6_part_2_total);	
				$data['total_expense'] 		= 	formatCurrency($total_expense);	
				$data['net_income']         =   $total_income > $total_expense	?  	formatCurrency($total_income - $total_expense) : '';
				$data['net_expense']        =   $total_expense > $total_income	?  	formatCurrency($total_expense - $total_income) : '';

				$view = 'income_expenditure';
			}else if(CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5){

				$total_income = PartyTransactionRegister::where('inkind',0)->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');
				$starHQ = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','Y')->get()->sum('total_amount');
				$leaderHQ = PartySchedule2::filterOnlyPartyTransactionData()->where('is_star','N')->get()->sum('total_amount');
				$mediaHQ = PartySchedule3::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$publicityHQ = PartySchedule4::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$meetingHQ = PartySchedule5::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$otherHQ = PartySchedule6::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$lumpsum_candHQ = PartySchedule7::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$media_candHQ = PartySchedule8::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$publicity_candHQ = PartySchedule9::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$meeting_candHQ = PartySchedule10::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$other_candidateHQ = PartySchedule11::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$lumpsum_to_suHQ = PartyTransactionRegister::filterPartyTransactionData()->where('tran_type','Dr')->where('tagged_parts','A55')->get()->sum('tran_amount');


				$starSU = PartySchedule12::filterOnlyPartyTransactionData()->where('is_star','Y')->get()->sum('total_amount');
				$leaderSU = PartySchedule13::filterOnlyPartyTransactionData()->where('is_star','N')->get()->sum('total_amount');
				$mediaSU = PartySchedule14::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$publicitySU = PartySchedule15::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$meetingSU = PartySchedule16::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$otherSU = PartySchedule17::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$lumpsum_candSU = PartySchedule18::filterOnlyPartyTransactionData()->value(DB::raw("SUM(amount_cash + amount_noncash)"));
				$media_candSU = PartySchedule19::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$publicity_candSU = PartySchedule20::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$meeting_candSU = PartySchedule21::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$other_candidateSU = PartySchedule22::filterOnlyPartyTransactionData()->get()->sum('total_amount');
				$lumpsum_to_suSU = PartyTransactionRegister::filterPartyTransactionData()->where('tran_type','Dr')->where('tagged_parts','B65')->get()->sum('tran_amount');



				$total_expense = $starHQ + $leaderHQ + $mediaHQ + $publicityHQ + $meetingHQ + $otherHQ + $lumpsum_candHQ + $media_candHQ + $publicity_candHQ + $meeting_candHQ + $other_candidateHQ + $lumpsum_to_suHQ + ($starSU + $leaderSU + $mediaSU + $publicitySU + $meetingSU + $otherSU + $lumpsum_candSU + $media_candSU + $publicity_candSU + $meeting_candSU + $other_candidateSU + $lumpsum_to_suSU);

				$data['star'] = formatCurrency($starHQ + $starSU);
				$data['leader'] = formatCurrency($leaderHQ + $leaderSU);
				$data['media'] = formatCurrency($mediaHQ + $mediaSU);
				$data['publicity'] = formatCurrency($publicityHQ + $publicitySU);
				$data['meeting'] = formatCurrency($meetingHQ + $meetingSU);
				$data['other'] = formatCurrency($otherHQ + $otherSU);
				$data['lumpsum_cand'] = formatCurrency($lumpsum_candHQ + $lumpsum_candSU);
				$data['media_cand'] = formatCurrency($media_candHQ + $media_candSU);
				$data['publicity_cand'] = formatCurrency($publicity_candHQ + $publicity_candSU);
				$data['meeting_cand'] = formatCurrency($meeting_candHQ + $meeting_candSU);
				$data['other_candidate'] = formatCurrency($other_candidateHQ + $other_candidateSU);
				$data['lumpsum_to_su'] = formatCurrency($lumpsum_to_suHQ + $lumpsum_to_suSU);
				$data['total_income'] = formatCurrency($total_income);
				$data['total_expense'] = formatCurrency($total_expense);
				$data['net_income']         =   $total_income > $total_expense	?  	formatCurrency($total_income - $total_expense) : '';
				$data['net_expense']        =   $total_expense > $total_income	?  	formatCurrency($total_expense - $total_income) : ''; 
				$view = 'income_expenditure_hq';
			}



			$data['action_url'] 		=	url('admin/candidate_transaction/income-expenditure');
			$data['page_title']   		= 	'Income & Expenditure';
			$data['icon_header'] = 'icon_b incomeexp_b';


			return view($view,$data);
		}

	}