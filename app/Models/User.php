<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'password',
        'provider_id',

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

    public function tweet(){
        return $this->hasMany(Tweet::class)->latest();
    }

        public function timeline(){

            $ids = $this->follows()->pluck('id');
            $ids->push($this->id);

           return Tweet::whereIn('user_id',$ids)->withLikes()->latest()->paginate(50);
    }

    public function getAvatarAttribute($value)
    {
       
        if ($value && filter_var($value, FILTER_VALIDATE_URL)) {
            return $value; 
        }
        
        return asset('images/' . $value);
    }
    
    public function getBgImage(){
        return "https://picsum.photos/700/223";
    }
    
    
    public function follow(User $user){

        return $this->follows()->save($user);
    }

    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function following(User $user){

       return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
}

public function isFollowedBy($user)
{
    return $this->followers()->where('user_id', $user->id)->exists();
}

   public function toggleFollow(User $user){
        $this->follows()->toggle($user);
   }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

     public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarkedTweets()
    {
        return $this->belongsToMany(Tweet::class, 'bookmarks', 'user_id', 'tweet_id');
    }
    

}
