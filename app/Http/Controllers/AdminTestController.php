<?php namespace App\Http\Controllers;

	use Session;
	//use Request;
	use DB;
	use CRUDBooster;
	use Illuminate\Http\Request;
	//use Request;
	use Helper;
	use Illuminate\Support\Facades\Validator;
	use Redirect;
	use PDF;
	use Carbon\Carbon;
	use App\CashRegister;
	use App\BankRegister;
	use App\ExpenditureLimit;
    
	class AdminTestController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
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
			$this->table = "test";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"User Id","name"=>"user_id","join"=>"cms_users,id"];
			$this->col[] = ["label"=>"Message","name"=>"message"];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,id'];
			$this->form[] = ['label'=>'Message','name'=>'message','type'=>'textarea','validation'=>'required|string|min:10|myFunction','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|string|min:0|email|unique:test','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"User Id","name"=>"user_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"user,id"];
			//$this->form[] = ["label"=>"Message","name"=>"message","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|integer|min:0|email|unique:test","placeholder"=>"Please enter a valid email address"];
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
	        //$this->script_js = NULL;
	        $this->script_js = null;

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


		public function myFunction(){
			return view('myfund');
		}

		public function myFunctionSave(Request $request){
			//echo "hello"; die;
			echo $request->input('amount');
			//echo "<pre>"; print_r($request);
			//dd($request);
		}

		public function getTestHelper(){
			//echo "string";
			//replaceVarWithVal('aaaa');
			$data['script_files'] = "js_files/testjs";
			return view('test',$data);
		}


		// function loading form for Goods/ Service recieved in Kind
		public function getServiceInKindList(Request $request){
			if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
   			$this->title_field = "id";
   			$userdetails = getMyDetails('');
			//Create your own query 
			$data = [];
			$data['page_title'] = 'All Receipts in Kind';
			$data['icon_header'] = 'icon_b allreceipts_b';
			$data['action_url'] = $request->url();
			$data['ignore_chks'] = true;

			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/test/service-in-kind';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			//echo CRUDBooster::isCreate();
			$resultObj = DB::table('bank_register')->where('inkind',1)
			                                       ->where('user_id',$userdetails->id)
								                   ->where('election_id',$userdetails->election_id);
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['icon_header'] = 'icon_b allreceipts_b';
			//print_r($data['result']);
			return view('inkind-list',$data);
		}

		// function loading form for Goods/ Service recieved in Kind
		public function getServiceInKind(){
			$data = array();
			$data['page_title'] = 'Deposit Voucher';
			$data['icon_header'] = 'icon_b allreceipts_b';
			$data['script_files'] = "js_files/inkind";
			return view('inkind',$data);
		}

		// function loading form for Goods/ Service recieved in Kind SAVE
		public function postInkindSave(Request $request){
			//echo "<pre>"; 
			//print_r($request->all());
			/* START VALIDATION */
			$validationFields = [
					'provider_type'=>'required',
					'date'=>'required|date',
					'description' => 'required',
					'quantity'=> 'required|integer',
					'rate'=> 'required|integer',
					'amount'=>'required'		
				];
			if(strtolower($request->input('provider_type')) != 'party'){
				$validationFields['provider_type'] = 'required';
				$validationFields['provider_address'] = 'required';
			}

			$validator = Validator::make($request->all(),			
				$validationFields
			);
			
			if ($validator->fails()) 
			{
				$message = $validator->errors()->all();
				return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
			}
			/* END VALIDATION */


			$user_id = CRUDBooster::myId();
			$mydetails = getMyDetails($user_id);
			if(!empty($mydetails)) {
				$rcvrName =  '';//$mydetails->name;
				$rcvrAddress =  '';//$mydetails->address;
			} else {
				$rcvrName = "";
				$rcvrAddress = "";
			}
			//echo CRUDBooster::myId();
			if(strtolower($request->input('provider_type')) == 'party'){
				$tran_amount_brkup_pt = $request->input('amount');
				$tran_amount_brkup_ot = 0.00;
				$provider_name = $mydetails->party_name_frm_details;
				$provider_address = $mydetails->party_address_frm_details?$mydetails->party_address_frm_details:$mydetails->party_address;

			}else if(strtolower($request->input('provider_type')) == 'other'){
				$tran_amount_brkup_pt = 0.00;
				$tran_amount_brkup_ot = $request->input('amount');
				$provider_name = $request->input('provider_name');
				$provider_address = $request->input('provider_address');
			}else{
				$tran_amount_brkup_pt = 0.00;
				$tran_amount_brkup_ot = 0.00;
				$provider_name = $request->input('provider_name');
				$provider_address = $request->input('provider_address');
			}
			$inputData = array();
			$inputData['user_id']= $user_id;
			$inputData['election_id']= 1;
			$inputData['cash_register_id']= 0;
			$inputData['trans_parent_id']= 0;
			$inputData['tran_date']= $request->input('date');
			$inputData['tran_amount']= $request->input('amount');
			$inputData['tran_source']= $request->input('provider_type');
			$inputData['tran_source_name']= $provider_name;
			$inputData['tran_source_address']= $provider_address;
			$inputData['receipt_no']= $request->input('bill_no');
			$inputData['receipt_date']= $request->input('bill_date');
			$inputData['tran_purpose']= "Service/Goods in Kind";
			$inputData['tran_purpose_other']= "";
			$inputData['deposited_same_day']= "Y";
			$inputData['tran_method']= "Kind";
			$inputData['bank_deposited']= "N";
			$inputData['is_own_bank']= "N";
			$inputData['tran_source_bank_name']= "";
			$inputData['tran_source_bank_branch']= "";
			$inputData['tran_remarks']= $request->input('remarks');
			$inputData['tran_type']= "Dr";
			$inputData['tran_description']= $request->input('description');
			$inputData['tran_quantity']= $request->input('quantity');
			$inputData['tran_rate']= $request->input('rate');
			$inputData['tran_receiver_id']= CRUDBooster::myId();
			$inputData['tran_receiver_name']= $rcvrName;
			$inputData['tran_receiver_address']= $rcvrAddress;
			$inputData['tag_schedule']= "";
			$inputData['bank_consolidated']= "";
			$inputData['created_at']= date('Y-m-d H:i:s');
			$inputData['tran_amount_brkup_ow']= 0.00;
			$inputData['tran_amount_brkup_pt']= $tran_amount_brkup_pt;
			$inputData['tran_amount_brkup_ot']= $tran_amount_brkup_ot;
			$inputData['balance'] = getCurrentBalance() + $request->input('amount');
			$inputData['inkind']= 1;
			//echo CRUDBooster::getSetting('email_sender');
			//print_r($mydetails); die('aaaaaaaa');
			if($insrtID = DB::table('bank_register')->insertGetId($inputData)){
				//echo "Success. Insert Id is: ".$insrtID;
				return redirect()->route('inkindList')->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);
			}else{
				return redirect()->back()->with(['message'=>"There is some error.",'message_type'=>'danger']);
			}


		}

		// function loading form for Goods/ Service recieved in Kind
		public function getServiceInKindDelete($id){
			if(DB::table('bank_register')->where('id',$id)->delete())
				return redirect()->route('inkindList')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
		}



		// function loading form for petty expense
		public function getPettyExpenses(Request $request){
			if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
   			$this->title_field = "id";
   			$userdetails = getMyDetails(''); 
			//Create your own query 
			$data = [];
			$data['page_title'] = 'Cash withdrawal from Bank for petty expenses';
			$data['icon_header'] = 'icon_b pettyexpenses_b';
			$data['action_url'] = $request->url();
			$data['ignore_chks'] = true;

			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/test/petty-expense-add';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			//echo CRUDBooster::isCreate();
			$resultObj = DB::table('bank_register')
								->where('is_petty',1)
								->where('tran_type','Dr')
								->where('user_id',$userdetails->id)
								->where('election_id',$userdetails->election_id);
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			

			if(!empty($request->srch_key)){
					$param = urldecode(str_replace(",","",$request->srch_key));
					$resultObj = $resultObj->where(function ($query) use ($param) {
                		$query->where('tran_description','like','%'.$param.'%')
                      		  ->orWhere('receipt_no','like','%'.$param.'%')
                      		  ->orWhere('tran_amount','like','%'.$param.'%');
            		});
				}

			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));	
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';	

			//print_r($data['result']);
			return view('petty-expenses-list',$data);
		}

		// function loading form for Goods/ Service recieved in Kind
		public function getPettyExpenseAdd(){
			$data = [];
			$data['page_title'] = 'Withdrawal Voucher';
			$data['icon_header'] = 'icon_b pettyexpenses_b';
			$data['script_files'] = "js_files/pettyexpenses";
			return view('petty-expenses-add',$data);
		}

		// function loading form for Goods/ Service recieved in Kind SAVE
		public function postPettyExpenseSave(Request $request){
			//echo "<pre>"; 
			//print_r($request->all());
			/* START VALIDATION */
			$validationFields = [];
			$validationFields = [
					'date'=>'required|date',
					'cheque' => 'required',
					'amount'=>'required|integer|max:10000',
					'kept_type' => 'required'		
				];	
			if(strtolower($request->input('kept_type')) == 'Y'){
				$validationFields['person'] = 'required';
				$validationFields['kept_amount'] = 'required';
			}	

			$validator = Validator::make($request->all(),			
				$validationFields
			);
			
			if ($validator->fails()) 
			{
				$message = $validator->errors()->all();
				return redirect()->back()->with(['message'=>implode(',<br> ',$message),'message_type'=>'danger']);
			}
			/* END VALIDATION */


			$user_id = CRUDBooster::myId();
			$mydetails = getMyDetails($user_id);
			if(!empty($mydetails)) {
				$rcvrName =  $mydetails->name;
				$rcvrAddress =  $mydetails->address;
			} else {
				$rcvrName = "";
				$rcvrAddress = "";
			}
			//echo CRUDBooster::myId();
			
			$inputData = array();
			$inputData['user_id']= $user_id;
			$inputData['election_id']= $mydetails->election_id;
			$inputData['cash_register_id']= 0;
			$inputData['trans_parent_id']= 0;
			$inputData['tran_date']= $request->input('date');
			$inputData['tran_amount']= $request->input('amount');
			$inputData['tran_source']= 'Self';
			$inputData['tran_source_name']= $mydetails->name;
			$inputData['tran_source_address']= $mydetails->address;
			$inputData['receipt_no']= $request->input('cheque');
			$inputData['tran_purpose']= "Withdrawal for petty expenses";
			$inputData['tran_purpose_other']= "";
			$inputData['deposited_same_day']= "N";
			$inputData['tran_method']= "Cash";
			$inputData['bank_deposited']= "N";
			$inputData['is_own_bank']= "Y";
			$inputData['tran_source_bank_name']= $mydetails->bankname;
			$inputData['tran_source_bank_branch']= $mydetails->branch_address;
			$inputData['tran_remarks']= "Withdrawal for petty expenses";
			$inputData['tran_type']= "Dr";
			$inputData['tran_description']= $request->input('kept_type') == 'Y'? "KEPT||".$request->input('person')."||".$request->input('kept_amount'):"Withdrawal for petty expenses";
			$inputData['tran_quantity']= 1;
			$inputData['tran_rate']= $request->input('amount');
			$inputData['tran_receiver_id']= CRUDBooster::myId();
			$inputData['tran_receiver_name']= $mydetails->name;
			$inputData['tran_receiver_address']= $mydetails->address;
			$inputData['tag_schedule']= "";
			$inputData['bank_consolidated']= "";
			$inputData['created_at']= date('Y-m-d H:i:s');
			$inputData['tran_amount_brkup_ow']= $request->input('amount');
			$inputData['tran_amount_brkup_pt']= 0.00;
			$inputData['tran_amount_brkup_ot']= 0.00;
			$inputData['inkind']= 0;
			$inputData['is_petty']= 1;
			$inputData['balance'] = getCurrentBalance() - $request->input('amount');
			//echo CRUDBooster::getSetting('email_sender');
			//print_r($inputData); die('aaaaaaaa');
			if($insrtID = DB::table('bank_register')->insertGetId($inputData)){
				//echo "Success. Insert Id is: ".$insrtID;

				/* entry to cash register */
				$inputDataCash = array();
				$inputDataCash['user_id']= $user_id;
				$inputDataCash['election_id']= $mydetails->election_id;
				$inputDataCash['bank_register_id']= $insrtID;
				$inputDataCash['trans_parent_id']= 0;
				$inputDataCash['tran_date']= $request->input('date');
				$inputDataCash['tran_amount']= $request->input('amount');
				$inputDataCash['tran_source']= 'Self';
				$inputDataCash['tran_source_name']= $mydetails->name;
				$inputDataCash['tran_source_address']= $mydetails->address;
				$inputDataCash['receipt_no']= $request->input('cheque');
				$inputDataCash['tran_purpose']= "Withdrawal from Bank";
				$inputDataCash['tran_purpose_other']= "";
				$inputDataCash['deposited_same_day']= "N";
				$inputDataCash['tran_method']= "Cash";
				$inputDataCash['bank_deposited']= "N";
				$inputDataCash['is_own_bank']= "Y";
				$inputDataCash['tran_source_bank_name']= $mydetails->bankname;
				$inputDataCash['tran_source_bank_branch']= $mydetails->branch_address;
				$inputDataCash['tran_remarks']= "Withdrawal for petty expenses";
				$inputDataCash['tran_type']= "Cr";
				$inputDataCash['tran_description']= $request->input('kept_type') == 'Y'? "KEPT||".$request->input('person')."||".$request->input('kept_amount'):"Withdrawal for petty expenses";
				$inputDataCash['tran_quantity']= 1;
				$inputDataCash['tran_rate']= $request->input('amount');
				$inputDataCash['tran_receiver_id']= CRUDBooster::myId();
				$inputDataCash['tran_receiver_name']= $mydetails->name;
				$inputDataCash['tran_receiver_address']= $mydetails->address;
				$inputDataCash['tag_schedule']= "";
				$inputDataCash['bank_consolidated']= "Y";
				$inputDataCash['created_at']= date('Y-m-d H:i:s');
				$inputDataCash['tran_amount_brkup_ow']= $request->input('amount');
				$inputDataCash['tran_amount_brkup_pt']= 0.00;
				$inputDataCash['tran_amount_brkup_ot']= 0.00;
				$inputDataCash['inkind']= 0;
				$inputDataCash['is_petty']= 1;

				if($cashinsrtID = DB::table('cash_register')->insertGetId($inputDataCash)){
					return redirect()->route('petty-expenses')->with(['message'=> "Success. Record adder successfully",'message_type'=>'success']);
				}
			}else{
				return redirect()->back()->with(['message'=>"There is some error.",'message_type'=>'danger']);
			}


		}

		// function loading form for Goods/ Service recieved in Kind
		public function getPettyExpenseDelete($id){
			if(DB::table('bank_register')->where('id',$id)->delete()){
				if(DB::table('cash_register')->where('bank_register_id',$id)->delete()){
					return redirect()->route('petty-expenses')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
				}
				
			}
		}



		/**/
		//PARTS AND SCHEDULES
		//
		/**/	

		private function getSchedule8Data() {
			$data = [];
			$data['page_title'] = 'Schedule 8';
			$data['icon_header'] = 'icon_b expstatements_b';
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
    		$data['print_data'] = DB::select($sql);
    		return $data;
		}	

		public function getSchedule8(){
			$data = $this->getSchedule8Data();
			return view('reports.schedule_8',$data);
		}

		public function getSchedule8Pdf(){
			$data = $this->getSchedule8Data();
			$pdf = PDF::loadView('pdf.schedule_8', $data);
			return $pdf->download('schedule8.pdf');
		}

		private function getSchedule9Data() {
			$data['page_title'] = 'Schedule 9';
			$data['icon_header'] = 'icon_b expstatements_b';
			$mydetails 			=	getMyDetails('');
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
    		$data['print_data'] = DB::select($sql);
    		return $data;
		}

		public function getSchedule9(){
			$data = $this->getSchedule9Data();
			return view('reports.schedule_9',$data);
		}

		public function getSchedule9Pdf(){
			$data = $this->getSchedule9Data();			
			$pdf = PDF::loadView('pdf.schedule_9', $data);
			return $pdf->download('schedule9.pdf');
		}

		private function generateDateRange(Carbon $start_date, Carbon $end_date)
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

		private function getAnnexureE1PartAData() {
			$data['page_title'] 		= 	'Annexure E1 PartA';
			$data['icon_header'] 		= 'icon_b expstatements_b';
			$user_id					=	CRUDBooster::myId();
			$candidate_details 			= 	getMyDetails($user_id);			
			$data['candidate_details'] 	=	$candidate_details;	
			$start_date 				=	$candidate_details->nomination_date;
			$data['start_date'] 		= 	$start_date;
            $result_date   				= 	$candidate_details->result_date; 
            $dateObj 					=	Carbon::now();
            $end_date					=	Carbon::parse($result_date)->gt($dateObj) ? $dateObj->toDateString() : $result_date;
            $data['end_date'] 			=	$end_date;
            $from_date					= 	Carbon::parse($start_date);
    		$to_date					= 	Carbon::parse($end_date);
			$dates 						= 	$this->generateDateRange($from_date,$to_date);
			$data['dates']				=	$dates;
			$expenditure_data 			=	ExpenditureLimit::where(['state_id' => $candidate_details->state_id,'election_id' => $candidate_details->election_id])->first();
			$data['expenditure_limit']  =   !is_null($expenditure_data) ? formatCurrency($expenditure_data->limit) : '';
			//$sql 						= 	"SELECT * FROM bank_register WHERE bank_register.tran_type = 'Dr' AND bank_register.is_petty = 0 AND bank_register.trans_parent_id = 0 AND bank_register.user_id = ".CRUDBooster::myId()." AND (bank_register.inkind = 1 || bank_register.schedule_name != '' || bank_register.schedule_name != NULL ) ORDER BY bank_register.tran_date ASC";

			$mydetails = getMyDetails('');
			$sql = "SELECT 
					id, user_id, election_id, trans_parent_id, tran_date, tran_amount, tran_source, tran_source_name, tran_source_address, receipt_no, receipt_date,tran_purpose, tran_purpose_other, tran_method, tran_source_bank_name, tran_source_bank_branch, tran_remarks, tran_type, tran_description, tran_quantity, tran_rate, tran_receiver_id, tran_receiver_name, tran_receiver_address, tran_amount_brkup_ow, tran_amount_brkup_pt, tran_amount_brkup_ot, source_name_pt,source_name_ot,balance, inkind, is_petty, vouchar_filename, vouchar_remarks
					 FROM bank_register WHERE bank_register.tran_type = 'Dr' AND bank_register.is_petty = 0 AND bank_register.trans_parent_id = 0 AND bank_register.user_id = ".CRUDBooster::myId()." AND bank_register.cash_reg_refe != 1 AND bank_register.schedule_name IS NULL AND (bank_register.inkind = 1 || bank_register.schedule_name != '' || bank_register.schedule_name != NULL ) and bank_register.election_id=".$mydetails->election_id." and bank_register.tran_date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result."'
				    UNION 
				    SELECT 
				    id, user_id, election_id, trans_parent_id, tran_date, tran_amount, tran_source, tran_source_name, tran_source_address, receipt_no, receipt_date, tran_purpose, tran_purpose_other, tran_method, tran_source_bank_name, tran_source_bank_branch, tran_remarks, tran_type, tran_description, tran_quantity, tran_rate, tran_receiver_id, tran_receiver_name, tran_receiver_address, tran_amount_brkup_ow, tran_amount_brkup_pt, tran_amount_brkup_ot, source_name_pt,source_name_ot, balance, inkind, is_petty, vouchar_filename, vouchar_remarks
				     FROM cash_register WHERE cash_register.tran_type = 'Dr' AND cash_register.is_petty = 0 AND cash_register.trans_parent_id = 0 AND cash_register.user_id = ".CRUDBooster::myId()."  and cash_register.election_id=".$mydetails->election_id." and cash_register.tran_date BETWEEN '".$mydetails->nomination_date."' AND '".$mydetails->date_result."'";


			$data['print_data'] 		= 	DB::select($sql);
			//dd($data['print_data']);
			return $data;
		}

		public function getAnnexureE1PartA() {
			$data = $this->getAnnexureE1PartAData();
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('reports.e1_part_a',$data);
		}

		public function getAnnexureE1PartAPdf() {
			$data = $this->getAnnexureE1PartAData();
			$pdf = PDF::loadView('pdf.e1_part_a', $data);
			return $pdf->download('e1_part_a.pdf');
		}

		private function getAnnexureE1PartBData() {
			$data['page_title'] 		= 	'Annexure E1 PartB';
			$data['icon_header'] 		= 'icon_b expstatements_b';
			$candidate_details 			= 	getMyDetails(CRUDBooster::myId());
			$data['candidate_details'] 	= 	$candidate_details;
			$start_date 				=	$candidate_details->nomination_date;
			$data['start_date'] 		= 	$start_date;
            $result_date   				= 	$candidate_details->result_date; 
            $dateObj 					=	Carbon::now();
            $end_date					=	Carbon::parse($result_date)->gt($dateObj) ? $dateObj->toDateString() : $result_date;
            $data['end_date'] 			=	$end_date;
            $from_date					= 	Carbon::parse($start_date);
    		$to_date					= 	Carbon::parse($end_date);
			$dates 						= 	$this->generateDateRange($from_date,$to_date);
			$data['dates']				=	$dates;
			$data['print_data'] 		= 	CashRegister::all();
			//pd($data);
			return $data;
		}

		public function getAnnexureE1PartB() {
			$data = $this->getAnnexureE1PartBData();
			$data['icon_header'] = 'icon_b expstatements_b';			
			return view('reports.e1_part_b',$data);
		}

		public function getAnnexureE1PartBPdf() {
			$data = $this->getAnnexureE1PartBData();
			$pdf = PDF::loadView('pdf.e1_part_b', $data);
			return $pdf->download('e1_part_b.pdf');
		}


		private function getAnnexureE1PartCData() {
			$data['page_title'] = 'Annexure E1 PartC';
			$data['icon_header'] = 'icon_b expstatements_b';
			$candidate_details = getMyDetails(CRUDBooster::myId());
			$data['candidate_details'] = $candidate_details;
			$start_date 				=	$candidate_details->nomination_date;
			$data['start_date'] 		= 	$start_date;
            $result_date   				= 	$candidate_details->result_date; 
            $dateObj 					=	Carbon::now();
            $end_date					=	Carbon::parse($result_date)->gt($dateObj) ? $dateObj->toDateString() : $result_date;
            $data['end_date'] 			=	$end_date;
            $from_date					= 	Carbon::parse($start_date);
    		$to_date					= 	Carbon::parse($end_date);
			$dates 						= 	$this->generateDateRange($from_date,$to_date);
			$data['dates']				=	$dates;
			$data['print_data'] = BankRegister::where('cash_reg_refe', '!= 1')->get();
			return $data;
		}

		public function getAnnexureE1PartC() {

			$data = $this->getAnnexureE1PartCData();
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('reports.e1_part_c',$data);
		}

		public function getAnnexureE1PartCPdf() {
			$data = $this->getAnnexureE1PartCData();
			$pdf = PDF::loadView('pdf.e1_part_c', $data);
			return $pdf->download('e1_part_c.pdf');
		}

		public function getAnnexureE2Part1() {
			$data = [];
			$data['page_title'] = 'Annexure E2 Part1';

			return view('reports.e2_part_1',$data);
		}

		public function getAnnexureE2Part4() {
			$data = [];
			$data['page_title'] = 'Annexure E2 Part4';

			return view('reports.e2_part_4',$data);
		}

		public function getAnnexureE2AcknowledgementForm() {
			$data = [];
			$data['page_title'] = 'Annexure E2 Acknowledgement Form';

			return view('reports.e2_acknowledgement_form',$data);
		}

		public function getTestPdf() {
			$data = [];
			$pdf = PDF::loadView('pdf.test_pdf', $data);
			return $pdf->download('test_pdf.pdf');
		}


}