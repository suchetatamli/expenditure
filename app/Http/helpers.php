<?php

use App\PartyTransactionRegister;
function pd($exit = 0) {
    foreach(func_get_args() as $arg){
        echo '<pre>';
        print_r($arg);
        echo '</pre>';
    }
    if ($exit) exit;
}

function formatCurrency($c, $pref="")
{
    if (is_null($c) || empty($c)) {
        return '0.00';
    }
    return $pref.number_format($c, 2, '.', ',');
}


function formatDate($date)
{
    $dateObj = date_create($date);
    if (is_null($dateObj)) {
        return '';
    } else {
        return date_format($dateObj, 'd-m-Y');
    }
}

function replaceVarWithVal($strg){
    echo str_replace("MANTRAVAR1","Peter",$strg);
}

function getMyDetails($id, $type = 'candidate'){
    if(! $id) $id = CRUDBooster::myId();
    $details = DB::table('cms_users');
    if($type == 'candidate'){
        $details = $details->leftJoin('user_details', 'cms_users.id', '=', 'user_details.user_id');
        $details = $details->leftJoin('party_masters', 'user_details.party_id', '=', 'party_masters.id');
        $details = $details->leftJoin('user_bank_details', 'cms_users.id', '=', 'user_bank_details.user_id');
        $details = $details->leftJoin('states', 'states.id', '=', 'user_details.state_id');
        $details = $details->leftJoin('election_master', 'user_details.election_id', '=', 'election_master.id');

        $details = $details->select('cms_users.id','cms_users.name','cms_users.photo','cms_users.email','cms_users.id','user_details.gender','user_details.party_id','user_details.district_name', 'user_details.agent_name','user_details.agent_address','user_details.acc_no', 'user_details.bank_name as bankname', 'user_details.branch_address','user_details.guardian_name','user_details.relation_wid_guardian','user_details.dob','user_details.cadidate_address','user_details.party_id','user_details.election_sub_type','user_details.party_logo','user_details.election_id','user_details.constituency','user_details.constituency_no','user_details.nomination_date','user_details.date_result','user_details.party_name as party_name_frm_details','user_details.party_address as party_address_frm_details','user_details.statement_submission_date','user_details.privilege_modified','party_masters.party_name','party_masters.party_address','user_bank_details.bank_name','user_bank_details.branch_name','user_bank_details.bank_address','user_bank_details.bank_ifsc','user_bank_details.id as bankid','states.state_name','states.id as state_id', 'election_master.name as election_name','election_master.identifier as election_type','election_master.election_year','user_details.party_cash_in_hand','user_details.party_bank_balance','user_details.domain_name');
    }
    
    $details = $details->where('cms_users.id',$id)->get();    
    if(sizeof($details)){
        return $details[0];
    }
    return array();
}

function getElectionDates() {
    $det = getMyDetails('');
    return (object)[
        'date_of_announcement' => $det->nomination_date,
        'date_of_completion' => $det->date_result
    ];
}

function pollDates() { 
    $dateArray = array();
    $user_id = CRUDBooster::myId();
    $userDet = getMyDetails('');
    $election_id = $userDet->election_id;
    $party_id = $userDet->party_id;

    $data['records'] = DB::table('election_dates')
    ->where('user_id',$user_id)
    ->where('election_id',$election_id)
    ->where('party_id',$party_id)
    ->where('status',1)
    ->get(['election_date']);

    if(sizeof($data['records'])>0){
     foreach($data['records'] as $key=>$val){
        $dateArray[$key] =  indianDateFormat($val->election_date);
    }
}                   

     //pd($data);
return  $dateArray;                  

   // return ['01/03/2019','02/03/2019','03/03/2019'];
    //$data = DB::table('election_dates');
}

function formatPettyDescription($text){ //echo $text;die();
    $elems = explode('||', $text); //print_r($elems); die();
   // $ret = $text;
    $ret = '';
    if(sizeof($elems)){
        if($elems[0] == 'KEPT'){
            //$ret = "Given to Different branch office/agent to incur.<br>Name: ".$elems[1]."<br>Amount given: ".$elems[2];
            $ret = "Name/Place: ".$elems[1]."<br>Amount given: ".formatCurrency($elems[2]);
        }
    }
    
    return $ret;
}

