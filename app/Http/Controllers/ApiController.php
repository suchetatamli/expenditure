<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //
    public function __construct()
    {

    }

    public function access(Request $request){
        echo "rajarshi";
    }

    public function create(Request $request){
        $params = $request->all();
        //print_r($params);die();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => 'required|numeric',
            'username' => 'required',
            // 'dob' => 'required|numeric',
            // 'email' => 'required|email',
            // 'whatsapp' => 'required|numeric',
            // 'mobile' => 'required|numeric',
            // 'address' => 'required',
        ]);
        
        //print_r($params); die();

        if ($validator->fails()) {
            echo "Problem";
        } else {
            $params = array(
                    'locale_id' => 1,
                    'religion_id' => $this->getReligionId(trim(request('religion'))),
                    'gender_id' => $this->getGenderId(trim(request('gender'))),
                    'id_cms_privileges' => 5,
                    'whatsapp_no' => request('whatsapp'),
                    'phone' => request('mobile'),
                    'landline' => request('landline'),
                    'address' => request('address'),
                    'name' => trim(request('name')),
                    'username' => trim(request('username')),
                    'user_id_mainsite' => request('user_id'),
                    'photo' => trim(request('photo')),
                    'dob' => request('dob'),                    
                    'email' => trim(request('email')),
                    'password' => bcrypt(request('password')),
                    'constituency' => request('constituency'),
                    'city' => request('city'),
                    'state' => request('state'),
                    'pincode' => request('pincode'),
                    'status' => 'Active'  
                );
            $user = User::create($params);
            echo "Success";
            //return $this->issueToken($request, 'password');
        } //die('ppppp');

        //return $params;
    }

    public function getGenderId($gender){
        if(strtolower($gender) == 'male') return 1;
    }

    public function getReligionId($religion){
        return 1;
    }
}
