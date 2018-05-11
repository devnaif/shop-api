<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if($validator->fails())
        {
            return $this->respondInvalidRequest();
        }
        $credentials = $request->only(['email', 'password']);
        try
        {
            if( ! $token = JWTAuth::attempt($credentials) )
            {
                return $this->respondInvalidRequest();
            }
        }
        catch(JWTException $e)
        {
            return $this->respondInternalError();
        }
        return $this->respond(compact('token'));
    }
   
}
