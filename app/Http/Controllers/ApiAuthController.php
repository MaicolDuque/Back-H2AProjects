<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth; 
use App\User;

class ApiAuthController extends Controller
{
    public function UserAuth(Request $resquest){       
        $credentials = $resquest->only('email', 'password');       
        $token = null;
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials']);
            }
        }catch(JWTException $ex){
            return response()-json(['error' => 'something went wrong!'], 500);
        }
        $user = User::where('email',$credentials['email'])->first();
        //$group = $user->group;
        return response()->json(compact('token','user'));
    }
}
