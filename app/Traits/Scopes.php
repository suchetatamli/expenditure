<?php
namespace App\Traits;
 
trait Scopes
{
    public function scopeFilterPartyScheduleData($query)
    {	
    	$candidate_details	= 	getMyDetails('');	
   		
        return $query->where('user_id',$candidate_details->id)
        			 ->where('election_id',$candidate_details->election_id)
        			 ->whereBetween('date',[$candidate_details->nomination_date,$candidate_details->date_result])
        			 ->orderBy('date','asc');
    }

    public function scopeFilterPartyTransactionData($query)
    {	
    	$candidate_details	= 	getMyDetails('');	
        $election_details   =   getElectionDates();
   		
        return $query->where('user_id',$candidate_details->id)
        			 ->where('election_id',$candidate_details->election_id)
        			 ->whereBetween('tran_date',[$election_details->date_of_announcement,$election_details->date_of_completion]);
    }

    public function scopeFilterOnlyPartyTransactionData($query)
    {   
        $candidate_details  =   getMyDetails('');   
        $election_details   =   getElectionDates();
        
        return $query->where('user_id',$candidate_details->id)
                     ->where('election_id',$candidate_details->election_id)
                     ->whereBetween('date',[$election_details->date_of_announcement,$election_details->date_of_completion]);
    }
}