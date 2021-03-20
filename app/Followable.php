<?php

namespace App;

use App\Models\User;

trait Followable
{
    public function follow(User $user)   // action to follow a user
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)   // action to unfollow a user
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->following($user))   // $this = auth()->user()
        { 
            return $this->unfollow($user);
        } 
        
        return $this->follow($user);  // have the authenticated user follow the given user
    }

    public function follows() // Relationship between user and followers (58)
    {
        // (58)
        // $this is needed in laravel 8 and as a 
        // 2nd argument give the name of the table which is follows in this case
        // 3rd and 4th arguments are Pivot keys: foreign and related
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)  // check if following user is following a user (62)
    {
        // return $this->follows->contains($user);  
        // Above and Below are same things. Below method is more optimized (62)
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }
}
