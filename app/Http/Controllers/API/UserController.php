<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Validator;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::paginate(15);
    return response()->json(['users' => $users], 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
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

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:60',
        'email' => 'required|email|unique:users,email',
        'password' => 'alpha_num|between:6,12',
        'birthday' => 'required|date',
        'nationality' => 'required',
        'gender' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }
    User::edit($request, $id);
    return response()->json(['msg' => 'User data updated'], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    User::findOrFail($id)->delete();
    return response()->json(['msg' => 'User deleted'], 200);
  }

}
