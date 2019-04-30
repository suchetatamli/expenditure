<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class PartySchedule1 extends Model
{    
    use Scopes;
    protected $table = 'party_schedule1';

    public function party_transaction_register()
    {
        return $this->belongsTo('App\PartyTransactionRegister','party_transaction_register');
    }
}
