<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbidden-comment')->only('store');
    }

    public function store (Request $request, $team_id) {

        $request->validate(
            [
                'content' => 'required | min:10'
            ]
        );

        $team = Team::find($team_id);

        Comment::create([
            'content' => $request->get('content'),
            'team_id' => $team->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('single-team', ['id' => $team_id]);

    }
}
