<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user){
    	auth()->user()->toggleFollow($user);

    	return back();
    }

    public function followBack(User $user)
    {
        auth()->user()->toggleFollow($user);

        return back();
    }

    public function followers(User $user)
    {
        $followers = $user->followers()->paginate(10);
        return view('followers', compact('followers', 'user'));
    }

    public function following(User $user)
    {
        $following = $user->follows()->paginate(10);
        return view('following', compact('following', 'user'));
    }
    
}
