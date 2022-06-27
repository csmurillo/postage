<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    

    public function update(User $user){
        // $user=User::find($user->id);

        // $formFields=$request->validate($request,[
        //     'firstname' => ['required', 'string', 'max:255'],
        //     'lastname' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'max:255', 'unique:users'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // ]);
        // $user = User::save($formFields);
        // $user->firstname=$formFields['firstname'];
        // $user->lastname=$formFields['lastname'];
        // $user->username=$formFields['username'];
        // $user->email=$formFields['email'];

        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
        ]);

        $user->update($data);

        // $user->update([
        //         'firstname'=>request()->firstname,
        //         'lastname'=>request()->lastname,
        //         'username'=>request()->username,
        //         'email'=>request()->email
        // ]);

        return redirect('/home');
    }

    public function updatePassword(User $user){

        $data = request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $data['password']=bcrypt($data['password']);
        $user->update($data);

        return redirect('/home');
    }
}


