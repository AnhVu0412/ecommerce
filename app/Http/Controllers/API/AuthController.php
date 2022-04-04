<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        if($validator->fails()){
            return response()->json([
                'validation_error' =>$validator->messages(),
            ]);
        }else{
            $user = User::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>$request->password,
                'city' =>$request->password,
                'address' =>$request->address,
                'phone' =>$request->phone,
                'country' =>$request->country,

            ]);
            $token = $user->createToken($user->email.'_Token')->plainTextToken;
            return response()->json([
                'status'=>200,
                'username'=>$user->name,
                'token'=>$token,
                'message'=>'register successfully'
            ]);
        }
    }
}
