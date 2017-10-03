<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    public function show ($id) {

        $player = Player::find($id);

        return view('players.show', compact('player'));

    }
}
