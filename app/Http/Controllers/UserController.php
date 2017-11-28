<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user) {
        return view('user.show', compact('user'));
    }
    public function update(User $user) {
        $this -> validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'dob' => 'required|date',
            'gender' => 'required',
        ]);
        if(auth()->id()==$user->id) {
            $user->name = request()->get('name');
            $user->email = request()->get('email');
            $user->dob = request()->get('dob');
            $user->gender = request()->get('gender');
            $user->save();
            session()->flash('message', 'Your details have been saved.');
            return back();
        }
    }
}
