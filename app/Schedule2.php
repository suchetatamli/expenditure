<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class Schedule2 extends Model
{
    //
    use Scopes;
    
    protected $table = 'schedule2';
    protected $guarded = [];

    public function bank_register()
    {
        return $this->belongsTo('App\BankRegister','bank_reg_id');
    }
}
