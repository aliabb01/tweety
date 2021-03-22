<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function __invoke()  // (65) was index.  // (66) it is changed to __invoke
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}
