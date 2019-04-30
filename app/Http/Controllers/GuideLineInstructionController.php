<?php namespace App\Http\Controllers;
use Session;
use DB;
use CRUDBooster;
use Illuminate\Http\Request;
use Helper;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Carbon\Carbon;
use App\NotesRegulation;

class GuideLineInstructionController extends \crocodicstudio\crudbooster\controllers\CBController {		

	public function index() {
		$data 					= 	[];		
		$data['page_title']		= 	'Guidelines & Instruction';
			//$data['result'] 		= 	NotesRegulation::identifier()->where('type_flg','R')->orderBy('id','desc')->paginate(config('app.pagination'));	
			//$data['result'] = NotesRegulation::with('identifier')->get();
		$resultsRegulation = DB::table('notes_regulations')
		->join('identifiers_master','notes_regulations.form_identifier','=','identifiers_master.id')
		->where('notes_regulations.type_flg','R')
		->orderBy('notes_regulations.form_identifier');
		if(CRUDBooster::myPrivilegeId() == 3){
			$results = $resultsRegulation->where('tag_with',0)->orWhere('tag_with',1);
		}else{
			$results = $resultsRegulation->where('tag_with',0)->orWhere('tag_with',2);
		}

		$data['result'] = $results->get();	

			//pd($data);
		return view('guideline-instruction',$data);
	} 

}