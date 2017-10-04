<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create () {

        return view('register.create');

    }

    public function store (Request $request) {

        $request->validate(
            [
                'name' => 'required | min:6',
                'email' => 'required | email',
                'password' => 'required | confirmed:password_confirmation | min:6'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('homepage');

    }
}
