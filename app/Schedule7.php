<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class Schedule7 extends Model
{
	use Scopes;
    
    protected $table = 'schedule7';
    public $timestamps = false;
    protected $guarded = ['id'];

}
