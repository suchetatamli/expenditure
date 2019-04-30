<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class PartySchedule7 extends Model
{    
    use Scopes;
    protected $table = 'party_schedule7';

    // public function scopeFilterData($query)
    // {	
    // 	$candidate_details	= 	getMyDetails('');	

    //     return $query->where('user_id',$candidate_details->id)
    //     			 ->where('election_id',$candidate_details->election_id)
    //     			 ->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])
    //     			 ->orderBy('date','desc');
    // }

}
