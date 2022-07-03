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

        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
        ]);

        $user->update($data);

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

    public function destroy(User $user){
        // check if correct user
        $authUserId=auth()->user()->id;
        $userTobeDeleteId=$user->id;
        if($authUserId==$userTobeDeleteId){
            $user->delete();
            return redirect('/');
        }
        else{
            abort(403, 'Unauthorized Action');
        }

    }
    
}

