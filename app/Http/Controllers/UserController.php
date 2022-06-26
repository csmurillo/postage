<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function update(Request $request){
        $user=Auth::user();
        $validateValues=$this->validate($request,[
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'], 
            'username' => ['required', 'string', 'max:255', 'unique:users'],           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user->firstname=$validateValues['firstname'];
        $user->lastname=$validateValues['lastname'];
        $user->username=$validateValues['username'];
        $user->email=$validateValues['email'];

        // return 
        // return redirect('/home');
    }
}
