<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class PartySchedule20 extends Model
{    
	use Scopes;
    protected $table = 'party_schedule20';
}
