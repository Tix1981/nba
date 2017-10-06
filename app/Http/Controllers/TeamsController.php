<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {

        $teams = Team::all();

        return view('teams.index', compact('teams'));

    }

    public function show($id) {

        $team = Team::with('players', 'comments.user')->find($id);

        return view('teams.show', compact('team'));
        
    }
}
