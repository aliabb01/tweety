<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)  // like a tweet (67)
    {
        $tweet->like(current_user());
        return back();
    }

    public function destroy(Tweet $tweet)  // dislike a tweet (67)
    {
        $tweet->dislike(current_user());
        return back();
    }
}
