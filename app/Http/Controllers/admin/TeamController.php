<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teams;
use App\Models\Tournaments;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Teams::all();
        $tournament = Tournaments::all();
        
        return view('admin.pages.team.index', compact('teams', 'tournament'));
    }

    public function add()
    {
        $team = Teams::all();
        $tournament = Tournaments::all();

        return view('admin.pages.team.create', compact('team', 'tournament'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'tournament_id' => 'required',
        ]);
    
        // Create the team
        Teams::create($request->all());

        return redirect()->route('admin.team.index');
    }
    
}
