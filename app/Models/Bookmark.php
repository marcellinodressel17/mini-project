<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    protected $fillable = ['user_id', 'tweet_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public static function isBookmarked($tweetId, $userId)
    {
        return self::where('tweet_id', $tweetId)
                    ->where('user_id', $userId)
                    ->exists();
    }
}

