<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function update(User $user){

        $formData = request()->validate([
            'description' => ['required', 'string', 'max:255']
        ]);

        $user->profile->update($formData);

        $user->push();

        return redirect('/home');
    }

}
