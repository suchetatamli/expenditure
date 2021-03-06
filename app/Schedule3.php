<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class Schedule3 extends Model
{
    //
    use Scopes;
    
    protected $table = 'schedule3';
    protected $guarded = [];

    public function bank_register()
    {
        return $this->belongsTo('App\BankRegister','bank_reg_id');
    }
}
