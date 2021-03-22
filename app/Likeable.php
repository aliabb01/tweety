<?php

namespace App;

use App\Models\User;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLikes(Builder $query)  // (67) the query to return the number of likes. Use withLikes as a function
    {
        $query->leftJoinSub(   // (67)
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like($user = null, $liked = true)  // (67) like a tweet
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),  // (67) was there user variable passed, if yes get me the id of passed user, otherwise, look to the session and get me the id of authenticated user
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function dislike($user = null)  // (67) dislike a tweet
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user) // checking if a specific tweet is liked by a user
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user) // checking if a specific tweet is disliked by a user
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function likes() // (67) Relationship between tweet and likes models
    {
        return $this->hasMany(Like::class);
    }
}
