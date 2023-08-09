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
        $team = new Teams();

        $team->team_name = $request->team_name;

        if ($request->has('isPremierLeague')) {
            $team->isPremierLeague = $request->isPremierLeague;
        }

        if ($request->has('isFA')) {
            $team->isFA = $request->isFA;
        }

        if ($request->has('isCommunityShield')) {
            $team->isCommunityShield = $request->isCommunityShield;
        }

        if ($request->has('logo')) {
            $team->logo = $request->logo;
        }
        $team->logo = 'Null';

        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team created successfully!');
    }

    public function update(Request $request, $id)
    {
        $team = Teams::findOrFail($id);

        $team->team_name = $request->team_name;

        if ($request->has('isPremierLeague')) {
            $team->isPremierLeague = $request->isPremierLeague;
        }

        if ($request->has('isFA')) {
            $team->isFA = $request->isFA;
        }

        if ($request->has('isCommunityShield')) {
            $team->isCommunityShield = $request->isCommunityShield;
        }

        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team updated successfully!');
    }
}