function indianDateFormat($date) {
   if (is_null($date)) 
    return '';
return date('d/m/y',strtotime($date));
}

function textFieldNameByShortTag($data) {
    return ucfirst($data);
}

function getCurrentBalance($tableName = 'bank_register') {
    $userId         =   CRUDBooster::myId();
    $userDetails    =   getMyDetails($userId);
    $balanceDetails =   DB::table($tableName)->select('balance')->where('user_id',$userDetails->id)->where('election_id',$userDetails->election_id)->orderBy('id','desc')->limit(1)->first();
    return isset($balanceDetails->balance) ? $balanceDetails->balance : 0;
}

function getElectionId($election_name){
    if(! $election_name) return NULL;
    $details = DB::table('election_master');    
    $details = $details->where('name',$election_name)->get();    
    if(sizeof($details)){
        return $details[0]->id;
    }
    return 1;
}

function getStateNameById($state_id) {
    $cityDetails =   DB::table('states')->select('state_name')->where('id',$state_id)->first();
    return isset($cityDetails->state_name) ? $cityDetails->state_name : '';
}

function getUserStates($userId = '') {
    $user_details    =   getMyDetails($userId);
    return DB::table('user_states')->select('state_id','state_name')->where('user_id',$user_details->id)->orderBy('state_name','asc')->get();
}

function getPartyNameById($id) {
    $partyDetails =   DB::table('party_masters')->select('party_name')->where('id',$id)->first();
    return isset($partyDetails->party_name) ? $partyDetails->party_name : '';
}

function getFormIdentifierGuideline(){
    $ret = array(
        'c_cash_deposit'=>'Cash Deposit',
        'c_cash_entry'=>'Cash From Other Party Or Person',
        'c_cash_to_bank' => 'Transfer Cash from Party/ Person to Bank',
        'c_bank_deposit' => 'Check Draft Deposit To Bank',
        'c_inkind' => 'Goods or Service received in kind',
        'c_ee_sch1' => 'Election Expenses Schedule 1',
        'c_ee_sch2' => 'Election Expenses Schedule 2',
        'c_ee_sch3' => 'Election Expenses Schedule 3',
        'c_ee_sch4' => 'Election Expenses Schedule 4',
        'c_ee_sch5' => 'Election Expenses Schedule 5',
        'c_ee_sch6' => 'Election Expenses Schedule 6',
        'c_petty' => 'Cash withdrawal from Bank for petty expenses',
        'c_log_purchase' => 'Purchase Register',
    );
    return $ret;
}

function getImageNameArray(){
    $data = array(
        '5' => 'icon_image/CashReceipts.png',
        '9' => 'icon_image/NonCashDepositsinBank.png',
        '6' => 'icon_image/NonCashDepositsinBank.png'
    );
    return $data;
}

function getIssueType($index){
    $data = array(
        'own_bank' => 'From own Bank Account',
        'other_person_party' => 'From Political Party',
        'other' => 'From a Person/ Company/ Firm/ Associations/ Body of Person, etc.'
    );
    return $data[$index];
}

function candidateScheduleReceipt(){
    $data = array(
        'schedule1' => 'Expense in Public Meeting, Rally, Procession, etc. (Without Star Campaigner) - Schedule 1',
        'schedule2' => 'Expense in Public Meeting, Rally, Procession, etc. (With Star Campaigner) - Schedule 2',
        'schedule3' => 'Expense on Campaign Materials, like, handbills, posters, hoardings, etc. (if not covered in Sch 1 & 2) - Schedule 3',
        'schedule4' => 'Expense on Campaign through Print & Electonic media, Bulk SMS, Internet, Social Media, etc. appearing on Privately owned & Owned by Candidate or Party - Schedule 4 & 4A',
        'schedule5' => 'Expense on Campaign Vehicle - Schedule 5',
        'schedule6' => 'Expense on Campaign workers & on candidate\'s booth outside Polling Station - Schedule 6',
    );
    return $data;
}

