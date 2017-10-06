<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create () {

        return view('login.create');

    }

    public function store () {

        if(!auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors(['message' => 'Bad credentials. Please try again']);

        } else {

            if(auth()->user()->is_verified) {

                return redirect()->route('homepage');

            } else {

                $this->destroy();

                return back()->withErrors(['message' => 'You are not verified, please check your email for verification!']);

            }
        }
    }

    public function verification ($id) {

        $user = User::find($id);

        $user->is_verified = true;
        $user->save();

        return view('login.verification', compact('user'));

    }

    public function destroy () {

        auth()->logout();

        return redirect()->route('homepage');

    }
}
