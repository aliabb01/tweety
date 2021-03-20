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
}
