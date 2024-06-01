<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;

class TweetController extends Controller
{

	public function index(){
        $user = Auth::user();
        $tweets = $user->timeline(); 
    
        return view('tweets.index', [
            'user' => $user,
            'tweets' => $tweets
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'body' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
       
        if ($request->hasFile('image')) {
            $filenameWithExtension = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('public', $filenameWithExtension);
            $imagePath = str_replace('public/', '', $imagePath); 
        }
        $tweet = new Tweet([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $imagePath ?? null,
        ]);
        $tweet->save();
    
        return redirect()->route('home');
    }
    
}
