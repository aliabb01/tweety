<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable; // followable is a trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute() // returns the specified attribute (57)
    {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }

    public function timeline()  // Shows users timeline (57)
    {
        // include all of the user's tweets
        // as well as the tweets of everyone
        // they follow. In descending order by date (59)

        $friends = $this->follows()->pluck('id');  // return the id's of the people that are followed by the current user
        //$ids->push($this->id);  // push the current user's id to the above list. In short, create a list of ids that consist of id of the current user and whoever he follows

        return Tweet::whereIn('user_id', $friends)  // return the user_id columns that match $ids variable, sort them by latest
            ->orWhere('user_id', $this->id) // and return a user id which matches the current users id
            ->latest()->get();  
    }

    public function tweets()  // returns a users tweets
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    // Can be added directly to web routes in laravel 7 or above
    // public function getRouteKeyName()  //  OVERRIDING Route-Model binding with a specific column in our case with name (60)
    // {
    //     return 'name';    
    // }

    public function path($append='')   // return the route for profile name (62) 
    {
        $path = route('profile', $this->name);
        return $append ? "{$path}/{$append}" : $path;  // check if append argument is applied, if yes then append it to the path otherwise, just return the path
    }
}
