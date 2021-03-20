<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user) // (60)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // Two ways of stopping editing profile of others (/edit) through writing url (63)

        // First way of doing it  (63)
        // if($user->isNot(current_user())){  
        //     abort(404);
        // }

        // Second way of doing it  (63)
        // abort_if($user->isNot(current_user()), 404);

        // Another way of doing the same thing however, this time it returns an error of 403
        //$this->authorize('edit', $user);  (63)
        //Finally this was done in routes (63)

        return view('profiles.edit', compact('user'));
    }
}
