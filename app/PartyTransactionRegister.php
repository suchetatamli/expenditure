<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class PartyTransactionRegister extends Model
{    
    use Scopes;
    protected $table = 'party_transaction_register';

}
