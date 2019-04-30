<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Scopes;

class Schedule8 extends Model
{
	use Scopes;

    protected $table = 'schedule8';
    public $timestamps = false;
    protected $guarded = [];
}
