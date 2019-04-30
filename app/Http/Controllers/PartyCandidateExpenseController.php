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
use Helper;


class PartyCandidateExpenseController extends \crocodicstudio\crudbooster\controllers\CBController {

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

	    public function getTestPdf() {
	    	$data = [];
	    	$pdf = PDF::loadView('pdf.test_political_party_pdf', $data);
	    	return $pdf->download('test_political_party_pdf.pdf');
	    }

	    private function partySchedule1Data() {
	    	return PartySchedule1::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule1() {
	    	$data['print_data'] = $this->partySchedule1Data();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 1';
	    	$data['pdf_content'] = 'party_schedule_1';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule1Pdf() {
	    	$data['print_data'] = $this->partySchedule1Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_1', $data);
	    	return $pdf->download('party_schedule_1.pdf');
	    }

	    private function partySchedule2Data() {
	    	return PartySchedule2::where('is_star','Y')->filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule2() {
	    	$data['print_data'] = $this->partySchedule2Data();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 2';
	    	$data['pdf_content'] = 'party_schedule_2';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule2Pdf() {
	    	$data['print_data'] = $this->partySchedule2Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_2', $data);
	    	return $pdf->download('party_schedule_2.pdf');
	    }

	    private function partySchedule2AData() {
	    	return PartySchedule2::where('is_star','N')->filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule2A() {
	    	$data['print_data'] = $this->partySchedule2AData();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 2A';
	    	$data['pdf_content'] = 'party_schedule_2A';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule2APdf() { 
	    	$data['print_data'] = $this->partySchedule2AData();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_2A', $data);
	    	return $pdf->download('party_schedule_2A.pdf');
	    }

	    private function partySchedule3Data() {
	    	return PartySchedule3::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule3() {
	    	$data['print_data'] = $this->partySchedule3Data(); 
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 3';
	    	$data['pdf_content'] = 'party_schedule_3';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule3Pdf() {
	    	$data['print_data'] = $this->partySchedule3Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_3', $data);
	    	return $pdf->download('party_schedule_3.pdf');
	    }

	    private function partySchedule4Data() {
	    	return PartySchedule4::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule4() {
	    	$data['print_data'] = $this->partySchedule4Data();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 4';
	    	$data['pdf_content'] = 'party_schedule_4';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule4Pdf() {
	    	$data['print_data'] = $this->partySchedule4Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_4', $data);
	    	return $pdf->download('party_schedule_4.pdf');
	    }

	    private function partySchedule5Data() {
	    	return PartySchedule5::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule5() { 
	    	$data['print_data'] = $this->partySchedule5Data();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 5';
	    	$data['pdf_content'] = 'party_schedule_5';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule5Pdf() {
	    	$data['print_data'] = $this->partySchedule5Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_5', $data);
	    	return $pdf->download('party_schedule_5.pdf');
	    }

	    private function partySchedule6Data() {
	    	return PartySchedule6::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule6() {
	    	$data['print_data'] = $this->partySchedule6Data();
	    	$data['page_title'] = 'Expenses for General Party Propaganda';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 6';
	    	$data['pdf_content'] = 'party_schedule_6';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule6Pdf() {
	    	$data['print_data'] = $this->partySchedule6Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_6', $data);
	    	return $pdf->download('party_schedule_6.pdf');
	    }

	    private function partySchedule7Data() {

			//return PartySchedule7::where(['user_id' => $candidate_details->id,'election_id' => $candidate_details->election_id])->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])->orderBy('date','desc')->get();
	    	return PartySchedule7::filterPartyScheduleData()->get();              
	    }

	    public function getPartySchedule7() {
	    	$data['print_data'] = $this->partySchedule7Data();
	    	$data['page_title'] = 'Expenses for Party Candidate';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 7';
	    	$data['pdf_content'] = 'party_schedule_7';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule7Pdf() {
	    	$data['print_data'] = $this->partySchedule7Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_7', $data);
	    	return $pdf->download('party_schedule_7.pdf');
	    }

	    private function partySchedule8Data() {
	    	$candidate_details	= 	getMyDetails('');			
	    	return PartySchedule8::where(['user_id' => $candidate_details->id,'election_id' => $candidate_details->election_id])->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])->orderBy('date','desc')->get();
	    }

	    public function getPartySchedule8() {
	    	$data['print_data'] = $this->partySchedule8Data();
	    	$data['page_title'] = 'Expenses for Party Candidate';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 8';
	    	$data['pdf_content'] = 'party_schedule_8';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule8Pdf() {
	    	$data['print_data'] = $this->partySchedule8Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_8', $data);
	    	return $pdf->download('party_schedule_8.pdf');
	    }

	    private function partySchedule9Data() {
	    	$candidate_details	= 	getMyDetails('');			
	    	return PartySchedule9::where(['user_id' => $candidate_details->id,'election_id' => $candidate_details->election_id])->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])->orderBy('date','desc')->get();
	    }

	    public function getPartySchedule9() {
	    	$data['print_data'] = $this->partySchedule9Data();
	    	$data['page_title'] = 'Expenses for Party Candidate';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 9';
	    	$data['pdf_content'] = 'party_schedule_9';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule9Pdf() {
	    	$data['print_data'] = $this->partySchedule9Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_9', $data);
	    	return $pdf->download('party_schedule_9.pdf');
	    }

	    private function partySchedule10Data() {
	    	$candidate_details	= 	getMyDetails('');			
	    	return PartySchedule10::where(['user_id' => $candidate_details->id,'election_id' => $candidate_details->election_id])->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])->orderBy('date','desc')->get();
	    }

	    public function getPartySchedule10() {
	    	$data['print_data'] = $this->partySchedule10Data();
	    	$data['page_title'] = 'Expenses for Party Candidate';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 10';
	    	$data['pdf_content'] = 'party_schedule_10';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule10Pdf() {
	    	$data['print_data'] = $this->partySchedule10Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_10', $data);
	    	return $pdf->download('party_schedule_10.pdf');
	    }

	    private function partySchedule11Data() {
	    	$candidate_details	= 	getMyDetails('');			
	    	return PartySchedule11::where(['user_id' => $candidate_details->id,'election_id' => $candidate_details->election_id])->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])->orderBy('date','desc')->get();
	    }

	    public function getPartySchedule11() {
	    	$data['print_data'] = $this->partySchedule11Data();
	    	$data['page_title'] = 'Expenses for Party Candidate';
	    	$data['icon_header'] = 'icon_b expstatements_b';
	    	$data['layout_title'] = 'Schedule - 11';
	    	$data['pdf_content'] = 'party_schedule_11';
	    	$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
	    	return view('party.party_schedule_layout',$data);
	    }

	    public function getPartySchedule11Pdf() {
	    	$data['print_data'] = $this->partySchedule11Data();
	    	$pdf = PDF::loadView('party.pdf.party_schedule_11', $data);
	    	return $pdf->download('party_schedule_11.pdf');
	    }

	    public function getLumpSumAmountAdd(){
	    	$user_id = CRUDBooster::myId();		
	    	$data = [];		
	    	$data['mode_payment'] = [
	    		'Cash' => 'Cash',
	    		'Cheque' => 'Cheque',
	    		'DD' => 'DD',
	    		'PO' => 'PO',
	    		'RTGS' => 'RTGS',
	    		'Online Transfer' => 'Online Transfer',
	    		'Any Other' => 'Any Other'
	    	];
	    	$data['script_files'] = 'js_files/hq_record_lump_sum_add';
	    	$data['icon_header'] = 'icon_b depositself_b';		
	    	//$data['expenses_bank_name']	= DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get();			
	    	return view('party.hq_record_lump_sum_add',$data);
	    }

	    public function postLumpSumAmountAddSave(Request $request){
	    	$inputArr = $request->all();
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
			$data['tagged_parts'] = 'A55';
			//pd($data);
			$party_transacion_id = DB::table('party_transaction_register')->insertGetId($data);
			updateBankClosingBalance($party_transacion_id);
			return redirect('admin/party_candidate_expense/lump-sum-amount-list')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);
		}

		public function getLumpSumAmountList(Request $request) {
			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Record Lump Sum Amount';
			$data['icon_header'] = 'icon_b depositself_b';
			$data['ignore_chks'] = true;			
			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/party_candidate_expense/lump-sum-amount-add';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			
			$resultObj = DB::table('party_transaction_register')
			->where('user_id',$userdetails->id)
			->where('election_id',$userdetails->election_id)
			->where('given_to','U');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;

			$resultObj = !empty($request->srch_key) ? $resultObj->where('tran_receiver_name', 'LIKE', "%$request->srch_key%") : $resultObj;

			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
			$data['srch_key'] = $request->srch_key?$request->srch_key:'';
			
			return view('party.hq_record_lump_sum_list',$data);
		}
		
		public function getAllExpenses(Request $request){

			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Record Expenses - incurred/authorised for Candidate(s)';
			$data['icon_header'] = 'icon_b recordexpense_b';
			$data['ignore_chks'] = true;			
			$data['button_add'] = true;
			$data['button_add_url'] = 'admin/party_candidate_expense/expenses-add';
			$data['button_delete'] = true;
			$data['button_show'] = false;
			$data['button_filter'] = true;
			
			$resultObj = DB::table('party_transaction_register')->where('user_id',$userdetails->id)->where('election_id',$userdetails->election_id)->where('given_to','C');
			$resultObj = !empty($request->from_date) && !empty($request->from_date) ? $resultObj->whereBetween('tran_date',[$request->from_date,$request->to_date]) : $resultObj;
			$resultObj = !empty($request->srch_key) ? $resultObj->where('tran_receiver_name', 'LIKE', "%$request->srch_key%") : $resultObj;

			$resultObj = $resultObj->leftJoin('states', 'party_transaction_register.state_id', '=', 'states.id');

			$resultObj = $resultObj->select('party_transaction_register.*','states.state_name');

			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
			$data['srch_key'] = !empty($request->srch_key) ? $request->srch_key : '';

			return view('party.hq_candidate_expense_list',$data);
		}

		public function getAjaxForm($id) {
			$user_id = CRUDBooster::myId();
			$form_array = [
				1 => 'form_a',
				2 => 'form_b',
				3 => 'form_c',
				4 => 'form_d',
				5 => 'form_e'   
			];
			$data['states'] = DB::table('states')->where('status','A')->orderby('state_name','ASC')->get();            
			echo view('party.candidate-expense.'.$form_array[$id],$data);              
		}

		public function getExpensesAdd(){
			$user_id = CRUDBooster::myId();
			$data['expense_types'] = DB::table('candidate_expensetypes_master')->where('use_forType','HQ')->where('status',1)->get();

			$data['states'] = DB::table('states')->where('status','A')->orderby('state_name','ASC')->get();
			$data['script_files'] = 'js_files/party_candidate_general_expenses'; 
			$data['page_title'] = 'Record Expenses - incurred/authorised for Candidate(s)';
			$data['icon_header'] = 'icon_b recordexpense_b';
			return view('party.hq_candidate_expenses_add',$data);

		}

		private function getPsuSchedule12Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule12::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			//return PartySchedule12::where('state_id',$state_id)->filterPartyScheduleData()->get();		
			return $data;
		}

		public function getPsuSchedule12(Request $request) {	
			$data = $this->getPsuSchedule12Data($request->state_id);	
			$data['page_title'] = 'Expense for General Party Propaganda';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			//pd($data['pdf_link']);		
			return view('party.psu_schedule.psu_schedule_12',$data);
		}

		public function getPsuSchedule12Pdf(Request $request) {
			$data = $this->getPsuSchedule12Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_12', $data);
			return $pdf->download('party_schedule_12.pdf');
		}

		private function getPsuSchedule13Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule13::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule13(Request $request) {	
			$data = $this->getPsuSchedule13Data($request->state_id);
			$data['page_title'] = 'Expense for General Party Propaganda';	
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			//pd($data['pdf_link']);		
			return view('party.psu_schedule.psu_schedule_13',$data);
		}

		public function getPsuSchedule13Pdf(Request $request) {
			$data = $this->getPsuSchedule13Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_13', $data);
			return $pdf->download('party_schedule_13.pdf');
		}


		private function getPsuSchedule14Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule14::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule14(Request $request) {	
			$data = $this->getPsuSchedule14Data($request->state_id);	
			$data['page_title'] = 'Expense for General Party Propaganda';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			//pd($data);		
			return view('party.psu_schedule.psu_schedule_14',$data);
		}

		public function getPsuSchedule14Pdf(Request $request) {
			$data = $this->getPsuSchedule14Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_14', $data);
			return $pdf->download('party_schedule_14.pdf');
		}


		private function getPsuSchedule15Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule15::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule15(Request $request) {	
			$data = $this->getPsuSchedule15Data($request->state_id);
			$data['page_title'] = 'Expense for General Party Propaganda';	
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			//pd($data['pdf_link']);		
			return view('party.psu_schedule.psu_schedule_15',$data);
		}

		public function getPsuSchedule15Pdf(Request $request) {
			$data = $this->getPsuSchedule15Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_15', $data);
			return $pdf->download('party_schedule_15.pdf');
		}

		private function getPsuSchedule16Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule16::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule16(Request $request) {	
			$data = $this->getPsuSchedule16Data($request->state_id);	
			$data['page_title'] = 'Expense for General Party Propaganda';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			//pd($data['pdf_link']);		
			return view('party.psu_schedule.psu_schedule_16',$data);
		}

		public function getPsuSchedule16Pdf(Request $request) {
			$data = $this->getPsuSchedule16Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_16', $data);
			return $pdf->download('party_schedule_16.pdf');
		}

		private function getPsuSchedule17Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule17::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			//pd($data);
			return $data;
		}

		public function getPsuSchedule17(Request $request) {	
			$data = $this->getPsuSchedule17Data($request->state_id);
			$data['page_title'] = 'Expense for General Party Propaganda';	
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_17',$data);
		}

		public function getPsuSchedule17Pdf(Request $request) {
			$data = $this->getPsuSchedule17Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_17', $data);
			return $pdf->download('party_schedule_17.pdf');
		}

		private function getPsuSchedule18Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule18::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule18(Request $request) {	
			$data = $this->getPsuSchedule18Data($request->state_id);	
			$data['page_title'] = 'Expense by State Unit for Candidates of Districts & Local Units';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_18',$data);
		}

		public function getPsuSchedule18Pdf(Request $request) {
			$data = $this->getPsuSchedule18Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_18', $data);
			return $pdf->download('party_schedule_18.pdf');
		}

		private function getPsuSchedule19Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule19::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule19(Request $request) {	
			$data = $this->getPsuSchedule19Data($request->state_id);	
			$data['page_title'] = 'Expense by State Unit for Candidates of Districts & Local Units';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_19',$data);
		}

		public function getPsuSchedule19Pdf(Request $request) {
			$data = $this->getPsuSchedule19Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_19', $data);
			return $pdf->download('party_schedule_19.pdf');
		}

		private function getPsuSchedule20Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule20::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule20(Request $request) {	
			$data = $this->getPsuSchedule20Data($request->state_id);	
			$data['page_title'] = 'Expense by State Unit for Candidates of Districts & Local Units';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_20',$data);
		}

		public function getPsuSchedule20Pdf(Request $request) {
			$data = $this->getPsuSchedule20Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_20', $data);
			return $pdf->download('party_schedule_20.pdf');
		}

		private function getPsuSchedule21Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule21::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule21(Request $request) {	
			$data = $this->getPsuSchedule21Data($request->state_id);	
			$data['page_title'] = 'Expense by State Unit for Candidates of Districts & Local Units';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_21',$data);
		}

		public function getPsuSchedule21Pdf(Request $request) {
			$data = $this->getPsuSchedule21Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_21', $data);
			return $pdf->download('party_schedule_21.pdf');
		}

		private function getPsuSchedule22Data($state_id = '') {	
			$data['states'] = getUserStates();	
			$data['selected_id'] = $state_id ? $state_id : $data['states'][0]->state_id;
			$data['print_data'] = PartySchedule22::where('state_id',$data['selected_id'])->filterPartyScheduleData()->get();
			$data['state_name'] = getStateNameById($data['selected_id']);		
			return $data;
		}

		public function getPsuSchedule22(Request $request) {	
			$data = $this->getPsuSchedule22Data($request->state_id);	
			$data['page_title'] = 'Expense by State Unit for Candidates of Districts & Local Units';
			$data['pdf_link'] = url()->current().'-pdf?state_id='.$request->state_id;
			$data['icon_header'] = 'icon_b expstatements_b';
			return view('party.psu_schedule.psu_schedule_22',$data);
		}

		public function getPsuSchedule22Pdf(Request $request) {
			$data = $this->getPsuSchedule22Data($request->state_id);
			$pdf = PDF::loadView('party.psu_schedule.pdf.psu_schedule_22', $data);
			return $pdf->download('party_schedule_22.pdf');
		}

		public function getCashReceiptAdd(){

			$data['script_files'] = 'js_files/party_transaction_register_add';
			return view('party.hq_cash_receipt_add');
		}
		
		public function postGeneralExpensesAdd(Request $request){

			$inputArr = $request->all();
			$expense_type = $inputArr['expense_type'];
			$user_id = CRUDBooster::myId(); 
			$mydetails = getMyDetails($user_id); 

			$data['user_id'] = $user_id;
			$data['privilege_id'] = CRUDBooster::myPrivilegeId();
			$data['election_id'] = $mydetails->election_id!=''?$mydetails->election_id:0;
			$data['party_id'] = $mydetails->party_id!=''?$mydetails->party_id:0;
			$data['state_id'] = $inputArr['candidate_state_id']?$inputArr['candidate_state_id']:$mydetails->state_id;
			$data['trans_parent_id'] = 0;
			$data['tran_date'] = $inputArr['date'];
			$data['tran_amount'] = $inputArr['amount'];
			$data['tran_amount_outstanding'] = $inputArr['amount_outstanding'];
			$data['tran_source'] = 'Self';
			$data['tran_source_name'] = $mydetails->name;
			$data['tran_source_address'] = $mydetails->party_address;
			$data['tran_purpose'] = $expense_type; // type of expense id 
			$data['tran_method'] = !empty($inputArr['payment_mode'])?$inputArr['payment_mode']:'Cash';

			$data['receipt_no'] = !empty($inputArr['ref_no1'])?$inputArr['ref_no1']:$inputArr['ref_no2'];
			$data['receipt_date'] = !empty($inputArr['ref_no1_date'])?$inputArr['ref_no1_date']:$inputArr['ref_no2_date'];	


			$data['tran_receiver_name'] = $inputArr['candidates_name']?$inputArr['candidates_name']:$inputArr['name'];
			$data['tran_rate'] = $inputArr['amount'];
			$data['tran_type'] = 'Dr';
			$data['given_to'] = 'C'; // for candidate
			$data['balance'] = getCurrentBalance('party_transaction_register')-$inputArr['amount'];
			

			//pd($data);
			if ($expense_type == 1){	
				$data['tagged_parts'] = 'A54ai';
				$data['tag_schedule'] = '7';
			} else if ($expense_type == 2) {
				$data['tagged_parts'] = 'A54aii';
				$data['tag_schedule'] = '8';
			} else if ($expense_type == 3) {
				$data['tagged_parts'] = 'A54aiii';
				$data['tag_schedule'] = '9';
			} else if ($expense_type == 4) {
				$data['tagged_parts'] = 'A54aiv';
				$data['tag_schedule'] = '10';
			} else if ($expense_type == 5) {
				$data['tagged_parts'] = 'A54av';
				$data['tag_schedule'] = '11';
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
			if ($inputArr['payment_mode'] == 'Cheque' || $inputArr['payment_mode'] == 'DD' || $inputArr['payment_mode'] == 'PO') {
				$data['tran_submitted_bank'] = $inputArr['chq_expenses_bank'];
			}else if ($inputArr['payment_mode'] == 'RTGS' || $inputArr['payment_mode'] == 'Fund Transfer') {
				$data['tran_submitted_bank'] = $inputArr['expenses_bank'];
			}

			if($party_transacion_id = DB::table('party_transaction_register')->insertGetId($data)){
				$dataSCH1['party_name'] = $mydetails->party_name;
				$dataSCH1['user_id'] = $user_id;
				$dataSCH1['privilege_id'] = $data['privilege_id'];
				$dataSCH1['party_id'] = $mydetails->party_id;
				$dataSCH1['election_id'] = $mydetails->election_id;
				$dataSCH1['state_id'] = $mydetails->state_id;
				$dataSCH1['state'] = $mydetails->state_name;
				$dataSCH1['total_amount'] = $inputArr['amount'];
				$dataSCH1['date'] = $inputArr['date'];
				$dataSCH1['party_transaction_register_id'] = $party_transacion_id;

				if($expense_type == 1){	

					$dataSCH1['candidate_state_id'] = $inputArr['candidate_state_id'];
					$dataSCH1['state'] = getStateNameById($inputArr['candidate_state_id']);
					$dataSCH1['name'] = $inputArr['name'];
					$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
					
					$dataSCH1['payment_mode'] = $inputArr['payment_mode'];
					$dataSCH1['dd_or_cheque_no'] = !empty($inputArr['ref_no1'])?$inputArr['ref_no1']:$inputArr['ref_no2'];
					$dataSCH1['date_of_transfer'] = !empty($inputArr['ref_no1_date'])?$inputArr['ref_no1_date']:$inputArr['ref_no2_date'];
					$dataSCH1['tran_submitted_bank'] = !empty($inputArr['chq_expenses_bank'])?$inputArr['chq_expenses_bank']:$inputArr['expenses_bank'];
					DB::table('party_schedule7')->insert($dataSCH1);
					
				} else if ($expense_type == 2) {

					$dataSCH1['candidate_state_id'] = $inputArr['candidate_state_id'];
					$dataSCH1['state'] = getStateNameById($inputArr['candidate_state_id']);
					$dataSCH1['name'] = $inputArr['name'];
					$dataSCH1['name_of_media'] = $inputArr['name_of_media'];
					$dataSCH1['other_details'] = $inputArr['other_details'];
					$dataSCH1['outstanding_amount']	= $inputArr['amount_outstanding']?$inputArr['amount_outstanding']:0;
					$dataSCH1['cash'] = $inputArr['payment_mode'];

					DB::table('party_schedule8')->insert($dataSCH1);
				} else if ($expense_type == 3) {

					$dataSCH1['candidate_state_id'] = $inputArr['candidate_state_id'];
					$dataSCH1['state'] = getStateNameById($inputArr['candidate_state_id']);
					$dataSCH1['name'] = $inputArr['name'];
					$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
					$dataSCH1['details_of_items'] = $inputArr['details_of_items'];
					$dataSCH1['outstanding_amount']	= $inputArr['amount_outstanding']?$inputArr['amount_outstanding']:0;
					$dataSCH1['cash'] = $inputArr['payment_mode'];

					DB::table('party_schedule9')->insert($dataSCH1);
				} else if ($expense_type == 4) {

					$dataSCH1['venue'] = $inputArr['venue'];
					$dataSCH1['name'] = $inputArr['name'];
					$dataSCH1['name_of_star_campaigner'] = $inputArr['name_of_star_campaigner'];
					$dataSCH1['candidates_name'] = $inputArr['candidates_name'];
					$dataSCH1['items_of_expenditure'] = $inputArr['items_of_expenditure'];
					$dataSCH1['outstanding_amount']	= $inputArr['amount_outstanding']?$inputArr['amount_outstanding']:0;
					$dataSCH1['cash'] = $inputArr['payment_mode'];

					DB::table('party_schedule10')->insert($dataSCH1);
				} else if ($expense_type == 5) {

					$dataSCH1['candidate_state_id'] = $inputArr['candidate_state_id'];
					$dataSCH1['state'] = getStateNameById($inputArr['candidate_state_id']);
					$dataSCH1['name'] = $inputArr['name'];
					$dataSCH1['no_name_constituency'] = $inputArr['no_name_constituency'];
					$dataSCH1['details_of_items'] = $inputArr['details_of_items'];
					$dataSCH1['outstanding_amount']	= $inputArr['amount_outstanding']?$inputArr['amount_outstanding']:0;
					$dataSCH1['cash'] = $inputArr['payment_mode'];

					DB::table('party_schedule11')->insert($dataSCH1);
				}

			}
			updateBankClosingBalance($party_transacion_id);
			return redirect('admin/party_candidate_expense/all-expenses')->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	;

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
				
				

				return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

			endif;
		}
		
		public function getBankDeposit(Request $request){

			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Noncash Bank Deposit';
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
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
			
			return view('party.hq_bank_deposit_list',$data);

		}

		public function getBankDepositAdd(){
			return view('party.hq_bank_deposit_add');
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
				$data['tagged_parts'] = 'R';
				
				DB::table('party_transaction_register')->insert($data);

				return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

			endif;


		}

		public function getGoodsList(Request $request){

			$data = [];
			$userdetails = getMyDetails('');
			$data['action_url'] = $request->url();
			$data['page_title'] = 'Goods/Service Received in kind';
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
			$data['result'] = $resultObj->orderby('tran_date','desc')->paginate(config('app.pagination'));
			$data['from_date'] = !empty($request->from_date) ? $request->from_date : '';
			$data['to_date'] = !empty($request->to_date) ? $request->to_date : '';
			
			return view('party.hq_goods_list',$data);
			
		}

		public function getGoodsAdd(Request $request){
			return view('party.hq_goods_add');
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
				$data['tagged_parts'] = 'R';
				
				DB::table('party_transaction_register')->insert($data);

				return redirect()->back()->with(['message'=> "Success. Record added successfully",'message_type'=>'success']);	

			endif;

		}

		public function getPartyTransactionRegisterDelete($id){

			if(DB::table('party_transaction_register')->where('id',$id)->delete())
				return redirect()->back()->with(['message'=> "Success. Record removed successfully",'message_type'=>'success']);
		}


	}