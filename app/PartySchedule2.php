<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class PartySchedule2 extends Model
{    
    use Scopes;
    protected $table = 'party_schedule2';

}
