<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ForgotPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{

    public function forgot_password()
    {
        return view('auth.password.forgot', [
            'title' => 'Forgot Password',
            'breadcrumb' => []
        ]);
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $forgot = ForgotPassword::where('user_id', $user->id)->first();

        if ($user && $forgot) {
            if (($forgot->question == $request->question) && ($forgot->answer == $request->answer)) {
                session(['user_id' => $user->id]);
                return redirect()->route('password.new')->with('success', $user->id);
            }
        } else {
            return redirect()->back()->with('error', 'Failed wrong answer or question.');
        }
    }

    public function new_password()
    {
        return view('auth.password.new', [
            'title' => 'New Password',
            'breadcrumb' => []
        ]);
    }

    public function store_new(Request $request)
    {
        $user_id = $request->session()->pull('user_id');
        $validated = $request->validate(
            [
                'password'          =>      ['required',],
                'password_confirmation'  =>      ['required', 'same:password'],
            ]
        );

        $user = User::where('id', $user_id)->first();
        $user->password = $request->password;
        $user->update();
        $user->save();

        return redirect()->route('login');
    }
}
