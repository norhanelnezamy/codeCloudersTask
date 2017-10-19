<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\User;
use Validator;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:60',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|alpha_num|between:6,12',
        'birthday' => 'required|date',
        'nationality' => 'required',
        'gender' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }
    User::add($request);
    return response()->json(['msg' => 'User added'], 200);
  }

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }
    try {
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'invalid_credentials'], 200);
        }
    } catch (JWTException $e) {
        // something went wrong whilst attempting to encode the token
        return response()->json(['error' => 'could_not_create_token'], 200);
    }
    // all good so return the token
    return response()->json(['token' => $token], 200);
  }

  public function user($token)
  {
    return response()->json(mobileAuth($token));
  }

}
