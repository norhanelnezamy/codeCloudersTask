<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
      if (Auth::check()) {
        return redirect('/');
      }
      return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
      if (Auth::attempt([ 'email' => $request->email , 'password' => $request->password ])) {
        return redirect('user');
      }
      return redirect()->back()->with('msg', 'Invalide E-mail or Password .');
    }

    public function getRegister(){
      if (Auth::check()) {
        return redirect('/');
      }
      return view('register');
    }

    public function postRegister(UserRequest $request)
    {
      User::add($request);
      return redirect('user')->with('msg', 'Account is created .');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
