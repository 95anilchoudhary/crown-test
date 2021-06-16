<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function register(Request $request){ 

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        
        $user['token'] = $user->createToken('crowntest')->accessToken;
        
        return response()->json($user,200);  
    }

    //login //

    public function login(Request $request){ 
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
           
            $user['token'] = $user->createToken('crowntest')->accessToken;
           
            
            return response()->json($user,200);

        }else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }
    }
 
}
