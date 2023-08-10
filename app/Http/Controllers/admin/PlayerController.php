<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Player;

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

        session(['teams' => $team]);
        
        return view('admin.pages.player.viewTeamPlayer', compact('teamPlayers'));
    }

    public function add()
    {
        $teams = session('teams');
        $team = Teams::all();
        return view('admin.pages.player.create', compact('team', 'teams'));
    }

    public function store(Request $request)
    {
        $teams = session('teams');

        $players = $request->all();
        $players['team_id'] = $request->input('team_id');
        $players['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $teams = Teams::all();
                return view('admin.pages.player.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $photoName = $file->getClientOriginalName();
            $file->move('css/ui/images', $photoName);
        }else
        {
            $photoName = null;
        }

        if($request->hasFile('nationality'))
        {
            $file = $request -> file('nationality');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $teams = Teams::all();
                return view('admin.pages.player.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $natName = $file->getClientOriginalName();
            $file->move('css/ui/images', $natName);
        }else
        {
            $natName = null;
        }

        $players['photo'] = $photoName;
        $players['nationality'] = $natName;

        Player::create($players);
        return redirect()->route('admin.player.viewTeamPlayer', ['slug' => $teams->slug]);
    }
}
