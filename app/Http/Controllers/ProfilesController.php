<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule; // (64) This is need in order to make Rule::unique() work

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

    public function update(User $user)
    {
        // dd(request('avatar'));  (64) this returns UploadedFile instance
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],  // (64) Rule::unique basically selects unique username from users table and when updating users own profile it ignores that editing user to prevent update blocking 
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['required', 'file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'], // (64) 'confirmed' looks for password_confirmation
        ]);

        $attributes['avatar'] = request('avatar')->store('avatars');  // (64) uploaded file is being saved in storage->app->public->avatars. By default it is storage->app->avatars. You change it by adding FILESYSTEM_DRIVER in env file. In addition command: php artisan storage:link creates a symlink for the uploaded images in public folder under public->storage

        $user->update($attributes);  // (64) Update user information according to the attributes variable above

        return redirect($user->path());  // (64) Redirect back to user profile page
    }
}
