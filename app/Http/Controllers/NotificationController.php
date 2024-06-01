<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\Like;

class NotificationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $followNotifications = Follow::where('following_user_id', $userId)
                                     ->with('user')
                                     ->get()
                                     ->map(function ($notif) {
                                         return [
                                             'type' => 'follow',
                                             'user' => $notif->user,
                                             'date' => $notif->created_at,
                                         ];
                                     });
                                     

        $likeNotifications = Like::whereHas('tweet', function ($query) use ($userId) {
                                     $query->where('user_id', $userId);
                                 })
                                 ->with('user', 'tweet')
                                 ->get()
                                 ->filter(function ($notif) use ($userId) {
                                     return $notif->user_id !== $userId;
                                 })
                                 ->map(function ($notif) {
                                     return [
                                         'type' => 'like',
                                         'user' => $notif->user,
                                         'date' => $notif->created_at,
                                         'tweet' => $notif->tweet,
                                     ];
                                 });

        $notifications = $followNotifications->merge($likeNotifications)
                                             ->sortByDesc('date');

        return view('notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function followBack($userId)
    {
        $user = Auth::user();
        $userToFollow = User::findOrFail($userId);

        if (!$user->isFollowing($userToFollow)) {
            $user->follow($userToFollow);
        }

        return redirect()->back()->with('success', 'Anda mulai mengikuti ' . $userToFollow->name);
    }
}
