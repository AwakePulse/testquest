<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserProfileUpdateController extends Controller
{
    public function index(User $user)
    {
        $data = \request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user->update($data);
        return redirect()->route('user.profile', $user->id);
    }
}
