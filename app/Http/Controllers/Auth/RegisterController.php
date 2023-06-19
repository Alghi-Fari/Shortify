<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ForgotPassword;


class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register', [
            'title' => 'Register',
            'breadcrumb' => []
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'username'          =>      ['required', 'string', 'unique:users,username'],
                'email'             =>      ['required', 'email', 'unique:users,email'],
                'password'          =>      ['required',],
                'password_confirmation'  =>      ['required', 'same:password'],
                'answer'            =>      ['required', 'regex:/^\S*$/u'],
                'question'          =>      ['required']
            ]
        );

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        $user_forgot = ForgotPassword::create([
            'question'  => $request->question,
            'answer'    => $request->answer,
            'user_id'   => $user->id,
        ]);

        return redirect('/login')->back()->with('success', 'Account created successfully.');
    }
}
