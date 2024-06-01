<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Tweet;

class BookmarkController extends Controller
{
    public function store(Request $request, Tweet $tweet)
    {
        $userId = auth()->id();
        $tweetId = $tweet->id;

        if (Bookmark::where('user_id', $userId)->where('tweet_id', $tweetId)->exists()) {
            return back()->with('error', 'Tweet sudah dibookmark sebelumnya.');
        }

        Bookmark::create([
            'user_id' => $userId,
            'tweet_id' => $tweetId,
        ]);

        return back()->with('success', 'Tweet telah dibookmark.');
    }

    public function index()
    {
        $bookmarkedTweets = auth()->user()->bookmarkedTweets;
        return view('bookmarks', compact('bookmarkedTweets'));
    }
}

