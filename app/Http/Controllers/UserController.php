<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(){
    $users=User::all();
    return view('users.index',compact('users'));
}
    public function edit(User $user){
    return view('users.edit', compact('user'));
    }

    public function update(Request $request,User $user){
        $data=$request->only(['name','email']);
        $user->fill($data);
        $user->save();
        return redirect("users/index")->with('message','user updated successfully');
    }

}