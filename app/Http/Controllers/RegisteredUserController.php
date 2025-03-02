<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller {
    public function create() {
        return view('auth.register');
    }

    public function store() {
        $userAttributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'password' => [Password::min(8)->max(255)->symbols()->mixedCase(), 'confirmed'],
        ]);

        $user = User::create($userAttributes);
        Auth::login($user);

        return redirect('/');
    }
}
