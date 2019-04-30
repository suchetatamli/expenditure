<?php namespace App\Customs;

use Illuminate\Validation\Validator;

class Validators extends Validator
{

      public function validateMyFunction($attribute, $value, $parameters)
      {
	//echo "here"; die;
	
        //return (substr($value,-10,10)!="@gmail.com"); 
	return false;
         //return boolen - true or false
      }

}
