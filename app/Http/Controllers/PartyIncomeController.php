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
	//use App\PartyTransactionRegister;
use PDF;
use Helper;

class PartyIncomeController extends \crocodicstudio\crudbooster\controllers\CBController {

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
		$this->table = "party_transaction_register";
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

	    public function getCashReceipt(Request $request){
	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Cash Receipt';
	    	$data['icon_header'] = 'icon_b cashreceipts_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/cash-receipt-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;
	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',0)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})
	    	->where('tran_method','cash')
	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate();
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';

	    	return view('party.hq_cash_receipt_list',$data);
	    }

	    public function getCashReceiptAdd(){
	    	$data['page_title'] = 'Receipt Voucher';
	    	$data['icon_header'] = 'icon_b cashreceipts_b';
	    	$data['script_files'] = 'js_files/party_transaction_register_add';
	    	return view('party.hq_cash_receipt_add',$data);
	    }

	    public function postCashReceiptSave(Request $request){

	    	$rules = array(
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required'
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all(); 
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $mydetails->state_id!=''?$mydetails->state_id:0;
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = 'cash';
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		//pd($data['balance']);
	    		$data['tagged_parts'] = '52ai';

	    		DB::table('party_transaction_register')->insert($data);

	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

	    	endif;
	    }

	    public function getBankDeposit(Request $request){

	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Deposit of Cheque,DD,PO & Online Transfer';
	    	$data['icon_header'] = 'icon_b noncash_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/bank-deposit-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',0)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})
	    	->where('tran_method','!=','cash')
	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	if( !empty($request->srch_key) ){
	    		$resultObj = $resultObj->where(function($query) use ($request) {
	    			$query->where('tran_receiver_name', 'LIKE', "%$request->srch_key%")
	    			->orWhere('tran_source_bank_name', 'LIKE', "%$request->srch_key%")
	    			->orWhere('tran_method', 'LIKE', "%$request->srch_key%")
	    			->orWhere('state_name', 'LIKE', "%$request->srch_key%");
	    		});
	    	}else{
	    		$resultObj = $resultObj;
	    	}
	    	$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');
	    	$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');

	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
	    	$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

	    	return view('party.hq_bank_deposit_list',$data);

	    }

	    public function getBankDepositAdd(){
	    	$user_id = CRUDBooster::myId();
	    	$data['script_files'] = 'js_files/party_transaction_register_add';
	    	$data['icon_header'] = 'icon_b noncash_b';
	    	return view('party.hq_bank_deposit_add',$data);
	    }

	    public function postBankDepositSave(request $request){

	    	$rules = array(
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required',
	    		'receipt_no' =>'required',
	    		'payment_type' => 'required'
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all(); 
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $mydetails->state_id!=''?$mydetails->state_id:0;
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = $inputArr['payment_type'];
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		$data['receipt_no'] = $inputArr['receipt_no'];
	    		$data['tran_source_bank_name'] = $inputArr['bank_name'];
	    		$data['tagged_parts'] = '52aii';
	    		$data['tran_submitted_bank'] = $inputArr['submitted_bank'];
	    		$party_transacion_id = DB::table('party_transaction_register')->insertGetId($data);
	    		updateBankClosingBalance($party_transacion_id);
	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	
	    	endif;


	    }

	    public function getGoodsList(Request $request){

	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'All Complimentary Goods & Services in kind';
	    	$data['icon_header'] = 'icon_b allreceipts_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/goods-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;


	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',1)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})

	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate();
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';

	    	return view('party.hq_goods_list',$data);	
	    }

	    public function getGoodsAdd(Request $request){
	    	$data['script_files'] = 'js_files/party_transaction_register_add';
	    	$data['page_title'] = 'Receipt Voucher';
	    	$data['icon_header'] = 'icon_b allreceipts_b';

	    	return view('party.hq_goods_add',$data);
	    }

	    public function postGoodsAddSave(Request $request){

	    	$rules = array(
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required',
	    		'goods_desc' =>'required',
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all(); 
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $mydetails->state_id!=''?$mydetails->state_id:0;
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = $inputArr['payment_type'];
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		$data['inkind'] = 1;
	    		$data['tran_description'] = $inputArr['goods_desc'];
	    		$data['tagged_parts'] = '52aiii';

	    		DB::table('party_transaction_register')->insert($data);

	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

	    	endif;

	    }

	    public function getPartyTransactionRegisterDelete($id){

	    	DB::table('party_schedule1')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule2')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule3')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule4')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule5')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule6')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule7')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule8')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule9')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule10')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule11')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule12')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule13')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule14')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule15')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule16')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule17')->where('party_transaction_register',$id)->delete();
	    	DB::table('party_schedule18')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule19')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule20')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule21')->where('party_transaction_register_id',$id)->delete();
	    	DB::table('party_schedule22')->where('party_transaction_register_id',$id)->delete();

	    	DB::table('party_transaction_register')->where('id',$id)->delete();
	    	return redirect()->back()->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
	    }


	    public function getCashReceiptForPsu(Request $request){
	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Cash Receipt';
	    	$data['icon_header'] = 'icon_b cashreceipts_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/cash-receipt-add-psu';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',0)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})
	    	->where('tran_method','cash')
	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	$resultObj = !empty($request->srch_key) ? $resultObj
	    	->where('tran_source_name', 'LIKE', "%$request->srch_key%"): $resultObj;
	    	$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');
	    	$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');

	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
	    	$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

	    	return view('party.psu_cash_receipt_list',$data);
	    }

	    public function getCashReceiptAddPsu(){
	    	$user_id = CRUDBooster::myId();
	    	$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
			//$data['states'] = DB::table('states')->where('status','A')->get();
	    	$data['page_title'] = 'Cash Receipt';
	    	$data['icon_header'] = 'icon_b cashreceipts_b';
	    	$data['script_files'] = 'js_files/party_transaction_register_add';
	    	return view('party.psu_cash_receipt_add',$data);
	    }

	    public function postCashReceiptSavePsu(Request $request){

	    	$rules = array(
	    		'state' => 'required',
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required'
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all();  
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

	    		$fileNameUploaded = ''; 

	    		if ($request->hasFile('vouchar_filename')) { 
	    			$image = $request->file('vouchar_filename');
	    			$name = time().'.'.$image->getClientOriginalExtension();
	    			$destinationPath = public_path('/uploads');
	    			$fileNameUploaded =  "uploads/".  $name;
	    			$image->move($destinationPath, $name);
	    		}

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $inputArr['state'];
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = 'cash';
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		$data['tagged_parts'] = '62ai';
	    		$data['vouchar_filename'] = $fileNameUploaded;
	    		$data['vouchar_remarks'] = $inputArr['vouchar_remarks'];

	    		DB::table('party_transaction_register')->insert($data);

	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

	    	endif;
	    }

	    public function getGoodsListPsu(Request $request){

	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Goods/Service Received in kind';
	    	$data['icon_header'] = 'icon_b allreceipts_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/goods-add-psu';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',1)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})

	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	if( !empty($request->srch_key) ){
	    		$resultObj = $resultObj->where(function($query) use ($request) {
	    			$query->where('tran_source_name', 'LIKE', "%$request->srch_key%")
	    			->orWhere('tran_description', 'LIKE', "%$request->srch_key%")
	    			->orWhere('state_name', 'LIKE', "%$request->srch_key%");
	    		});
	    	}else{
	    		$resultObj = $resultObj;
	    	}
	    	$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');
	    	$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');

	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
	    	$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

	    	return view('party.psu_goods_list',$data);	
	    }

	    public function getGoodsAddPsu(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
			//$data['states'] = DB::table('states')->where('status','A')->get();
	    	$data['icon_header'] = 'icon_b allreceipts_b';
	    	$data['script_files'] = 'js_files/party_transaction_register_add';
	    	return view('party.psu_goods_add',$data);
	    }

	    public function postGoodsAddSavePsu(Request $request){

	    	$rules = array(
	    		'state' => 'required',
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required',
	    		'goods_desc' =>'required',
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all(); 
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

	    		$fileNameUploaded = ''; 

	    		if ($request->hasFile('vouchar_filename')) { 
	    			$image = $request->file('vouchar_filename');
	    			$name = time().'.'.$image->getClientOriginalExtension();
	    			$destinationPath = public_path('/uploads');
	    			$fileNameUploaded =  "uploads/".  $name;
	    			$image->move($destinationPath, $name);
	    		}

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $inputArr['state'];
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = $inputArr['payment_type'];
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		$data['inkind'] = 1;
	    		$data['tran_description'] = $inputArr['goods_desc'];
	    		$data['tagged_parts'] = '62aiii';
	    		$data['vouchar_filename'] = $fileNameUploaded;
	    		$data['vouchar_remarks'] = $inputArr['vouchar_remarks'];

	    		DB::table('party_transaction_register')->insert($data);

	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

	    	endif;
	    }

	    public function getBankDepositPsu(Request $request){

	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Deposit of Cheque,DD,PO & Online Transfer';
	    	$data['icon_header'] = 'icon_b noncash_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_income/bank-deposit-add-psu';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$resultObj = DB::table('party_transaction_register')
	    	->where('user_id',$userdetails->id)
	    	->where('election_id',$userdetails->election_id)
	    	->where('inkind',0)
	    	->where('is_petty',0)
	    	->where(function($query) {
	    		$query->where('tran_source', '=', "Party")
	    		->orWhere('tran_source', '=', "Others");
	    	})
	    	->where('tran_method','!=','cash')
	    	->where('tran_type','Cr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	if( !empty($request->srch_key) ){
	    		$resultObj = $resultObj->where(function($query) use ($request) {
	    			$query->where('tran_source_name', 'LIKE', "%$request->srch_key%")
	    			->orWhere('tran_method', 'LIKE', "%$request->srch_key%")
	    			->orWhere('tran_source_bank_name', 'LIKE', "%$request->srch_key%")
	    			->orWhere('state_name', 'LIKE', "%$request->srch_key%");
	    		});
	    	}else{
	    		$resultObj = $resultObj;
	    	}
			//->where('tran_receiver_name', 'LIKE', "%$request->srch_key%") : $resultObj;
	    	$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');
	    	$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');
	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
	    	$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

	    	return view('party.psu_bank_deposit_list',$data);
	    }

	    public function getBankDepositAddPsu(){
	    	$user_id = CRUDBooster::myId();
	    	$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
	    	$data['page_title'] = 'Deposit of Cheque,DD,PO & Online Transfer';
	    	$data['icon_header'] = 'icon_b noncash_b';
	    	$data['script_files'] = 'js_files/party_transaction_register_add';

	    	return view('party.psu_bank_deposit_add',$data);
	    }

	    public function postBankDepositSavePsu(request $request){

	    	$rules = array(
	    		'state' => 'required',
	    		'date' => 'required',
	    		'person_name' => 'required',
	    		'person_address' => 'required',
	    		'amount' => 'required',
	    		'remarks' => 'required',
	    		'receipt_no' =>'required',
	    		'payment_type' => 'required'
	    	);

	    	$validator = Validator::make(Input::all(), $rules);

	    	if ($validator->fails()):
	    		$message = $validator->errors()->all();
	    		return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);

	    	else:

	    		$inputArr = Input::all(); 
	    		$user_id = CRUDBooster::myId(); 
	    		$mydetails = getMyDetails($user_id); 

				//echo "<pre>"; print_r($request); die;

	    		$fileNameUploaded = ''; 

	    		if ($request->hasFile('vouchar_filename')) { 
	    			$image = $request->file('vouchar_filename');
	    			$name = time().'.'.$image->getClientOriginalExtension();
	    			$destinationPath = public_path('/uploads');
	    			$fileNameUploaded =  "uploads/".  $name;
	    			$image->move($destinationPath, $name);
	    		}

	    		$data['user_id'] = $user_id;
	    		$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    		$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    		$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    		$data['state_id'] = $inputArr['state'];
	    		$data['trans_parent_id'] = 0;
	    		$data['tran_date'] = $inputArr['date'];
	    		$data['tran_amount'] = $inputArr['amount'];
	    		$data['tran_source'] = 'Others';
	    		$data['tran_source_name'] = $inputArr['person_name'];
	    		$data['tran_source_address'] = $inputArr['person_address'];
	    		$data['tran_purpose'] = 'receipt';
	    		$data['tran_method'] = $inputArr['payment_type'];
	    		$data['tran_remarks'] = $inputArr['remarks'];
	    		$data['tran_rate'] = $inputArr['amount'];
	    		$data['tran_type'] = 'Cr';
	    		$data['tran_receiver_id'] = $user_id;
	    		$data['tran_receiver_name'] = $mydetails->name;
	    		$data['tran_receiver_address'] = $mydetails->party_address;
	    		$data['balance'] = getCurrentBalance('party_transaction_register')+$inputArr['amount'];
	    		$data['receipt_no'] = $inputArr['receipt_no'];
	    		$data['tran_source_bank_name'] = $inputArr['bank_name'];
	    		$data['tagged_parts'] = '62aii';
	    		$data['vouchar_filename'] = $fileNameUploaded;
	    		$data['vouchar_remarks'] = $inputArr['vouchar_remarks'];
	    		$data['tran_submitted_bank'] = $inputArr['submitted_bank'];

	    		$party_transaction_register_id = DB::table('party_transaction_register')->insertGetId($data);
	    		updateBankClosingBalance($party_transaction_register_id);
	    		return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

	    	endif;
	    }

	    public function getPrintAnnexureF1(Request $request){
	    	$data = $this->Annexuref1Data();
	    	$data['layout_title'] = 'Annexure - F1';
	    	$data['pdf_content'] = 'annexure_f1';
	    	$data['pdf_link'] = url()->current().'-pdf';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPrintAnnexureF1Pdf(Request $request){
	    	$data = $this->Annexuref1Data();
	    	$pdf = PDF::loadView('party.pdf.annexure_f1', $data);
	    	return $pdf->download('Annexure_F1.pdf');
	    }

	    public function Annexuref1Data(){
	    	$data['candidate_details'] = getMyDetails('');
	    	$user_id = CRUDBooster::myId();
	    	$privilage_id = CRUDBooster::myPrivilegeId();
	    	if($privilage_id == 4){
	    		$data['states'] = DB::table('user_details')->where('user_id',$user_id)->get();
	    	}
	    	$data = array();
	    	return $data;	
	    }

	    public function getPrintAnnexureF2(Request $request){
	    	$data = $this->Annexuref1Data();
	    	$data['layout_title'] = 'Annexure - F2';
	    	$data['pdf_content'] = 'annexure_f2';
	    	$data['pdf_link'] = url()->current().'-pdf';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPrintAnnexureF2Pdf(Request $request){
	    	$data = $this->Annexuref2Data();
	    	$pdf = PDF::loadView('party.pdf.annexure_f2', $data);
	    	return $pdf->download('Annexure_F2.pdf');
	    }

	    public function Annexuref2Data(){
	    	$data['candidate_details'] = getMyDetails('');
	    	$user_id = CRUDBooster::myId();
	    	$privilage_id = CRUDBooster::myPrivilegeId();
	    	if($privilage_id == 4){
	    		$data['states'] = DB::table('user_details')->where('user_id',$user_id)->get();
	    	}
	    	$data = array();
	    	return $data;

	    }



	}