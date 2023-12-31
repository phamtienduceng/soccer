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

        return view('admin.pages.team.index', compact('teams'));
    }

    public function add()
    {
        $team = Teams::all();

        return view('admin.pages.team.create', compact('team'));
    }

    public function store(Request $request)
    {
        $team = new Teams();
        $team->team_name = $request->team_name;
        $team['slug'] = \Str::slug($request->team_name);

        if ($request->has('isPremierLeague')) {
            $team->isPremierLeague = $request->isPremierLeague;
        }

        if ($request->has('isFA')) {
            $team->isFA = $request->isFA;
        }

        if ($request->has('isCommunityShield')) {
            $team->isCommunityShield = $request->isCommunityShield;
        }


        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $logoPath = 'public/images/Logo/Logo Icon/';
            $logo->storeAs($logoPath, $logo_name);
            $team->logo = 'images/Logo/Logo Icon/' . $logo_name;

        if($request->hasFile('logo'))
        {
            $file = $request -> file('logo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $team = Teams::all();
                return view('admin.pages.team.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $logo = $file->getClientOriginalName();
            $file->move('css/ui/images', $logo);
        }else
        {
            $logo = null;

        }

        $team['logo'] = $logo;
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team created successfully!');
    }
}

    public function update(Request $request, $id)
    {
        $team = Teams::findOrFail($id);

        $team->team_name = $request->team_name;

        if ($request->has('isPremierLeague')) {
            $team->isPremierLeague = $request->isPremierLeague;
        } else {
            $team->isPremierLeague = 'inactive';
        }

        if ($request->has('isFA')) {
            $team->isFA = $request->isFA;
        } else {
            $team->isFA = 'inactive';
        }

        if ($request->has('isCommunityShield')) {
            $team->isCommunityShield = $request->isCommunityShield;
        } else {
            $team->isCommunityShield = 'inactive';
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $logoPath = 'public/images/Logo/Logo Icon/';
            $logo->storeAs($logoPath, $logo_name);
            $team->logo = 'images/Logo/Logo Icon/' . $logo_name;
        }

        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team updated successfully!');
    }

    public function show($id)
    {
        $team = Teams::findOrFail($id);

        return view('admin.pages.team.show', ['team' => $team]);
    }
}
