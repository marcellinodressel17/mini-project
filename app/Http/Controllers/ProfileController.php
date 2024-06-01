<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweet()->withLikes()->paginate(15),
        ]);
    }
    

    public function edit(User $user){
    	
    	return view('profiles.edit', compact('user'));
    }

  public function makeHash($value)
{
    return  bcrypt($value);
}



public function update(User $user)
{
    $attributes = request()->validate([
        'username' => [
            'string',
            'required',
            'max:255',
            'alpha_dash',
            Rule::unique('users')->ignore($user),
        ],
        'name' => ['string', 'required', 'max:255'],
        'avatar' => ['file'],
        'email' => [
            'string',
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user),
        ],
        'password' => [
            'string',
            'required',
            'min:8',
            'max:255',
            'confirmed',
        ],
    ]);

    $attributes['password'] = $this->makeHash($attributes['password']);

    if (request('avatar')) {
       
        $filename = request('avatar')->getClientOriginalName();
        request('avatar')->storeAs('images', $filename);
        
        $attributes['avatar'] = $filename;
    }

    $user->update($attributes);

    return redirect($user->path());
}

public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|string|max:255|alpha_dash|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/login');
    }

}

