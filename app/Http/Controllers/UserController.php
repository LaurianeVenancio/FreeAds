<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function show(User $user)
    {   
        return view('users.show',  compact('user'));
    }

    public function edit(User $user)
    {
        $settings = json_decode($user->settings);
        return view ('users.edit', compact('user', 'settings'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
        ]);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        return view('users.show', compact('user'));
    }
    
}
