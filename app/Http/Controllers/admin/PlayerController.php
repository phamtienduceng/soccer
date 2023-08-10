<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;

class PlayerController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view('admin.pages.player.index', compact('teams'));
    }

    public function viewTeamPlayer($slug)
    {
        $team = Teams::where('slug', $slug)->first();
        $teamPlayers = $team->players;
        
        return view('admin.pages.player.viewTeamPlayer', compact('teamPlayers'));
    }
}
