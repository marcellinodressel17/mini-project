<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class ExploreController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())
                     ->paginate(50);

        return view('explore', [
            'users' => $users,
        ]);
    }
}
