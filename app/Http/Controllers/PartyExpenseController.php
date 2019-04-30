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
use PDF;
use Helper;

class PartyExpenseController extends \crocodicstudio\crudbooster\controllers\CBController {

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

	    public function getAllExpenses(Request $request){ 
	    	$data = [];
	    	$userdetails = getMyDetails('');
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b recordexpense_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/party_expense/expenses-add';
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
	    	->where('tag_schedule','!=','Null')
	    	->where('given_to','P')
	    	->where('tran_type','Dr');
	    	$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
	    	$resultObj = !empty($request->srch_key) ? $resultObj->where(function($query) use ($request) {
	    		$query->where('tran_purpose', 'LIKE', "%$request->srch_key%")
	    		->orWhere('tag_schedule', 'LIKE', "%$request->srch_key%")
	    		->orWhere('tran_method', 'LIKE', "%$request->srch_key%");
	    	}) : $resultObj;
	    	$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
	    	$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
	    	$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
	    	$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';
			//pd($data['result']);
	    	return view('party.hq_expense_list',$data);
	    }

	    public function getExpensesAdd(){
	    	$user_id = CRUDBooster::myId();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b recordexpense_b';
	    	$data['expense_types'] = DB::table('expensetypes_master')->where('status',1)->where('use_forType','HQ')->get();
	    	$data['states'] = DB::table('states')->where('status','A')->get();
	    	$data['script_files'] = 'js_files/party_general_expenses';
	    	return view('party.hq_expenses_add',$data);

	    }

