<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller {
    public function create() {
        return view('auth.login');
    }

    public function store() {
        $userAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($userAttributes)) {
            throw ValidationException::withMessages([
                "message" => "Invalid credentials provided."
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
