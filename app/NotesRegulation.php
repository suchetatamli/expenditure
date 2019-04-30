<?php

namespace App;
use App\Identifiers_master;

use Illuminate\Database\Eloquent\Model;

class NotesRegulation extends Model
{
	function identifier(){
        return $this->belongsToMany('App\Identifiers_master','form_identifier');
    }
}