	    public function postGeneralExpensesAdd(Request $request){

	    	$inputArr = $request->all(); 
			//echo "<pre>"; print_r($inputArr); die;
	    	$expense_type = $inputArr['expense_type'];

	    	$inputArr = Input::all(); 
	    	$user_id = CRUDBooster::myId(); 
	    	$mydetails = getMyDetails($user_id); 

	    	$data['user_id'] = $user_id;
	    	$data['privilege_id'] = CRUDBooster::myPrivilegeId();
	    	$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
	    	$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
	    	$data['state_id'] = $inputArr['state']?$inputArr['state']:$mydetails->state_id;
	    	$data['trans_parent_id'] = 0;
	    	$data['tran_date'] = $inputArr['date'];
	    	$data['tran_amount'] = $inputArr['amount_paid'];
	    	$data['tran_amount_outstanding'] = $inputArr['amount_outstanding'];
	    	$data['tran_source'] = 'Others';
	    	$data['tran_source_name'] = $mydetails->name;
	    	$data['tran_source_address'] = $mydetails->party_address;
	    	$data['tran_purpose'] = $inputArr['expense_type_text'];
	    	$data['tran_method'] = $inputArr['payment_type'];
	    	$data['tran_rate'] = $inputArr['amount'];
	    	$data['tran_type'] = 'Dr';
	    	$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount'];
	    	$data['receipt_no'] = $inputArr['receipt_no'];
	    	$data['tran_submitted_bank'] = $inputArr['expenses_bank'];
			$data['given_to'] = 'P';    // For Party

			if($expense_type == 1){	
				$data['tagged_parts'] = '53bi';
				$data['tag_schedule'] = '2';
			}

			if($expense_type == 2){	
				$data['tagged_parts'] = '53bii';
				$data['tag_schedule'] = '2';
			}

			if($expense_type == 3){	
				$data['tagged_parts'] = '53biii';
				$data['tag_schedule'] = '3';
			}

			if($expense_type == 4){	
				$data['tagged_parts'] = '53biv';
				$data['tag_schedule'] = '4';
			}

			if($expense_type == 5){	
				$data['tagged_parts'] = '53bv';
				$data['tag_schedule'] = '5';
			}

			if($expense_type == 6){	
				$data['tagged_parts'] = '53bvi';
				$data['tag_schedule'] = '6	';
			}

			$fileNameUploaded =  "";
			if ($request->hasFile('vouchar_filename')) {
				$image = $request->file('vouchar_filename');
				//pd($image);
				$name = $user_id.'_'.time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/uploads');
				$fileNameUploaded =  "uploads/".  $name;
				$image->move($destinationPath, $name);
				//$article->image = $name;
			}
			//die();
			$data['vouchar_filename'] = $fileNameUploaded;
			$data['vouchar_remarks'] = Input::get('vouchar_remarks');

			if($party_transacion_id = DB::table('party_transaction_register')->insertGetId($data)){

				$dataSCH1['date'] = $inputArr['date'];
				$dataSCH1['cash'] = $inputArr['payment_type'];
				$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
				$dataSCH1['total_amount'] = $inputArr['amount_paid'];
				$dataSCH1['outstanding_amount'] = $inputArr['amount_outstanding'];
				$dataSCH1['party_transaction_register'] = $party_transacion_id;
				$dataSCH1['name'] = $mydetails->name;
				$dataSCH1['address'] = $mydetails->party_address;
				$dataSCH1['user_id'] = $mydetails->id;
				$dataSCH1['privilege_id'] = CRUDBooster::myPrivilegeId();
				$dataSCH1['party_id'] = $mydetails->party_id;
				$dataSCH1['election_id'] = $mydetails->election_id;
				$dataSCH1['state_id'] = $mydetails->state_id;
				$dataSCH1['state'] = getStateNameById($inputArr['state']);
				

				DB::table('party_schedule1')->insert($dataSCH1);

				if($expense_type == 1 || $expense_type == 2){

					$dataSCH2['date'] = $inputArr['date'];
					$dataSCH2['cash'] = $inputArr['payment_type'];
					$dataSCH2['venue'] = $inputArr['venue'];
					$dataSCH2['name_campaigner'] = $inputArr['name_campaigner'];
					$dataSCH2['travel_mode'] = ucfirst($inputArr['travel_mode']);
					$dataSCH2['operator_name'] = $inputArr['name_operator'];
					$dataSCH2['total_amount'] = $inputArr['amount_paid'];
					$dataSCH2['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH2['party_transaction_register'] = $party_transacion_id;
					$dataSCH2['name'] = $mydetails->name;
					$dataSCH2['address'] = $mydetails->party_address;
					$dataSCH2['user_id'] = $mydetails->id;
					$dataSCH2['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH2['party_id'] = $mydetails->party_id;
					$dataSCH2['election_id'] = $mydetails->election_id;
					$dataSCH2['state_id'] = $mydetails->state_id;
					$dataSCH2['state'] = getStateNameById($inputArr['state']);

					if($expense_type == 1) {
						$dataSCH2['is_star'] = 'Y';	
					}
					if($expense_type == 2){	
						$dataSCH2['is_star'] = 'N';
					}
						//pd($dataSCH2);
					DB::table('party_schedule2')->insert($dataSCH2);

				}

				if($expense_type == 3){	

					$dataSCH3['date'] = $inputArr['date'];
					$dataSCH3['cash'] = $inputArr['payment_type'];
					$dataSCH3['name_payee'] = $inputArr['name_payee'];
					$dataSCH3['name_media'] = $inputArr['name_media'];
					$dataSCH3['total_amount'] = $inputArr['amount_paid'];
					$dataSCH3['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH3['party_transaction_register'] = $party_transacion_id;
					$dataSCH3['name'] = $mydetails->name;
					$dataSCH3['address'] = $mydetails->party_address;
					$dataSCH3['user_id'] = $mydetails->id;
					$dataSCH3['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH3['party_id'] = $mydetails->party_id;
					$dataSCH3['election_id'] = $mydetails->election_id;
					$dataSCH3['state_id'] = $mydetails->state_id;
					$dataSCH3['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule3')->insert($dataSCH3);
				}

				if($expense_type == 4){	

					$dataSCH4['date'] = $inputArr['date'];
					$dataSCH4['cash'] = $inputArr['payment_type'];
					$dataSCH4['constituency_name_no'] = $inputArr['constituency_name'];
					$dataSCH4['item_details'] = $inputArr['item_details4'];
					$dataSCH4['total_amount'] = $inputArr['amount_paid'];
					$dataSCH4['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH4['party_transaction_register'] = $party_transacion_id;
					$dataSCH4['name'] = $mydetails->name;
					$dataSCH4['address'] = $mydetails->party_address;
					$dataSCH4['user_id'] = $mydetails->id;
					$dataSCH4['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH4['party_id'] = $mydetails->party_id;
					$dataSCH4['election_id'] = $mydetails->election_id;
					$dataSCH4['state_id'] = $mydetails->state_id;
					$dataSCH4['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule4')->insert($dataSCH4);
				}

				if($expense_type == 5){	

					$dataSCH5['date'] = $inputArr['date'];
					$dataSCH5['cash'] = $inputArr['payment_type'];
					$dataSCH5['venue'] = $inputArr['venue'];
					$dataSCH5['date_meeting'] = $inputArr['date_meeting'];
					$dataSCH5['item_details'] = $inputArr['item_details5'];
					$dataSCH5['total_amount'] = $inputArr['amount_paid'];
					$dataSCH5['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH5['party_transaction_register'] = $party_transacion_id;
					$dataSCH5['name'] = $mydetails->name;
					$dataSCH5['address'] = $mydetails->party_address;
					$dataSCH5['user_id'] = $mydetails->id;
					$dataSCH5['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH5['party_id'] = $mydetails->party_id;
					$dataSCH5['election_id'] = $mydetails->election_id;
					$dataSCH5['state_id'] = $mydetails->state_id;
					$dataSCH5['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule5')->insert($dataSCH5);
				}

				if($expense_type == 6){	

					$dataSCH6['date'] = $inputArr['date'];
					$dataSCH6['cash'] = $inputArr['payment_type'];
					$dataSCH6['purpose'] = $inputArr['purpose'];
					$dataSCH6['item_details'] = $inputArr['item_details6'];
					$dataSCH6['total_amount'] = $inputArr['amount_paid'];
					$dataSCH6['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH6['party_transaction_register'] = $party_transacion_id;
					$dataSCH6['name'] = $mydetails->name;
					$dataSCH6['address'] = $mydetails->party_address;
					$dataSCH6['user_id'] = $mydetails->id;
					$dataSCH6['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH6['party_id'] = $mydetails->party_id;
					$dataSCH6['election_id'] = $mydetails->election_id;
					$dataSCH6['state_id'] = $mydetails->state_id;
					$dataSCH6['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule6')->insert($dataSCH6);
				}
			}
			updateBankClosingBalance($party_transacion_id);
			return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);

		}

		public function getAllExpensesPsu(Request $request){
			
			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Expenses for General Party Propaganda';
			$data['icon_header'] = 'icon_b recordexpense_b';
			$data['ignore_chks'] = true;			
			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/party_expense/expenses-add-psu';
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
			->where('tag_schedule','!=','Null')
			->where('given_to','P')
			->where('tran_type','Dr');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			if( !empty($request->srch_key) ){
				$resultObj = $resultObj->where(function($query) use ($request) {
					$query->where('tran_purpose', 'LIKE', "%$request->srch_key%")
					->orWhere('tran_method', 'LIKE', "%$request->srch_key%")
					->orWhere('expense_type', 'LIKE', "%$request->srch_key%")
					->orWhere('state_name', 'LIKE', "%$request->srch_key%");
				});
			}else{
				$resultObj = $resultObj;
			}
			$resultObj = $resultObj->leftJoin('expensetypes_master', 'party_transaction_register.tran_purpose', '=', 'expensetypes_master.id');

			$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');
			$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');

			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';
			
			return view('party.psu_expense_list',$data);
		}

		public function getExpensesAddPsu(){

			$user_id = CRUDBooster::myId();
			$data['expense_types'] = DB::table('expensetypes_master')->where('status',1)->where('use_forType','SU')->get();
			$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();	
			$data['script_files'] = 'js_files/party_general_expenses_psu';
			$data['page_title'] = 'Expenses for General Party Propaganda';
			$data['icon_header'] = 'icon_b recordexpense_b';
			return view('party.psu_expenses_add',$data);

		}

		public function postGeneralExpensesAddPsu(Request $request){

			$inputArr = $request->all(); 
			//echo "<pre>"; print_r($inputArr); die;
			$expense_type = $inputArr['expense_type'];

			$inputArr = Input::all(); 
			$user_id = CRUDBooster::myId(); 
			$mydetails = getMyDetails($user_id); 

			$data['user_id'] = $user_id;
			$data['privilege_id'] = CRUDBooster::myPrivilegeId();
			$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
			$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
			$data['state_id'] = $inputArr['state'];
			$data['trans_parent_id'] = 0;
			$data['tran_date'] = $inputArr['date'];
			$data['tran_amount'] = $inputArr['amount_paid'];
			$data['tran_amount_outstanding'] = $inputArr['amount_outstanding'];
			$data['tran_source'] = 'Others';
			$data['tran_source_name'] = $mydetails->name;
			$data['tran_source_address'] = $mydetails->party_address;
			$data['tran_purpose'] = $inputArr['expense_type_text'];
			$data['tran_method'] = $inputArr['payment_type'];
			$data['tran_rate'] = $inputArr['amount'];
			$data['tran_type'] = 'Dr';
			$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount'];
			$data['receipt_no'] = $inputArr['receipt_no'];
			$data['tran_submitted_bank'] = $inputArr['expenses_bank'];
			$data['given_to'] = 'P';

			if($expense_type == 7){	
				$data['tagged_parts'] = '63bi,63a';
				$data['tag_schedule'] = '12';
			}

			if($expense_type == 8){	
				$data['tagged_parts'] = '63bii,63a';
				$data['tag_schedule'] = '13';
			}

			if($expense_type == 9){	
				$data['tagged_parts'] = '63bii,63a';
				$data['tag_schedule'] = '14';
			}

			if($expense_type == 10){	
				$data['tagged_parts'] = '63bii,63a';
				$data['tag_schedule'] = '15';
			}

			if($expense_type == 11){	
				$data['tagged_parts'] = '63bii,63a';
				$data['tag_schedule'] = '16';
			}

			if($expense_type == 12){	
				$data['tagged_parts'] = '63bii,63a';
				$data['tag_schedule'] = '17';
			}

			if($party_transacion_id = DB::table('party_transaction_register')->insertGetId($data)){

				if($expense_type == 7 || $expense_type == 8){

					$dataSCH2['date'] = $inputArr['date'];
					$dataSCH2['cash'] = $inputArr['payment_type'];
					$dataSCH2['venue'] = $inputArr['venue'];
					$dataSCH2['name_campaigner'] = $inputArr['name_campaigner'];
					$dataSCH2['operator_name'] = $inputArr['name_operator'];
					$dataSCH2['total_amount'] = $inputArr['amount_paid'];
					$dataSCH2['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH2['party_transaction_register'] = $party_transacion_id;
					$dataSCH2['name'] = $mydetails->name;
					$dataSCH2['address'] = $mydetails->party_address;
					$dataSCH2['user_id'] = $mydetails->id;
					$dataSCH2['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH2['party_id'] = $mydetails->party_id;
					$dataSCH2['election_id'] = $mydetails->election_id;
					$dataSCH2['state_id'] = $inputArr['state'];
					$dataSCH2['state'] = getStateNameById($inputArr['state']);

					if($inputArr['travel_mode'] =='other'){
						$dataSCH2['travel_mode'] = $inputArr['travel_mode_other'];
					}
					else {
						$dataSCH2['travel_mode'] = ucfirst($inputArr['travel_mode']);
					}

					if($expense_type == 7) {
						$dataSCH2['is_star'] = 'Y';	
						DB::table('party_schedule12')->insert($dataSCH2);
					}
					if($expense_type == 8){	
						$dataSCH2['is_star'] = 'N';
						DB::table('party_schedule13')->insert($dataSCH2);
					}


				}

				if($expense_type == 9){	

					$dataSCH3['date'] = $inputArr['date'];
					$dataSCH3['cash'] = $inputArr['payment_type'];
					$dataSCH3['name_payee'] = $inputArr['name_payee'];
					$dataSCH3['name_media'] = $inputArr['name_media'] == 'Others'?$inputArr['name_media_other']:$inputArr['name_media'];
					$dataSCH3['total_amount'] = $inputArr['amount_paid'];
					$dataSCH3['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH3['party_transaction_register'] = $party_transacion_id;
					$dataSCH3['name'] = $mydetails->name;
					$dataSCH3['address'] = $mydetails->party_address;
					$dataSCH3['user_id'] = $mydetails->id;
					$dataSCH3['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH3['party_id'] = $mydetails->party_id;
					$dataSCH3['election_id'] = $mydetails->election_id;
					$dataSCH3['state_id'] = $inputArr['state'];
					$dataSCH3['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule14')->insert($dataSCH3);
				}

				if($expense_type == 10){	

					$dataSCH4['date'] = $inputArr['date'];
					$dataSCH4['cash'] = $inputArr['payment_type'];
					$dataSCH4['constituency_name_no'] = $inputArr['constituency_name'];
					$dataSCH4['item_details'] = $inputArr['item_details'];
					$dataSCH4['total_amount'] = $inputArr['amount_paid'];
					$dataSCH4['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH4['party_transaction_register'] = $party_transacion_id;
					$dataSCH4['name'] = $mydetails->name;
					$dataSCH4['address'] = $mydetails->party_address;
					$dataSCH4['user_id'] = $mydetails->id;
					$dataSCH4['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH4['party_id'] = $mydetails->party_id;
					$dataSCH4['election_id'] = $mydetails->election_id;
					$dataSCH4['state_id'] = $inputArr['state'];
					$dataSCH4['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule15')->insert($dataSCH4);
				}

				if($expense_type == 11){	

					$dataSCH5['date'] = $inputArr['date'];
					$dataSCH5['cash'] = $inputArr['payment_type'];
					$dataSCH5['venue'] = $inputArr['venue_sc5'];
					$dataSCH5['date_meeting'] = $inputArr['date_meeting'];
					$dataSCH5['item_details'] = $inputArr['item_details_sc5'];
					$dataSCH5['total_amount'] = $inputArr['amount_paid'];
					$dataSCH5['outstanding_amount'] = $inputArr['amount_outstanding'];
					$dataSCH5['party_transaction_register'] = $party_transacion_id;
					$dataSCH5['name'] = $mydetails->name;
					$dataSCH5['address'] = $mydetails->party_address;
					$dataSCH5['user_id'] = $mydetails->id;
					$dataSCH5['privilege_id'] = CRUDBooster::myPrivilegeId();
					$dataSCH5['party_id'] = $mydetails->party_id;
					$dataSCH5['election_id'] = $mydetails->election_id;
					$dataSCH5['state_id'] = $inputArr['state'];
					$dataSCH5['state'] = getStateNameById($inputArr['state']);

					DB::table('party_schedule16')->insert($dataSCH5);
				}

				if($expense_type == 12){	

					$dataSCH6['date'] = $inputArr['date'];
					$dataSCH6['cash'] = $inputArr['payment_type'];
					$dataSCH6['purpose'] = $inputArr['purpose'];
						$dataSCH6['item_details'] = $inputArr['purpose'];//$inputArr['item_details_sc17'];
						$dataSCH6['total_amount'] = $inputArr['amount_paid'];
						$dataSCH6['outstanding_amount'] = $inputArr['amount_outstanding'];
						$dataSCH6['party_transaction_register'] = $party_transacion_id;
						$dataSCH6['name'] = $mydetails->name;
						$dataSCH6['address'] = $mydetails->party_address;
						$dataSCH6['user_id'] = $mydetails->id;
						$dataSCH6['privilege_id'] = CRUDBooster::myPrivilegeId();
						$dataSCH6['party_id'] = $mydetails->party_id;
						$dataSCH6['election_id'] = $mydetails->election_id;
						$dataSCH6['state_id'] = $inputArr['state'];
						$dataSCH6['state'] = getStateNameById($inputArr['state']);
						
						DB::table('party_schedule17')->insert($dataSCH6);
					}
				}
				updateBankClosingBalance($party_transacion_id);

				return redirect('admin/party_expense/all-expenses-psu')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);

			}

			public function getAllExpensesCandidatesPsu(Request $request){

				$data = [];
				$userdetails = getMyDetails('');
				$data['action_url'] = $request->url();
				$data['page_title'] = 'Record Expenses-for Candidate(s) District level units';
				$data['icon_header'] = 'icon_b recordexpense_b';
				$data['ignore_chks'] = true;			
				$data['button_add'] = true;
				$data['button_add_url'] = 'admin/party_expense/expenses-add-candidate-psu';
				$data['button_delete'] = true;
				$data['button_show'] = false;
				$data['button_filter'] = true;

				$resultObj = DB::table('party_transaction_register')
				->where('user_id',$userdetails->id)
				->where('election_id',$userdetails->election_id)
				->where('given_to','C');
				$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
				if( !empty($request->srch_key) ){
					$resultObj = $resultObj->where(function($query) use ($request) {
						$query->where('tran_receiver_name', 'LIKE', "%$request->srch_key%")
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

				return view('party.psu_candidate_expense_list',$data);
			}

			public function getAjaxForm($id) {
				$user_id = CRUDBooster::myId();
				$form_array = [
					6 => 'form_a',
					7 => 'form_b',
					8 => 'form_c',
					9 => 'form_d',
					10 => 'form_e'   
				];
				$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
				$data['party_names'] = DB::table('party_masters')->where('status',1)->orderby('id','desc')->get();  

				echo view('party.candidate-expense-psu.'.$form_array[$id],$data);              
			}

			public function getExpensesAddCandidatePsu(){
				$user_id = CRUDBooster::myId();
				$data['expense_types'] = DB::table('candidate_expensetypes_master')->where('use_forType','SU')->where('status',1)->get();
				$data['states'] = DB::table('states')->where('status','A')->get();
				$data['script_files'] = 'js_files/party_candidate_general_expenses_psu';
				$data['page_title'] = 'Record Expenses-for Candidate(s) District level units';
				$data['icon_header'] = 'icon_b recordexpense_b';
				return view('party.psu_candidate_expenses_add',$data);
			}

			public function postGeneralExpensesAddCandidatePsu(Request $request){

				$inputArr = $request->all();
				$expense_type = $inputArr['expense_type'];
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
				$data['state_id'] = $inputArr['candidate_state_id'];
				$data['trans_parent_id'] = 0;
				$data['tran_date'] = $inputArr['date'];
				$data['tran_source'] = 'Self';
				$data['tran_source_name'] = $mydetails->name;
				$data['tran_source_address'] = $mydetails->party_address;
				$data['tran_purpose'] = $expense_type; // type of expense id 
				$data['tran_method'] = $inputArr['payment_mode'];
				$data['tran_type'] = 'Dr';
				$data['given_to'] = 'C'; // for candidate
				$data['vouchar_filename'] = $fileNameUploaded;
				$data['vouchar_remarks'] = $inputArr['vouchar_remarks'];
				if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
					$data['tran_submitted_bank'] = $inputArr['chq_expenses_bank'];
				}else if ($inputArr['payment_mode'] == 'RTGS' || $inputArr['payment_mode'] == 'Fund Transfer') {
					$data['tran_submitted_bank'] = $inputArr['expenses_bank'];
				}
				if(array_key_exists('candidates_name',$inputArr)){
					$data['tran_receiver_name'] = $inputArr['candidates_name'];
				}
				else {
					$data['tran_receiver_name'] = $inputArr['name'];
				}
				$data['tran_amount'] = $inputArr['amount_paid'];
				$data['tran_amount_outstanding'] = $inputArr['amount_outstanding'];
				$data['tran_rate'] = $inputArr['amount_paid'];
				$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount_paid'];
			// if(array_key_exists('amount_cash',$inputArr) && array_key_exists('amount_noncash',$inputArr)){
			// 	$data['tran_amount'] = $inputArr['amount_cash']+$inputArr['amount_noncash'];
			// 	$data['tran_amount_outstanding'] = 0;
			// 	$data['tran_rate'] = $inputArr['amount_cash']+$inputArr['amount_noncash'];
			// 	$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount']-$inputArr['amount_noncash'];
			// 	$data['tran_amount_brkup_cash'] = $inputArr['amount_cash'];
			// 	$data['tran_amount_brkup_noncash'] = $inputArr['amount_noncash'];
			// }
			// else {

			// }

			//pd($data);
				if ($expense_type == 6){	
					$data['tagged_parts'] = '64i';
					$data['tag_schedule'] = '18';
				} else if ($expense_type == 7) {
					$data['tagged_parts'] = '64ii';
					$data['tag_schedule'] = '19';
				} else if ($expense_type == 8) {
					$data['tagged_parts'] = '64iii';
					$data['tag_schedule'] = '20';
				} else if ($expense_type == 9) {
					$data['tagged_parts'] = '64iv';
					$data['tag_schedule'] = '21';
				} else if ($expense_type == 10) {
					$data['tagged_parts'] = '64v';
					$data['tag_schedule'] = '22';
				}

				if($party_transacion_id = DB::table('party_transaction_register')->insertGetId($data)){

					$dataSCH1['candidate_state_id'] = $inputArr['candidate_state_id'];	
					$dataSCH1['user_id'] = $user_id;
					$dataSCH1['privilege_id'] = $data['privilege_id'];
					$dataSCH1['party_id'] = $mydetails->party_id;
					$dataSCH1['election_id'] = $mydetails->election_id;
					$dataSCH1['state_id'] = $inputArr['candidate_state_id'];
					$dataSCH1['state'] = getStateNameById($inputArr['candidate_state_id']);
					$dataSCH1['date'] = $inputArr['date'];
					$dataSCH1['party_transaction_register_id'] = $party_transacion_id;

					if($expense_type == 6){	
						$dataSCH1['name'] = $inputArr['name'];
						$dataSCH1['party_name'] = $inputArr['party_name'];
						if ($inputArr['party_name']=='Others') {
							$dataSCH1['party_name'] = $inputArr['other_party'];
						}
						$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
						$dataSCH1['cash'] = $inputArr['payment_mode'];
						$dataSCH1['amount_cash'] = $inputArr['amount_paid'];
						$dataSCH1['amount_noncash'] = $inputArr['amount_noncash'];
						if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
							$dataSCH1['date_of_instruction'] = $inputArr['cheque_date'];
							$dataSCH1['dd_or_cheque_no'] = $inputArr['cheque_no'];
						}else{
							$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['receipt_date'];
						}	
						DB::table('party_schedule18')->insert($dataSCH1);
					} else if ($expense_type == 7) {
						$dataSCH1['name'] = $inputArr['name'];
						$dataSCH1['name_of_media'] = $inputArr['name_of_media'];
						$dataSCH1['other_details'] = $inputArr['other_details'];
						$dataSCH1['amount_paid'] = $inputArr['amount_paid'];
						$dataSCH1['amount_outstanding'] = $inputArr['amount_outstanding'];
						$dataSCH1['cash'] = $inputArr['payment_mode'];
						if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
							$dataSCH1['dd_or_cheque_no'] = $inputArr['cheque_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['cheque_date'];
						}else{
							$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['receipt_date'];
						}					
						DB::table('party_schedule19')->insert($dataSCH1);
					} else if ($expense_type == 8) {
						$dataSCH1['name'] = $inputArr['name'];
						$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
						$dataSCH1['details_of_items'] = $inputArr['details_of_items'];
						$dataSCH1['amount_paid'] = $inputArr['amount_paid'];
						$dataSCH1['amount_outstanding'] = $inputArr['amount_outstanding'];
						$dataSCH1['cash'] = $inputArr['payment_mode'];
						if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
							$dataSCH1['dd_or_cheque_no'] = $inputArr['cheque_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['cheque_date'];
						}else{
							$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['receipt_date'];
						}
						DB::table('party_schedule20')->insert($dataSCH1);
					} else if ($expense_type == 9) {
						$dataSCH1['name'] = $inputArr['candidates_name'];
						$dataSCH1['name_of_star_campaigner'] = $inputArr['name_of_star_campaigner'];
						$dataSCH1['candidates_name'] = $inputArr['candidates_name'];
						$dataSCH1['details_of_items'] = $inputArr['details_of_items'];
						$dataSCH1['amount_paid'] = $inputArr['amount_paid'];
						$dataSCH1['amount_outstanding'] = $inputArr['amount_outstanding'];
						$dataSCH1['cash'] = $inputArr['payment_mode'];
						if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
							$dataSCH1['dd_or_cheque_no'] = $inputArr['cheque_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['cheque_date'];
						}else{
							$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['receipt_date'];
						}
						DB::table('party_schedule21')->insert($dataSCH1);
					} else if ($expense_type == 10) {
						$dataSCH1['name'] = $inputArr['name'];
						$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
						$dataSCH1['details_of_items'] = $inputArr['details_of_items'];
						$dataSCH1['amount_paid'] = $inputArr['amount_paid'];
						$dataSCH1['amount_outstanding'] = $inputArr['amount_outstanding'];
						$dataSCH1['cash'] = $inputArr['payment_mode'];
						if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
							$dataSCH1['dd_or_cheque_no'] = $inputArr['cheque_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['cheque_date'];
						}else{
							$dataSCH1['dd_or_cheque_no'] = $inputArr['receipt_no'];
							$dataSCH1['date_of_instruction'] = $inputArr['receipt_date'];
						}
						DB::table('party_schedule22')->insert($dataSCH1);
					}

				}
				updateBankClosingBalance($party_transacion_id);
				return redirect('admin/party_expense/all-expenses-candidates-psu')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	;
			}

			public function postLumpSumAmountAddSave(Request $request){
				$inputArr = $request->all();
				$user_id = CRUDBooster::myId(); 
				$mydetails = getMyDetails($user_id); 

				$data['user_id'] = $user_id;
				$data['privilege_id'] = CRUDBooster::myPrivilegeId();
				$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
				$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
				$data['state_id'] = $inputArr['state'];
				$data['trans_parent_id'] = 0;
				$data['tran_date'] = $inputArr['date'];
				$data['tran_amount'] = $inputArr['amount'];
				$data['tran_source'] = 'Self';
				$data['tran_source_name'] = $mydetails->name;
				$data['tran_source_address'] = $mydetails->party_address;
				$data['tran_purpose'] = 'Record Lump Sum amount given to State Unit(s)';
				$data['tran_method'] = !empty($inputArr['payment_other'])?$inputArr['payment_other']:$inputArr['payment_mode'];
				$data['tran_receiver_name'] = $inputArr['tran_receiver_name'];
				$data['tran_rate'] = $inputArr['amount'];
				$data['receipt_no'] = $inputArr['receipt_no'];
				$data['tran_submitted_bank'] = $inputArr['expenses_bank'];
				$data['tran_type'] = 'Dr';
				$data['given_to'] = 'U'; // for candidate
				$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount'];
				$data['tagged_parts'] = 'B65';
				$party_transacion_id = DB::table('party_transaction_register')->insertGetId($data);
				updateBankClosingBalance($party_transacion_id);
				return redirect('admin/party_expense/lump-sum-amount-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
			}

			public function getLumpSumAmountList(Request $request) {
				$data = [];
				$userdetails = getMyDetails('');
				$data['action_url'] = $request->url();
				$data['page_title'] = 'Record Lump Sum Amount given by State Unit of Party to other Parties';
				$data['icon_header'] = 'icon_b depositself_b';
				$data['ignore_chks'] = true;			
				$data['button_add'] = true;
				$data['button_add_url'] = 'admin/party_expense/lump-sum-amount-add';
				$data['button_delete'] = true;
				$data['button_show'] = false;
				$data['button_filter'] = true;

				$resultObj = DB::table('party_transaction_register')
				->where('user_id',$userdetails->id)
				->where('election_id',$userdetails->election_id)
				->where('given_to','U');
				$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
				$resultObj = !empty($request->srch_key) ? $resultObj
				->where('tran_receiver_name', 'LIKE', "%$request->srch_key%"): $resultObj;

				$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
				$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
				$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
				$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

				return view('party.psu_record_lump_sum_list',$data);
			}

			public function getLumpSumAmountAdd(){
				$user_id = CRUDBooster::myId();		
				$data = [];	
				$data['page_title'] = 'Record Lump Sum Amount given by State Unit of Party to other Parties';
				$data['icon_header'] = 'icon_b depositself_b';	
				$data['mode_payment'] = [
					'Cash' => 'Cash',
					'Cheque' => 'Cheque',
					'DD' => 'DD',
					'PO' => 'PO',
					'RTGS' => 'RTGS',
					'Online Transfer' => 'Online Transfer',
					'Any Other' => 'Any Other'
				];
				$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();	
				$data['script_files'] = 'js_files/psu_record_lump_sum_add';						
				return view('party.psu_record_lump_sum_add',$data);
			}

			public function Annexuref2PartAData() {
				$data['candidate_details'] = getMyDetails('');
			//pd($data['candidate_details']);
				$user_id = $data['candidate_details']->id;

				$privilege_id = CRUDBooster::myPrivilegeId();
				$state_names = '';			

				$data['bank_details'] = DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get(['bank_name','branch_name','balance','closing_balance']);
				$data['election_details']  = getElectionDates();

				/* This is to check if this is applicable for this type of user */
				$data['applicable_flag'] = 1;
				if ($privilege_id == 5) {
					$data['applicable_flag'] = 0;
					return $data;
				}


				/* Cash Receipt From All Source */
				$data['cash_in_hand']  = PartyTransactionRegister::where('inkind',0)->whereIn('tran_method',['Cash','cash'])->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

				/* NonCash Receipt From all source */
				$data['cheque_in_hand']  = PartyTransactionRegister::where('inkind',0)->whereNotIn('tran_method',['Cash','cash'])->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');
			//$data['in_kind']  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

				/* INkind Income */
				$data['in_kind']  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get(['tran_description','tran_amount']);

				/* Expenses for Party Propaganda */
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
				/* .Expenses for Party Propaganda */


				/* Expanses details for Schedules */
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
				/* .Expanses details for Schedules */

				/**************************/
				/* MAY BE NOT BEING USED */
				/**************************/
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

				/**************************/
				/* MAY BE NOT BEING USED */
				/**************************/


				/* All lumpsum expanse data */
				$data['lump_sum_data'] = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','A55')->orderBy('tran_date','asc')->get();

				/* Cash Lumpsum Expense */
				$cashExpanseLS = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->where('tagged_parts','A55')->get()->sum('tran_amount');

				/* NonCash Lumpsum Expense */
				$chqExpanseLS = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->where('tagged_parts','A55')->get()->sum('tran_amount');

				/* All Cash Expenses */
				$cashExpanses = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->get()->sum('tran_amount');

				/* Cash in hand ondate */
				$totCashInhandLast = ( $data['candidate_details']->party_cash_in_hand + $data['cash_in_hand'] ) - ( $cashExpanses );
				//pd($cashExpanses);
				$data['totCashInhandLast'] = $totCashInhandLast;

				/* Total Bank balance */
				$bnkBal = 0;
				if(sizeof($data['bank_details'])>0){
					foreach($data['bank_details'] as $Val){                     
						$bnkBal += $Val->balance;
					}  
				}

				/* All NonCash Expenses */
				$chqExpanses = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['Cash','cash'])->where('tran_type','Dr')->get()->sum('tran_amount');		



				/* Bank Total Closing balance */
				$totBankBalLast = $bnkBal + $data['cheque_in_hand'] - ($chqExpanses);

				$data['totBankBalLast'] = $totBankBalLast;
			//pd($data['s4_total']);

				return $data;
			}

			public function getAnnexuref2PartA() {
			//die('abcd');
				$data = $this->Annexuref2PartAData();
				$data['layout_title'] = 'PART - A';
				$data['pdf_content'] = 'party_part_A';
				$data['pdf_link'] = url()->current().'-pdf';
				$data['page_title'] = 'Part A';
				$data['icon_header'] = 'icon_b expstatements_b';
				return view('party.party_schedule_layout',$data);
			}

			public function getAnnexuref2PartAPdf(Request $request) {
				$data = $this->Annexuref2PartAData();
				$pdf = PDF::loadView('party.pdf.party_part_A', $data);
				return $pdf->download('party_part_A.pdf');
			}

			public function Annexuref2PartBData($state_id = '') {
				$data['candidate_details'] = getMyDetails('');

				$data['states'] = getUserStates();	
				$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
				$data['state_name'] = getStateNameById($data['selected_id']);

				$user_id = $data['candidate_details']->id;
				$election_id = $data['candidate_details']->election_id;

				$privilege_id = CRUDBooster::myPrivilegeId();
				$state_names = '';
				$data['applicable_flag'] = 1;
				if ($privilege_id == 4) {
					$data['applicable_flag'] = 0;
					return $data;
				}

				$total_cash_in_hand  = DB::table('user_cash_details')->where('election_id',$election_id)->where('user_id',$user_id)->where('status',1);
				$total_bank_details = DB::table('user_bank_details')->where('user_id',$user_id)->where('election_id',$election_id)->where('status',1)->orderBy('is_default','desc');
				$total_gross_cash_in_hand  = PartyTransactionRegister::where('inkind',0)->whereIn('tran_method',['cash','Cash'])->where('tran_type','Cr')->filterPartyTransactionData();
				$total_cheque_in_hand  = PartyTransactionRegister::where('inkind',0)->whereNotIn('tran_method',['cash','Cash'])->where('tran_type','Cr')->filterPartyTransactionData();
				$total_in_kind  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData();
				$total_tran_cash = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['cash','Cash'])->where('inkind',0)->where('given_to','P');
				$total_tran_cheque = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind',0)->where('given_to','P');
				$total_s12_os = PartySchedule12::filterOnlyPartyTransactionData();
				$total_s13_os = PartySchedule13::filterOnlyPartyTransactionData();
				$total_s14_os = PartySchedule14::filterOnlyPartyTransactionData();
				$total_s15_os = PartySchedule15::filterOnlyPartyTransactionData();
				$total_s16_os = PartySchedule16::filterOnlyPartyTransactionData();
				$total_s17_os = PartySchedule17::filterOnlyPartyTransactionData();

				$total_s12_total = PartySchedule12::filterOnlyPartyTransactionData();
				$total_s13_total = PartySchedule13::filterOnlyPartyTransactionData();
				$total_s14_total = PartySchedule14::filterOnlyPartyTransactionData();
				$total_s15_total = PartySchedule15::filterOnlyPartyTransactionData();
				$total_s16_total = PartySchedule16::filterOnlyPartyTransactionData();
				$total_s17_total = PartySchedule17::filterOnlyPartyTransactionData();

				$total_s18_total = PartySchedule18::filterOnlyPartyTransactionData();
				$total_s19_total = PartySchedule19::filterOnlyPartyTransactionData();
				$total_s20_total = PartySchedule20::filterOnlyPartyTransactionData();
				$total_s21_total = PartySchedule21::filterOnlyPartyTransactionData();
				$total_s22_total = PartySchedule22::filterOnlyPartyTransactionData();

				$total_lump_sum_data = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->orderBy('tran_date','asc');

				$total_cashExp12to17 = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['cash','Cash'])->where('inkind',0)->where('given_to','P');
				$total_cashExp18 = PartySchedule18::filterOnlyPartyTransactionData()->whereIn('cash',['cash','Cash']);
				$total_cashExp19 = PartySchedule19::filterOnlyPartyTransactionData();
				$total_cashExp20 = PartySchedule20::filterOnlyPartyTransactionData();
				$total_cashExp21 = PartySchedule21::filterOnlyPartyTransactionData();
				$total_cashExp22 = PartySchedule22::filterOnlyPartyTransactionData();
				$total_cashExpLs = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->whereIn('tran_method',['cash','Cash']);

				$total_nonCashExp12to17 = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind',0)->where('given_to','P');

				$total_nonCashExp18 = PartySchedule18::filterOnlyPartyTransactionData()->whereNotIn('cash',['cash','Cash']);
				$total_nonCashExpLs = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->whereNotIn('tran_method',['cash','Cash']);
				$total_nonCashExp = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind',0)->where('tran_type','Dr');

				/* CHK and Implement State Search */
				if($data['selected_id']){
					$state_ids = [$data['selected_id']];
				//pd($state_ids);
					$total_cash_in_hand = $total_cash_in_hand->where('state_id' , $state_ids);
					$total_bank_details = $total_bank_details->whereIn('state_id' , [0, $state_ids]);
					$total_gross_cash_in_hand = $total_gross_cash_in_hand->where('state_id' , $state_ids);
					$total_cheque_in_hand = $total_cheque_in_hand->where('state_id' , $state_ids);
					$total_in_kind = $total_in_kind->where('state_id' , $state_ids);
					$total_tran_cash = $total_tran_cash->where('state_id' , $state_ids);
					$total_tran_cheque = $total_tran_cheque->where('state_id' , $state_ids);

					$total_s12_os = $total_s12_os->where('state_id' , $state_ids);
					$total_s13_os = $total_s13_os->where('state_id' , $state_ids);
					$total_s14_os = $total_s14_os->where('state_id' , $state_ids);
					$total_s15_os = $total_s15_os->where('state_id' , $state_ids);
					$total_s16_os = $total_s16_os->where('state_id' , $state_ids);
					$total_s17_os = $total_s17_os->where('state_id' , $state_ids);

					$total_s12_total = $total_s12_total->where('state_id' , $state_ids);
					$total_s13_total = $total_s13_total->where('state_id' , $state_ids);
					$total_s14_total = $total_s14_total->where('state_id' , $state_ids);
					$total_s15_total = $total_s15_total->where('state_id' , $state_ids);
					$total_s16_total = $total_s16_total->where('state_id' , $state_ids);
					$total_s17_total = $total_s17_total->where('state_id' , $state_ids);

					$total_s18_total = $total_s18_total->where('state_id' , $state_ids);
					$total_s19_total = $total_s19_total->where('state_id' , $state_ids);
					$total_s20_total = $total_s20_total->where('state_id' , $state_ids);
					$total_s21_total = $total_s21_total->where('state_id' , $state_ids);
					$total_s22_total = $total_s22_total->where('state_id' , $state_ids);

					$total_lump_sum_data = $total_lump_sum_data->where('state_id' , $state_ids);

					$total_cashExp12to17 = $total_cashExp12to17->where('state_id' , $state_ids);
					$total_cashExp18 = $total_cashExp18->where('state_id' , $state_ids);
					$total_cashExp19 = $total_cashExp19->where('state_id' , $state_ids);
					$total_cashExp20 = $total_cashExp20->where('state_id' , $state_ids);
					$total_cashExp21 = $total_cashExp21->where('state_id' , $state_ids);
					$total_cashExp22 = $total_cashExp22->where('state_id' , $state_ids);
					$total_cashExpLs = $total_cashExpLs->where('state_id' , $state_ids);

					$total_nonCashExp12to17 = $total_nonCashExp12to17->where('state_id' , $state_ids);
					$total_nonCashExp18 = $total_nonCashExp18->where('state_id' , $state_ids);
					$total_nonCashExpLs = $total_nonCashExpLs->where('state_id' , $state_ids);
					$total_nonCashExp = $total_nonCashExp->where('state_id' , $state_ids);
				}
				/* .CHK and Implement State Search */

				$data['cash_in_hand']  = $total_cash_in_hand->get()->sum('balance');
				$data['bank_details'] = $total_bank_details->get(['bank_name','branch_name','balance','closing_balance']);
				$data['gross_cash_in_hand']  = $total_gross_cash_in_hand->get()->sum('tran_amount');
				$data['cheque_in_hand']  = $total_cheque_in_hand->get()->sum('tran_amount');
				$data['in_kind']  = $total_in_kind->get(['tran_amount','tran_description']);
				$data['tran_cash'] = $total_tran_cash->get()->sum('tran_amount');
				$data['tran_cheque'] = $total_tran_cheque->get()->sum('tran_amount');

				/* OUTSTANDING Party Propa */
				$s12_os = $total_s12_os->get()->sum('outstanding_amount');
				$s13_os = $total_s13_os->get()->sum('outstanding_amount');
				$s14_os = $total_s14_os->get()->sum('outstanding_amount');
				$s15_os = $total_s15_os->get()->sum('outstanding_amount');
				$s16_os = $total_s16_os->get()->sum('outstanding_amount');
				$s17_os = $total_s17_os->get()->sum('outstanding_amount');

				$outStandingsPP = $s12_os + $s13_os + $s14_os + $s15_os + $s16_os + $s17_os;
				$data['outStandingsPP'] = $outStandingsPP;


				$data['s12_total'] = $total_s12_total->get()->sum('total_amount');
				$data['s13_total'] = $total_s13_total->get()->sum('total_amount');
				$data['s14_total'] = $total_s14_total->get()->sum('total_amount');
				$data['s15_total'] = $total_s15_total->get()->sum('total_amount');
				$data['s16_total'] = $total_s16_total->get()->sum('total_amount');
				$data['s17_total'] = $total_s17_total->get()->sum('total_amount');

				$data['s18_total'] = $total_s18_total->sum('amount_cash');
				$data['s19_total'] = $total_s19_total->sum('amount_paid');
				$data['s20_total'] = $total_s20_total->sum('amount_paid');
				$data['s21_total'] = $total_s21_total->sum('amount_paid');
				$data['s22_total'] = $total_s22_total->sum('amount_paid');

				$data['lump_sum_data'] = $total_lump_sum_data->get();

				$cashExp12to17 = $total_cashExp12to17->get()->sum('tran_amount');
				$cashExp18 	   = $total_cashExp18->sum('amount_cash');
				$cashExp19 	   = $total_cashExp19->sum('amount_paid');
				$cashExp20 	   = $total_cashExp20->sum('amount_paid');
				$cashExp21 	   = $total_cashExp21->sum('amount_paid');
				$cashExp22 	   = $total_cashExp22->sum('amount_paid');
				$cashExpLs 	   = $total_cashExpLs->get()->sum('tran_amount');

				$cashBalLast =  ($data['cash_in_hand'] + $data['gross_cash_in_hand']) - ($cashExp12to17 + $cashExp18 + $cashExp19 + $cashExp20 + $cashExp21 + $cashExp22 + $cashExpLs);

				$data['cashBalLast'] = $cashBalLast;

				$bkBal = 0;
				if(sizeof($data['bank_details'])>0){
					foreach($data['bank_details'] as $Val){
						$bkBal = $bkBal+$Val->balance;
					}  
				}


				$nonCashExp12to17 = $total_nonCashExp12to17->get()->sum('tran_amount');
				$nonCashExp18 = $total_nonCashExp18->get()->sum('amount_cash');
				$nonCashExpLs = $total_nonCashExpLs->get()->sum('tran_amount');
				$nonCashExp = $total_nonCashExp->get()->sum('tran_amount');
				
				$nonCashBalLast = ( $bkBal + $data['cheque_in_hand'] ) - ($nonCashExp);
				$data['nonCashBalLast'] = $nonCashBalLast;

				return $data;
			}

			public function getAnnexuref2PartB(Request $request) {
			//die('abcd');
				$data = $this->Annexuref2PartBData($request->state_id);
				$data['layout_title'] = 'PART - B';
				$data['pdf_content'] = 'party_part_B';
				$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
				$data['page_title'] = 'Part B';
				$data['icon_header'] = 'icon_b expstatements_b';
				return view('party.party_schedule_layout',$data);
			}

			public function getAnnexuref2PartBPdf(Request $request) {
				$data = $this->Annexuref2PartBData($request->state_id);
				$pdf = PDF::loadView('party.pdf.party_part_B', $data);
				return $pdf->download('party_part_B.pdf');
			}

			public function Annexuref2PartCData() { 
				$data['candidate_details'] = getMyDetails('');
				$data['poll_dates'] = implode(", ",pollDates());
				$privilege_id = CRUDBooster::myPrivilegeId();
				$user_id = $data['candidate_details']->id;
				$election_id = $data['candidate_details']->election_id;

				$data['ExpOutStandBal'] = 0;

				$state_names = '';
				if ($privilege_id == 4) {
					$state_names = $data['candidate_details']->state_name;
				} else if ($privilege_id == 5) {

					$states_array = UserStates::where('user_id',$data['candidate_details']->id)->pluck('state_name')->toArray();
					$state_names = !empty($states_array) ? implode(",",$states_array) : '';
				}
				$data['state_names'] = $state_names;
			//$data['cash_in_hand']  = PartyTransactionRegister::where('inkind',0)->where('tran_method','cash')->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');


				if ($privilege_id == 4) {
					/* Cash opening Balance */
					$data['total_51ai'] = $data['candidate_details']->party_cash_in_hand;

					/* Opening Bank Balance */
					$data['bank_details'] = DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get(['bank_name','branch_name','balance']);
					$bnkBal = 0;
					if(sizeof($data['bank_details'])>0){
						foreach($data['bank_details'] as $Val){
							$bnkBal += $Val->balance;
						}  
					}
					$data['total_51aii'] = $bnkBal;
					/* .Opening Bank Balance */

					/* Cash Receipt From All Source */
					$data['total_52ai']  = PartyTransactionRegister::where('inkind',0)->where('tran_method','cash')->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					/* NonCash Receipt From all source */
					$data['total_52aii']  = PartyTransactionRegister::where('inkind',0)->where('tran_method','!=','cash')->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					/* INkind Income */
					$data['total_52aiii']  = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					/* Expenses for Party Propaganda */
					$tranArr1 = PartySchedule1::filterOnlyPartyTransactionData()->with(['party_transaction_register' => function ($query) {
						$query->where('tran_type','Dr');
						      	//$query->where('tran_type','Dr');
					}])->get()->toArray();

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
					$data['total_53ai'] = $tran_cash;
					$data['total_53aii'] = $tran_cheque;
					$data['total_53aiii'] = $outstanding_amount;
					/* .Expenses for Party Propaganda */

					/* Schedule wise expense */
					$data['total_54ai'] = PartySchedule7::filterOnlyPartyTransactionData()->get()->sum('total_amount');

					$data['total_54aii_inkind'] = PartyTransactionRegister::filterPartyTransactionData()->where('given_to','C')->where('tagged_parts','A54aii')->sum('tran_amount');

					$data['total_54aiii'] = PartyTransactionRegister::filterPartyTransactionData()->where('given_to','C')->where('tagged_parts','A54aiii')->sum('tran_amount');

					$data['total_54aiv'] = PartyTransactionRegister::filterPartyTransactionData()->where('given_to','C')->where('tagged_parts','A54aiv')->sum('tran_amount');

					$data['total_54av'] = PartyTransactionRegister::filterPartyTransactionData()->where('given_to','C')->where('tagged_parts','A54av')->sum('tran_amount');


					$cashExpanseLS = PartyTransactionRegister::filterPartyTransactionData()->where('tran_method','Cash')->where('tran_type','Dr')->where('tagged_parts','A55')->get()->sum('tran_amount');


					$cashExpanse = PartyTransactionRegister::filterPartyTransactionData()->whereIn('tran_method',['cash','Cash'])->where('tran_type','Dr')->get()->sum('tran_amount');


					$totCashInhandLast = $data['total_51ai'] + $data['total_52ai'] - ( $cashExpanse );

					$data['total_56ai'] = $totCashInhandLast;


					$chqExpanse = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('tran_type','Dr')->get()->sum('tran_amount');

					$chqExpanseLS = PartyTransactionRegister::filterPartyTransactionData()->where('tran_method','!=','Cash')->where('tran_type','Dr')->where('tagged_parts','A55')->get()->sum('tran_amount');


					$data['total_56aii'] = $bnkBal + $data['total_52aii'] - $chqExpanse;
				}else{
					$data['total_51ai'] = $data['total_51aii'] = $data['total_52ai'] = $data['total_52aii'] = $data['total_52aiii'] = $data['total_53ai'] = $data['total_53aii'] = $data['total_53aiii'] = $data['total_54ai'] = $data['total_54aii_inkind'] = $data['total_54aiii'] = $data['total_54aiv'] = $data['total_54av'] = $data['total_56ai'] = $data['total_56aii'] =0;

				}

				if ($privilege_id == 5) {
					$data['total_61ai'] = DB::table('user_cash_details')->where('election_id',$election_id)->where('user_id',$user_id)->where('status',1)->get()->sum('balance');

				//pd($data['total_61ai']);

					$data['bank_details'] = DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get(['bank_name','branch_name','balance']);
					$bnkBal = 0;
					if(sizeof($data['bank_details'])>0){
						foreach($data['bank_details'] as $Val){                     
							$bnkBal += $Val->balance;
						}  
					}		
					$data['total_61aii'] = $bnkBal;	

					$data['total_62ai'] = PartyTransactionRegister::where('inkind',0)->whereIn('tran_method',['cash','Cash'])->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					$data['total_62aii'] = PartyTransactionRegister::where('inkind',0)->whereNotIn('tran_method',['cash','Cash'])->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					$data['total_62aiii'] = PartyTransactionRegister::where('inkind',1)->where('tran_type','Cr')->filterPartyTransactionData()->get()->sum('tran_amount');

					$data['total_63ai'] = PartyTransactionRegister::filterPartyTransactionData()->where('given_to','P')->where('tran_type','Dr')->whereIn('tran_method',['cash','Cash'])->sum('tran_amount');

					$data['total_63aii'] = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('given_to','P')->where('tran_type','Dr')->sum('tran_amount');

					$outStandings = PartySchedule12::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule13::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule14::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule15::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule16::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule17::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule19::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule20::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule21::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule22::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
					$data['total_63aiii'] = $outStandings;

				$data['total_64ai'] = PartySchedule18::filterOnlyPartyTransactionData()->sum('amount_cash');//->value(DB::raw("SUM(amount_cash + amount_noncash)"));

				$data['total_64aii_inkind'] = PartySchedule19::filterOnlyPartyTransactionData()->sum('amount_paid');//->value(DB::raw("SUM(amount_paid + amount_outstanding)"));

				$data['total_64aiii'] = PartySchedule20::filterOnlyPartyTransactionData()->sum('amount_paid');

				$data['total_64aiv'] = PartySchedule21::filterOnlyPartyTransactionData()->sum('amount_paid');

				$data['total_64av'] = PartySchedule22::filterOnlyPartyTransactionData()->sum('amount_paid');

				$data['total_65'] = 0;//PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->get()->sum('tran_amount');






				$cashExp12to17 = PartyTransactionRegister::filterPartyTransactionData()->where('tran_method','cash')->where('inkind',0)->where('given_to','P')->get()->sum('tran_amount');
				$cashExp18 = PartySchedule18::filterOnlyPartyTransactionData()->whereIn('cash',['cash','Cash'])->get()->sum('amount_cash');
				$cashExp19 = PartySchedule19::filterOnlyPartyTransactionData()->sum('amount_paid');//->value(DB::raw("SUM(amount_paid + amount_outstanding)"));
				$cashExp20 = PartySchedule20::filterOnlyPartyTransactionData()->sum('amount_paid');
				$cashExp21 = PartySchedule21::filterOnlyPartyTransactionData()->sum('amount_paid');
				$cashExp22 = PartySchedule22::filterOnlyPartyTransactionData()->sum('amount_paid');
				$cashExpLs = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->whereIn('tran_method',['cash','Cash'])->get()->sum('tran_amount');

				//$cashBalLast = ( $data['candidate_details']->party_cash_in_hand + $data['total_62ai'] ) - ($cashExp12to17 + $cashExp18 + $cashExp19 + $cashExp20 + $cashExp21 + $cashExp22 + $cashExpLs);
				$cashBalLast = ( $data['total_51ai'] + $data['total_61ai'] + $data['total_52ai'] + $data['total_62ai'] ) - ($cashExp12to17 + $cashExp18 + $cashExp19 + $cashExp20 + $cashExp21 + $cashExp22 + $cashExpLs);
				$data['total_66ai'] = $cashBalLast;


				$bkBal = 0;
				if(sizeof($data['bank_details'])>0){
					foreach($data['bank_details'] as $Val){
						$bkBal = $bkBal+$Val->balance;
					}  
				}

				// $nonCashExp12to17 = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind','0')->where('given_to','P')->get()->sum('tran_amount');

				// $nonCashExp18 = PartySchedule18::filterOnlyPartyTransactionData()->whereNotIn('cash',['cash','Cash'])->get()->sum('amount_cash');
				// $nonCashExpLs = PartyTransactionRegister::filterPartyTransactionData()->where('tagged_parts','B65')->whereNotIn('tran_method',['cash','Cash'])->get()->sum('tran_amount');
				// $nonCashEx12to17 = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind',0)->get()->sum('tran_amount');

				$nonCashExpAll = PartyTransactionRegister::filterPartyTransactionData()->whereNotIn('tran_method',['cash','Cash'])->where('inkind','0')->where('tran_type','Dr')->get()->sum('tran_amount');
				
				//echo $data['total_51aii'] + $data['total_61aii'] + $data['total_52aii'] + $data['total_62aii'];
				$nonCashBalLast = ( $data['total_51aii'] + $data['total_61aii'] + $data['total_52aii'] + $data['total_62aii'] ) - ($nonCashExpAll);
				$data['total_66aii'] = $nonCashBalLast;

				//pd($nonCashExp12to17);


				//$ExpOutStandBal = PartySchedule12::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule13::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule14::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule15::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule16::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount') + PartySchedule17::filterOnlyPartyTransactionData()->get()->sum('outstanding_amount');
				$election_details   =   getElectionDates();
				$s12 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule12 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				$s13 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule13 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				$s14 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule14 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				$s15 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule15 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				$s16 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule16 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				$s17 = DB::select("SELECT SUM(s.outstanding_amount) as amount, p.user_id as userid FROM party_schedule17 s LEFT JOIN party_transaction_register p ON s.party_transaction_register = p.id WHERE p.tran_date BETWEEN '".$election_details->date_of_announcement."' AND '".$election_details->date_of_completion."' AND p.user_id = ".$user_id." AND p.election_id = ".$data['candidate_details']->election_id." GROUP BY p.user_id");

				//pd($s12[0]->amount);
				$ExpOutStandBal = $s12[0]->amount + $s13[0]->amount + $s14[0]->amount + $s15[0]->amount + $s16[0]->amount+ $s17[0]->amount;
				$data['ExpOutStandBal'] = 0;//$ExpOutStandBal;



			}else{

				$data['total_61ai'] = $data['total_61aii'] = $data['total_62ai'] = $data['total_62aii'] = $data['total_62aiii'] = $data['total_63ai'] = $data['total_63aii'] = $data['total_63aiii'] = $data['total_64ai'] = $data['total_64aii_inkind'] = $data['total_64aiii'] = $data['total_64aiv'] = $data['total_64av'] = $data['total_66ai'] = $data['total_66aii'] = $data['total_65'] = 0;

			}
			//pd($data);
			return $data;
		}

		public function getAnnexuref2PartC() {
			$data = $this->Annexuref2PartCData();
			$data['layout_title'] = 'PART - C';
			$data['pdf_content'] = 'party_part_C';
			$data['pdf_link'] = url()->current().'-pdf';
			$data['icon_header'] = 'icon_b expstatements_b';
			$data['page_title'] = 'Part C';
			return view('party.party_schedule_layout',$data);
		}

		public function getAnnexuref2PartCPdf(Request $request) {
			$data = $this->Annexuref2PartCData();
			$pdf = PDF::loadView('party.pdf.party_part_C', $data);
			return $pdf->download('party_part_C.pdf');
		}

		public function Annexuref2PartDData() {
			$data['candidate_details'] = getMyDetails('');
			return $data;
		}

		public function getAnnexuref2PartD() {
			//die('abcd');
			$data = $this->Annexuref2PartAData();
			$data['layout_title'] = 'PART - D';
			$data['pdf_content'] = 'party_part_D';
			$data['pdf_link'] = url()->current().'-pdf';
			$data['icon_header'] = 'icon_b expstatements_b';
			$data['page_title'] = 'Part D';
			return view('party.party_schedule_layout',$data);
		}

		public function getAnnexuref2PartDPdf(Request $request) {
			$data = $this->Annexuref2PartAData();
			$pdf = PDF::loadView('party.pdf.party_part_D', $data);
			return $pdf->download('party_part_D.pdf');
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
			
			return redirect()->back()->with(['message'=> "Success. Record deleted successfully",'message_type'=>'success']);
		}
		public function getAjaxBankList($parent_state_id)
		{
			getBankList($parent_state_id);
		}
	}