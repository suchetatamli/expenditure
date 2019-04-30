<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;
use App\Customs\Validators;

class ValidatorServiceProvider extends ServiceProvider
{

      public function boot()
      {
           Validator::resolver(function($translator, $data, $rules, $messages){
                return new Validators($translator, $data, $rules, $messages);
           });
      }


      public function register()
      {

      }
}
