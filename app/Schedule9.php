<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class Schedule9 extends Model
{
	use Scopes;
	
    protected $table = 'schedule9';
    public $timestamps = false;
    protected $guarded = [];
}
