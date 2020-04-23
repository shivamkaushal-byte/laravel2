<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Request\users\UpdateProfileRequest;

class UserController extends Controller
{

  public function index(){
    return view('user.index')->with('users',user::all());
  }
    //
  public function make($userid){
    $user = user::find($userid);
    $user->role = 'admin';
    $user->save();
    return redirect('/User');
  }
  public function edit(){
    return view('user.edit')->with('user', auth()->user());
  }

  // public function  update(UpdateProfileRequest $request){
  //  $user = auth()->user();
  //  $user->update([
  //    'name' => $request->name,
  //    'email' => $request->email,
  //  ]);
  //  return redirect()->back();
  // }
}