function getTransTypeParty($id){
    $expense =   DB::table('expensetypes_master')->select('expense_type')->where('id',$id)->first();
    return isset($expense) ? $expense->expense_type : '';
}

function getExpenseType($typeid = 0, $tblIden = 'schedule1'){
    $tbl = '';
    if($tblIden == 'schedule1'){
        $tbl = 'sc1_nature_of_expenditure';
    }else if($tblIden == 'schedule6'){
        $tbl = 'sc6_nature_expenses';
    }
    if($tbl){
        $expense =   DB::table($tbl)->select('title')->where('id',$typeid)->first();
    }
    return isset($expense) ? $expense->title : '';
}

function formatedAddress($add, $line = 0){
    $length = strlen($add);
    $output[0] = substr($add, 0, 28) . ' -';
    $output[1] = substr($add, 28,$length);
    return $output[$line];
}

function getGuideLines($identifier){
    $expenseIdentifier =   DB::table('notes_regulations')->where('type_flg','R')->where('form_identifier',$identifier);
    //pd($expense);

    $rtHtml = '';
    if(CRUDBooster::myPrivilegeId() == 3){
        $expense = $expenseIdentifier->where('tag_with',0)->orWhere('tag_with',1);
    }else{
        $expense = $expenseIdentifier->where('tag_with',0)->orWhere('tag_with',2);
    }
    $expense = $expense->get();
    if($expense){
        $rtHtml .= '<div class="guidelines_instruction" id="gd_wrp">  <div class="contenttxt"><div class="box">';
        $rtHtml .= '<div class="heading" id="{{ $row->id }}"> <h4>Guidlines & Instruction</h4> </div>';
        foreach ($expense as $key => $value) {
            $rtHtml .= '<div class="txt">'.$value->content.'</div>';
        }
        $rtHtml .= '</div></div></div>';
    }
    return $rtHtml;
}

function getOutstandingAmountSchedules($schedule,$party_transaction_id){
    $amount = 0;
    $outAmt = array();
    if($schedule==1){
       $outAmt = DB::table('party_schedule1')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }
   if($schedule==2){
       $outAmt = DB::table('party_schedule2')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }
   if($schedule==3){
       $outAmt = DB::table('party_schedule3')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }
   if($schedule==4){
       $outAmt = DB::table('party_schedule4')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }
   if($schedule==5){
       $outAmt = DB::table('party_schedule5')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }
   if($schedule==6){
       $outAmt = DB::table('party_schedule6')
       ->where('party_transaction_register',$party_transaction_id)
       ->get(['outstanding_amount'])->toArray(); 
   }

   if(sizeof($outAmt)>0){
    $amount = $outAmt[0]->outstanding_amount;
}

return $amount;
}

function updateBankClosingBalance($transaction_id, $isDelete = false){
   $nonCashDeposit = PartyTransactionRegister::where('id',$transaction_id)->first();
   $operator = '+';

   if($isDelete){
       if ($nonCashDeposit->tran_type == 'Dr') {
           $operator = '+';
       }elseif ($nonCashDeposit->tran_type == 'Cr') {
           $operator = '-';
       }
   }else{
       if ($nonCashDeposit->tran_type == 'Cr') {
           $operator = '+';
       }elseif ($nonCashDeposit->tran_type == 'Dr') {
           $operator = '-';
       }
   }
   
   DB::table('user_bank_details')->where('id',$nonCashDeposit->tran_submitted_bank)
   ->update(['closing_balance' => DB::raw( 'closing_balance '.$operator.' '. $nonCashDeposit->tran_amount)]);
   return $nonCashDeposit;
}


function getBankList($state_id='')
{
    $user_id = CRUDBooster::myId();
    if ($state_id) {
        $submitted_bank_name = DB::table('user_bank_details')->where('user_id',$user_id)->where('state_id',$state_id)->where('status',1)->get()->toArray();
    }else{
        $submitted_bank_name = DB::table('user_bank_details')->where('user_id',$user_id)->where('status',1)->get()->toArray();
    }
    
    $bankName = '';
    foreach($submitted_bank_name as $bank_detail){
        $bankName .= '<option value="'.$bank_detail->id.'">'.$bank_detail->bank_name.'</option>';
    }
    echo $bankName;
}