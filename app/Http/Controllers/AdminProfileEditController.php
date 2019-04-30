<?php namespace App\Http\Controllers;

use Session;
	//use Request;
use DB;
use CRUDBooster;
use Helper;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AdminProfileEditController extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->title_field = "agent_name";
		$this->limit = "20";
		$this->orderby = "id,desc";
		$this->global_privilege = true;
		$this->button_table_action = true;
		$this->button_bulk_action = false;
		$this->button_action_style = "button_icon";
		$this->button_add = false;
		$this->button_edit = false;
		$this->button_delete = false;
		$this->button_detail = true;
		$this->button_show = false;
		$this->button_filter = true;
		$this->button_import = false;
		$this->button_export = false;
		$this->table = "user_details";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

		$user_id = CRUDBooster::myId();
		$mydetails = getMyDetails($user_id);

			//echo "<pre>";print_r($mydetails); die;

			# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = [];
			//$this->col[] = ["label"=>"User Id","name"=>"user_id","join"=>"cms_users,id"];
		$this->col[] = ["label"=>"Agent Name","name"=>"agent_name"];
		$this->col[] = ["label"=>"A/c No","name"=>"acc_no"];
		$this->col[] = ["label"=>"Bank Name","name"=>"bank_name"];
		$this->col[] = ["label"=>"Party","name"=>"party_id","join"=>"party_masters,party_name"];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
		$this->form = [];

		if($mydetails->election_id){
			$this->form[] = ['label'=>'Name of Election','validation'=>'required','type'=>'text','name'=>'election_idFake','width'=>'col-sm-6','value'=> $mydetails->election_name,'disabled' => true];
		}else{
			$this->form[] = ['label'=>'Name of Election','name'=>'election_id','validation'=>'required|integer|min:0','width'=>'col-sm-6','datatable'=>'election_master,name','type'=>'select2'];
		}

		/**/
		if(CRUDBooster::myPrivilegeId() == 4 && $mydetails->privilege_modified != 1){
			$this->form[] = ['label'=>'Type of Unit','name'=>'unit_type','type'=>'select2','dataenum'=>'4|Party Central Headquarter;5|Party State Unit','validation'=>'required','width'=>'col-sm-6', 'value' => CRUDBooster::myPrivilegeId()];
		} else if( (CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5) &&$mydetails->privilege_modified == 1){
			$this->form[] = ['label'=>'Type of Unit','name'=>'unit_type','type'=>'text','width'=>'col-sm-6', 'readonly' => 'readonly','value' => CRUDBooster::myPrivilegeName()];
		}
		/**/

		if($mydetails->state_id) {
			$this->form[] = ['label'=>'State','name'=>'state_idFake','validation'=>'required','type'=>'hidden','width'=>'col-sm-6','value'=> $mydetails->state_name,'disabled' => true];
		}
		else {
			$this->form[] = ['label'=>'State','name'=>'state_id','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-6','datatable'=>'states,state_name','value'=> $mydetails->state_id,'disabled' => $mydetails->state_id?true:false];

		}
		$this->form[] = ['label'=>'Constituency','name'=>'constituency','type'=>'text','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->constituency,'readonly' => $mydetails->constituency?'true':''];

		$this->form[] = ['label'=>'Constituency No.','name'=>'constituency_no','type'=>'text','width'=>'col-sm-6', 'value' => $mydetails->constituency_no,'readonly' => $mydetails->constituency_no?'true':''];

		if($mydetails->party_id) {
			$this->form[] = ['label'=>'Your Party','name'=>'party_idFake','type'=>'text','width'=>'col-sm-6','value' => $mydetails->party_name,'disabled' =>true];
		}
		else {
			$this->form[] = ['label'=>'Your Party','name'=>'party_id','type'=>'select2','width'=>'col-sm-6','datatable'=>'party_masters,party_name'];
		}
			// $this->form[] = ['label'=>'Address of Your Party','name'=>'party_address','type'=>'textarea','validation'=>'','width'=>'col-sm-6', 'value' => $mydetails->party_address,'readonly' => $mydetails->party_address?true:false];
		$this->form[] = ['label'=>'Address of Your Party','name'=>'party_address','type'=>'textarea','validation'=>'','width'=>'col-sm-6', 'value' => $mydetails->party_address];

			// $this->form[] = ['label'=>'Whether your Party is Recognised','name'=>'party_isrecognised','type'=>'select2','validation'=>'','width'=>'col-sm-6','dataenum'=>'Y|Yes;N|No','value' => $mydetails->party_isrecognised?$mydetails->party_isrecognised:'N','readonly' => $mydetails->party_isrecognised?'true':''];

		$this->form[] = ['label'=>'Whether your Party is Recognised','name'=>'party_isrecognised','type'=>'select2','validation'=>'required','width'=>'col-sm-6','dataenum'=>'Y|Yes;N|No','value' => $mydetails->party_isrecognised?$mydetails->party_isrecognised:'N'];


		if(CRUDBooster::myPrivilegeId() == 4){
			$this->form[] = ['label'=>'Cash in hand','name'=>'party_cash_in_hand','type'=>'text','width'=>'col-sm-6'];

				//$this->form[] = ['label'=>'Bank balance','name'=>'party_bank_balance','type'=>'text','width'=>'col-sm-6'];
		}



			// $this->form[] = ['label'=>"Your Election Agent's Name",'name'=>'agent_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6', 'value' => $mydetails->agent_name,'readonly' => $mydetails->agent_name?'true':''];
		$this->form[] = ['label'=>"Your Election Agent's Name",'name'=>'agent_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6', 'value' => $mydetails->agent_name];


			// $this->form[] = ['label'=>"Election Agent's Address",'name'=>'agent_address','type'=>'textarea','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->agent_address,'readonly' => $mydetails->agent_address?'true':''];
		$this->form[] = ['label'=>"Election Agent's Address",'name'=>'agent_address','type'=>'textarea','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->agent_address];

			// $this->form[] = ['label'=>'Date of filing of Nomination','name'=>'nomination_date','validation'=>'required','width'=>'col-sm-6', 'value'=> $mydetails->nomination_date,"type"=>$mydetails->nomination_date?"text":"date", "readonly" => $mydetails->nomination_date?true:false];

		if(CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5){

			$this->form[] = ['label'=>'Date of announcement of election','name'=>'nomination_date','validation'=>'required','width'=>'col-sm-6', "type"=>$mydetails->nomination_date?"date":"date"];

			$this->form[] = ['label'=>'Date of completion of election','name'=>'date_result','validation'=>'required','width'=>'col-sm-6', 'value'=> $mydetails->date_result,"type"=>$mydetails->date_result?"date":"date"];

		}
		else {

			$this->form[] = ['label'=>'Date of filing of Nomination','name'=>'nomination_date','validation'=>'required','width'=>'col-sm-6', "type"=>$mydetails->nomination_date?"date":"date"];

			$this->form[] = ['label'=>'Date of Declaration of Result','name'=>'date_result','validation'=>'required','width'=>'col-sm-6', 'value'=> $mydetails->date_result,"type"=>$mydetails->date_result?"date":"date"];

		}



			// $this->form[] = ['label'=>'Name of Bank','name'=>'bank_name','type'=>'text','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->bank_name,'readonly' => $mydetails->bank_name?'true':'', 'help'=>'where A/C for Election Expanse is opened'];
		$this->form[] = ['label'=>'Name of Bank','name'=>'bank_name','type'=>'text','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->bank_name, 'help'=>'where A/C for Election Expense is opened'];


			// $this->form[] = ['label'=>'Bank Address','name'=>'branch_address','type'=>'text','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->branch_address,'readonly' => ($mydetails->branch_address!='' || $mydetails->branch_address!= NULL)?true:false];
		$this->form[] = ['label'=>'Bank Address','name'=>'branch_address','type'=>'text','validation'=>'required','width'=>'col-sm-6', 'value' => $mydetails->branch_address];


			// $this->form[] = ['label'=>'Bank Account No.','name'=>'acc_no','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6', 'value' => $mydetails->acc_no,'readonly' => $mydetails->acc_no?'true':''];
		$this->form[] = ['label'=>'Bank Account No.','name'=>'acc_no','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6', 'value' => $mydetails->acc_no];

		if(CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5){
			if($mydetails->party_bank_balance)
			{
				$this->form[] = ['label'=>'Bank Opening Balance','name'=>'party_bank_balance','type'=>'number','validation'=>'required|min:1','width'=>'col-sm-6', 'value'=>$mydetails->party_bank_balance, 'disabled' =>true];
			}else{
				$this->form[] = ['label'=>'Bank Opening Balance','name'=>'party_bank_balance','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-6', 'value'=>$mydetails->party_bank_balance];
			}
		}

		if(CRUDBooster::myPrivilegeId() == 3){ /* fields are available for Candidate only */
			$this->form[] = ['label'=>"Your Guardian's name",'name'=>'guardian_name','type'=>'text','validation'=>'','width'=>'col-sm-6', 'value' => $mydetails->guardian_name];


			$this->form[] = ['label'=>'Relation With guardian','name'=>'relation_wid_guardian','type'=>'radio','validation'=>'','width'=>'col-sm-6','dataenum'=>"F|Father;H|Husband", 'value' => $mydetails->relation_wid_guardian];


			if($mydetails->gender !=NULL && $mydetails->gender !=''){
				if($mydetails->gender == 'M') $gender = 'Male';
				if($mydetails->gender == 'F') $gender = 'Female';
				if($mydetails->gender == 'T') $gender = 'Transgender';

				$this->form[] = ['label'=>'Your Gender','name'=>'gender_fake','type'=>'text','width'=>'col-sm-6', 'value'=> $gender,'disabled' => true];
			}
			else {
				$this->form[] = ['label'=>'Your Gender','name'=>'gender','type'=>'select2','dataenum'=>'M|Male;F|Female;T|Transgender','validation'=>'','width'=>'col-sm-6',];
			}

				// $this->form[] = ['label'=>'Your date of Birth','name'=>'dob','validation'=>'required','width'=>'col-sm-6','value'=> $mydetails->dob,"type"=>$mydetails->dob?"text":"date", "readonly" => $mydetails->dob?true:false];
			$this->form[] = ['label'=>'Your date of Birth','name'=>'dob','validation'=>'','width'=>'col-sm-6','value'=> $mydetails->dob,"type"=>$mydetails->dob?"text":"date","readonly" => $mydetails->dob?true:false];


			/* fields are available for Candidate only */
		}
			// $this->form[] = ['label'=>'Your Address','name'=>'cadidate_address','width'=>'col-sm-6','value'=> $mydetails->cadidate_address,"type"=>"textarea", "readonly" => $mydetails->cadidate_address?true:false];
		$this->form[] = ['label'=>'Your Address','name'=>'cadidate_address','width'=>'col-sm-6','value'=> $mydetails->cadidate_address,"type"=>"textarea"];


		$this->form[] = array("label"=>"Party Logo","name"=>"party_logo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'validation'=>'image|max:1000','resize_width'=>90,'resize_height'=>90,'width'=>'col-sm-6');	
		$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10','value'=> CRUDBooster::myId()];
		$this->form[] = ['label'=>'','name'=>'election_id_hidden','type'=>'hidden','value'=> $mydetails->election_id];
		$this->form[] = ['label'=>'','name'=>'state_id_hidden','type'=>'hidden','value'=> $mydetails->state_id];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,id'];
			//$this->form[] = ['label'=>'Agent Name','name'=>'agent_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Acc No','name'=>'acc_no','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
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
	        $this->script_js = '$(".panel-body").addClass("frm-panel")';


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
	    	$query->where('user_id',CRUDBooster::myId());

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
	    	$mydetails = getMyDetails('');


	    	$state_id = $postdata['state_id_hidden']; 
	    	$election_id = $postdata['election_id_hidden'];  

			//$election_id = 1;
	    	$limitAmt = 0;

	    	$expenditure_limit = DB::table('expenditure_limits')
	    	->where('state_id',$state_id)
	    	->where('election_id',$election_id)
	    	->get(['limit']);

			//echo "<pre>"; print_r($expenditure_limit); die;

	    	if(sizeof($expenditure_limit) >0) {
	    		$limitAmt = $expenditure_limit[0]->limit;
	    	}

	    	$postdata['amount_authorised'] = $limitAmt;

	    	$myArr = $postdata;

	    	$postdata = array();

	    	$postdata['dob'] = $myArr['dob'];
	    	$postdata['gender'] = $mydetails->gender!=NULL?$mydetails->gender:$myArr['gender'];
	    	$postdata['user_id'] = $myArr['user_id'];
	    	$postdata['agent_name'] = $myArr['agent_name'];
	    	$postdata['agent_address'] = $myArr['agent_address'];
	    	$postdata['constituency'] = $myArr['constituency'];
	    	$postdata['nomination_date'] = $myArr['nomination_date'];
	    	$postdata['date_result'] = $myArr['date_result'];
	    	$postdata['bank_name'] = $myArr['bank_name'];
	    	$postdata['branch_address'] = $myArr['branch_address'];
	    	$postdata['acc_no'] = $myArr['acc_no'];
	    	$postdata['guardian_name'] = $myArr['guardian_name'];
	    	$postdata['relation_wid_guardian'] = $myArr['relation_wid_guardian'];
	    	$postdata['party_logo'] = $myArr['party_logo'];
	    	$postdata['updated_at'] = $myArr['updated_at'];
	    	$postdata['amount_authorised'] = $myArr['amount_authorised'];
	    	$postdata['party_address'] = $myArr['party_address']?$myArr['party_address']:'';
	    	$postdata['party_isrecognised'] = $myArr['party_isrecognised'];
	    	$postdata['cadidate_address'] = $myArr['cadidate_address'];
	    	$postdata['constituency_no'] = $myArr['constituency_no'];
	    	$postdata['election_id'] = $mydetails->election_id!=NULL?$mydetails->election_id:$myArr['election_id'];
	    	$postdata['party_id'] = $mydetails->party_id!=NULL?$mydetails->party_id:$myArr['party_id'];
	    	$postdata['party_name'] = $mydetails->party_name!=NULL?$mydetails->party_name:getPartyNameById($myArr['party_id']);
	    	$postdata['privilege_modified'] = 1;
			//pd($postdata);
	    	$userDet = DB::table('user_details')->where('user_id',CRUDBooster::myId())->get(['privilege_modified']);
	    	$privilege_modifiedFlg = $userDet[0]->privilege_modified; 

	    	if($privilege_modifiedFlg != 1) $postdata['privilege_id'] = $myArr['unit_type'];

	    	if(CRUDBooster::myPrivilegeId() == 4 || CRUDBooster::myPrivilegeId() == 5){
	    		$postdata['party_cash_in_hand'] = $myArr['party_cash_in_hand'];
	    		$postdata['party_bank_balance'] = $myArr['party_bank_balance'];

	    	}

			//echo "<pre>"; print_r($myArr);
			//echo "<pre>"; print_r($postdata); die;

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
	    	$userDet = DB::table('user_details')->where('user_id',CRUDBooster::myId())->first();

	    	$default_bank_details = DB::table('user_bank_details')->where('user_id',$userDet->user_id)->where('is_default','1')->first();
	    	if ($default_bank_details) { 
	    		DB::table('user_bank_details')->where('user_id',$default_bank_details->user_id)->where('is_default','1')->update([
	    			'bank_name'     => $userDet->bank_name,
	    			'bank_address' => $userDet->branch_address
	    		]);
	    	}else{
	    		DB::table('user_bank_details')->insert([
	    			'user_id'      	  => $userDet->user_id,
	    			'election_id'  	  => $userDet->election_id,
	    			'party_id'     	  => $userDet->party_id,
	    			'state_id'     	  => $userDet->state_id,
	    			'bank_name'    	  => $userDet->bank_name,
	    			'bank_address' 	  => $userDet->branch_address,
	    			'balance'      	  => $userDet->party_bank_balance,
	    			'closing_balance' => $userDet->party_bank_balance,
	    			'is_default'   	  => '1'
	    		]);
	    	}

	        $privilege_id = $userDet->privilege_id; //die();
	        if($privilege_id){
	        	DB::table('cms_users')->where('id',CRUDBooster::myId())->update(array('id_cms_privileges' => $privilege_id));
	        	Session::put("admin_privileges",$privilege_id);
	        }
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
	    public function getMyProfile() {
	        // $this->button_addmore = TRUE;
			// $this->button_cancel  = TRUE;
			// $this->button_show    = TRUE;			
			// $this->button_add     = TRUE;
			// $this->button_delete  = TRUE;
			// $this->button_edit = TRUE;
			// $this->global_privilege = TRUE;	
			// $this->hide_form 	  = ['id_cms_privileges'];
			//$id = 2; die;
	    	$userDet = DB::table('user_details')->where('user_id',CRUDBooster::myId())->get(['id']);
	    	$id = $userDet[0]->id;
	    	$data['button_cancel'] = false;
	    	$data['script_files'] = "js_files/my-profile";
	    	$data['id'] = $id;
			//$data['page_title'] = trans("crudbooster.label_button_profile");
	    	$data['page_title'] = "Your Election Profile";
	    	$data['return_url'] = url('admin/profile_edit/my-profile');
	    	$data['row']        = CRUDBooster::first('user_details',['user_id'=>CRUDBooster::myId()]);
	    	$data['icon_header'] = 'icon_b electionprofile_b';		
	    	$this->cbView('crudbooster::default.form',$data);
	    }

	    public function postSaveEdit(){
			//echo "here"; die('aaa');
	    }

	    public function getDetail($id){ 
	    	$this->cbLoader();
	    	$row = DB::table($this->table)->where($this->primary_key, $id)->first();
	    	if($row->relation_wid_guardian == 'F') {
	    		$row->relation_wid_guardian = 'Father';
	    	}
	    	if($row->relation_wid_guardian == 'H') {
	    		$row->relation_wid_guardian = 'Husband';
	    	}
	    	if($row->party_isrecognised == 'Y') {
	    		$row->party_isrecognised = 'Yes';
	    	}
	    	if($row->party_isrecognised == 'N' || $row->party_isrecognised == '') {
	    		$row->party_isrecognised = 'No';
	    	}
	    	$row->date_result = indianDateFormat($row->date_result);
	    	$row->nomination_date = indianDateFormat($row->nomination_date);
	    	$row->dob = indianDateFormat($row->dob);

	    	if (! CRUDBooster::isRead() && $this->global_privilege == false || $this->button_detail == false) {
	    		CRUDBooster::insertLog(trans("crudbooster.log_try_view", [
	    			'name' => $row->{$this->title_field},
	    			'module' => CRUDBooster::getCurrentModule()->name,
	    		]));
	    		CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
	    	}

	    	$module = CRUDBooster::getCurrentModule();

	    	$page_menu = Route::getCurrentRoute()->getActionName();
	    	$page_title = trans("crudbooster.detail_data_page_title", ['module' => $module->name, 'name' => $row->{$this->title_field}]);
	    	$command = 'detail';

	    	Session::put('current_row_id', $id);

	    	return view('crudbooster::default.form', compact('row', 'page_menu', 'page_title', 'command', 'id'));
	    }

	    public function getPartyProfile(){
	    	$data = [];

	    	return view('party_election_profile',$data);

	    }

	    public function getBankList(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;
		//pd($userDet);
	    	$data = [];
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Your Bank Details <span style="font-size:18px">(Other than Bank A/c opened for Election)</span>';
	    	$data['icon_header'] = 'icon_b cashbank_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/profile_edit/bank-list-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$data['records'] = DB::table('user_bank_details')
	    	->where('user_bank_details.user_id',$user_id)
	    	->where('user_bank_details.election_id',$election_id)
	    	->where('user_bank_details.party_id',$party_id)
	    	->where('user_bank_details.status',1)
	    	->where('user_bank_details.is_default','!=',1)
	    	->orderBy('user_bank_details.id', 'desc')
	    	->leftJoin('states', 'user_bank_details.state_id', '=', 'states.id')
	    	->select('user_bank_details.*','states.state_name')
	    	->paginate(config('app.pagination'));

		//pd($data);
	    	return view('bank_list',$data);					
	    }

	    public function getBankListAdd(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
	    	$userDet = getMyDetails('');
		//die('scbb');
	    	$data['script_files'] = 'js_files/bank_add';
	    	$data['icon_header'] = 'icon_b cashbank_b';
	    	$data['page_title'] = 'Bank Details';
	    	return view('bank_add',$data);
	    }

	    public function postBankSave(Request $request){

	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;

	    	$inputArr = $request->all();
	    	$data['user_id'] = $user_id;
	    	$data['election_id'] = $election_id;
	    	$data['party_id'] = $party_id;
	    	if(CRUDBooster::myPrivilegeId() =='5'){
	    		$data['state_id'] = $inputArr['state_id'];
	    	}elseif (CRUDBooster::myPrivilegeId() == '4') {
	    		$data['state_id'] = $userDet->state_id;
	    	}
	    	$data['bank_name'] = $inputArr['bank_name'];
	    	$data['branch_name'] = $inputArr['branch_name'];
	    	$data['bank_address'] = $inputArr['bank_address'];
	    	$data['balance'] = $inputArr['balance'];
	    	$data['closing_balance'] = $inputArr['balance'];
	    	$data['is_default'] = '0';
	    	//pd($data['state_id']);

	    	DB::table('user_bank_details')->insert($data);

	    	return redirect('admin/profile_edit/bank-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);

	    }

	    public function getBankDetailDelete($id){
	    	$bankIdAvailable = DB::table('party_transaction_register')->where('tran_submitted_bank',$id)->count();
	    	if ($bankIdAvailable >= '1') {
	    		return redirect('admin/profile_edit/bank-list')->with(['message'=> "This bank can not be removed because this bank is already used for transaction",'message_type'=>'warning']);
	    	}
	    	if(DB::table('user_bank_details')->where('id',$id)->delete())
	    		return redirect('admin/profile_edit/bank-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
	    }

	    public function getCashInHandList(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;
		//pd($userDet);
	    	$data = [];
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Cash in hand Details ';
	    	$data['icon_header'] = 'icon_b  cashreceipts_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/profile_edit/cash-in-hand-list-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$data['records'] = DB::table('user_cash_details')
	    	->where('user_cash_details.user_id',$user_id)
	    	->where('user_cash_details.election_id',$election_id)
	    	->where('user_cash_details.party_id',$party_id)
	    	->where('user_cash_details.status',1)
	    	->orderBy('user_cash_details.id', 'desc')
	    	->leftJoin('states', 'user_cash_details.state_id', '=', 'states.id')
	    	->select('user_cash_details.*','states.state_name')
	    	->paginate(config('app.pagination'));

			//pd($data);
	    	return view('cash_in_hand_list',$data);					
	    }

	    public function getCashInHandListAdd(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$data['states'] = DB::table('user_states')->where('user_id',$user_id)->get();
	    	$userDet = getMyDetails('');
		//die('scbb');
	    	$data['script_files'] = 'js_files/bank_add';
	    	$data['icon_header'] = 'icon_b cashreceipts_b';
	    	$data['page_title'] = 'Cash in hand Details';
	    	return view('cash_in_hand_add',$data);
	    }

	    public function postCashInHandSave(Request $request){

	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;

	    	$inputArr = $request->all();
	    	$data['user_id'] = $user_id;
	    	$data['election_id'] = $election_id;
	    	$data['party_id'] = $party_id;
	    	$data['state_id'] = $inputArr['state_id'];
	    	$data['balance'] = $inputArr['balance'];

	    	DB::table('user_cash_details')->insert($data);
	    	$total_balance = DB::table('user_cash_details')->where('user_id',$user_id)->groupBy('election_id')->SUM('balance');
		//pd($total_balance);
	    	DB::table('user_details')->where('user_id',$user_id)->where('election_id',$election_id)->update(['party_cash_in_hand' => $total_balance]);
	    	return redirect('admin/profile_edit/cash-in-hand-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);

	    }

	    public function getCashInHandDetailDelete($id){

	    	if(DB::table('user_cash_details')->where('id',$id)->delete()){
	    		$user_id = CRUDBooster::myId();
	    		$userDet = getMyDetails('');
	    		$election_id = $userDet->election_id;
	    		$party_id = $userDet->party_id;
	    		$total_balance = DB::table('user_cash_details')->where('user_id',$user_id)->groupBy('election_id')->SUM('balance');
	    		DB::table('user_details')->where('user_id',$user_id)->where('election_id',$election_id)->update(['party_cash_in_hand' => $total_balance]);
	    		return redirect('admin/profile_edit/cash-in-hand-list')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
	    	}
	    	else{
	    		return redirect('admin/profile_edit/cash-in-hand-list')->with(['message'=> "Fail. Error Removing data",'message_type'=>'warning']);
	    	}
	    }

	    public function getAllStates(Request $request){

	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$party_id = $userDet->party_id;
		//pd($userDet);
	    	$data = [];
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Add State';
	    	$data['ignore_chks'] = true;	
	    	if(CRUDBooster::myPrivilegeId() == 4 && $userDet->election_id != 1){
	    		$data['button_add'] = true;	
	    	}elseif (CRUDBooster::myPrivilegeId() == 5) {
	    		$data['button_add'] = true;	
	    	}else{
	    		$data['button_add'] = false;	
	    	}		

	    	$data['button_add_url'] = 'admin/profile_edit/state-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;
	    	$data['icon_header'] = 'icon_b state_b';
	    	$data['records'] = DB::table('user_states')
	    	->where('user_id',$user_id)
	    	->where('party_id',$party_id)
	    	->paginate(config('app.pagination'));
	    	return view('state_list',$data);	
	    }

	    public function getStateAdd(Request $request){

	    	$data['script_files'] = 'js_files/bank_add';
	    	$data['page_title'] = 'Add State';
	    	$data['icon_header'] = 'icon_b state_b';
	    	$data['states'] = DB::table('states')->where('status','A')->orderby('state_name','ASC')->get();
	    	return view('state_add',$data);

	    }

	    public function postStateSave(Request $request){

	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;
	    	$inputArr = $request->all(); 
	    	$data['user_id'] = $user_id;
	    	$data['party_id'] = $party_id;
	    	$data['state_id'] = $inputArr['state'];
	    	$data['state_name'] = $inputArr['state_name'];
	    	$data['election_id'] = $userDet->election_id;

	    	DB::table('user_states')->insert($data);

	    	if(array_key_exists('add',$inputArr)){
	    		return redirect('admin/profile_edit/state-add')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
	    	}

	    	if(array_key_exists('save',$inputArr)){
	    		return redirect('admin/profile_edit/all-states')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
	    	}
	    }

	    public function getStateDelete($id){
	    	$stateId = DB::table('user_states')->where('id',$id)->value('state_id');
	    	$stateIdTransaction = DB::table('party_transaction_register')->where('state_id',$stateId)->count();
	    	$stateIdBank = DB::table('user_bank_details')->where('state_id',$stateId)->count();
	    	$stateIdCash = DB::table('user_cash_details')->where('state_id',$stateId)->count();
	    	if ($stateIdTransaction >= '1' || $stateIdBank >= '1' || $stateIdCash >= '1') {
	    		return redirect('admin/profile_edit/all-states')->with(['message'=> "This State can not be removed because this state is already used",'message_type'=>'warning']);
	    	}

	    	if(DB::table('user_states')->where('id',$id)->delete())
	    		return redirect('admin/profile_edit/all-states')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
	    }

	    public function getElectionDates(Request $request){
	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;
		//pd($userDet);
	    	$data = [];
	    	$data['action_url'] = $request->url();
	    	$data['page_title'] = 'Polling Dates';
	    	$data['icon_header'] = 'icon_b calendar_b';
	    	$data['ignore_chks'] = true;			
	    	$data['button_add'] = true;
	    	$data['button_add_url'] = 'admin/profile_edit/election-date-add';
	    	$data['button_delete'] = true;
	    	$data['button_show'] = false;
	    	$data['button_filter'] = true;

	    	$data['records'] = DB::table('election_dates')
	    	->where('user_id',$user_id)
	    	->where('election_id',$election_id)
	    	->where('party_id',$party_id)
	    	->where('status',1)
	    	->paginate(config('app.pagination'));
		//pd($data);
	    	return view('election_date_list',$data);					
	    }

	    public function getElectionDateAdd(Request $request){
		//echo "hello";
	    	$data['script_files'] = 'js_files/bank_add';
	    	$data['page_title'] = 'Add Polling Date';
	    	$data['icon_header'] = 'icon_b calendar_b';
	    	$data['states'] = DB::table('states')->where('status','A')->orderBy('state_name','ASC')->get();
	    	return view('election_date_add',$data);
	    }

	    public function postElectionDateSave(Request $request){

	    	$user_id = CRUDBooster::myId();
	    	$userDet = getMyDetails('');
	    	$election_id = $userDet->election_id;
	    	$party_id = $userDet->party_id;
	    	$inputArr = $request->all(); 
	    	$data['user_id'] = $user_id;
	    	$data['party_id'] = $party_id;
	    	$data['state_id'] = $inputArr['state'];
	    	$data['election_date'] = $inputArr['election_date'];
	    	$data['election_id'] = $userDet->election_id;

	    	DB::table('election_dates')->insert($data);

	    	if(array_key_exists('add',$inputArr)){
	    		return redirect('admin/profile_edit/election-date-add')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
	    	}

	    	if(array_key_exists('save',$inputArr)){
	    		return redirect('admin/profile_edit/election-dates')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
	    	}
	    }

	    public function getElectionDateDelete($id){

	    	if(DB::table('election_dates')->where('id',$id)->delete())
	    		return redirect('admin/profile_edit/election-dates')->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);


	    }

	}