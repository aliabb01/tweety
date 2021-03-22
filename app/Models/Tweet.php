<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Like;
use App\Likeable;

class Tweet extends Model
{
    use HasFactory, Likeable; // likeable is trait

    protected $guarded = [];

    public function user()  // tweet->user relationship
    {
        return $this->belongsTo(User::class);
    }

    
}
