<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create () {

        return view('login.create');

    }

    public function store () {

        if(!auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors(['message' => 'Bad credentials. Please try again']);

        } else {

            return redirect()->route('homepage');

        }

    }

    public function destroy () {

        auth()->logout();

        return redirect()->route('homepage');

    }
}
