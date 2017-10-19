<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'birthday', 'nationality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function add($request)
    {
        $user = new User();
        $user->email = str_replace('%40','@',$request->email);
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->nationality = $request->nationality;
        $user->save();
    }

    public static function edit($request, $id)
    {
        $user = User::findOrFail($id);
        if (isset($request->password) && !empty($request->password)) {
          $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->nationality = $request->nationality;
        $user->save();
    }
}
