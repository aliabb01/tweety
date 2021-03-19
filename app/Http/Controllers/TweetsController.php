<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        // $tweets = Tweet::latest()->get(); 

        return view('home', [
            'tweet' => auth()->user()->timeline()  // User model has a timeline function
        ]);
    }
    
    //
    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']  // this is same as " request('body') " (57)
        ]);

        return redirect('/home');
    }
}
