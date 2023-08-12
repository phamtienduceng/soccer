<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        
        return view('admin.pages.player.viewTeamPlayer', compact('team', 'teamPlayers'));
    }

    public function playerStat()
    {
        $player = Player::all();

        
        return view('admin.pages.player.playerStat', compact('player'));
    }

    public function sortStat(Request $request)
    {
        $sortBy = $request->input('sort_by');

        if ($sortBy === 'name') {
            $player = Player::orderBy('player_name')->get();
        } elseif ($sortBy === 'goals') {
            $player = Player::orderByDesc('goals')->get();
        } elseif ($sortBy === 'assists') {
            $player = Player::orderByDesc('assists')->get();
        } else {
            // Xử lý khi không có sắp xếp được chọn
            abort(400, 'Invalid sort option');
        }

        return view('admin.pages.player.playerStat', compact('player'));
    }

    public function searchStat(Request $request)
    {
        $searchTerm = $request->input('search');

        $player = Player::where('player_name', 'LIKE', "%$searchTerm%")
            ->orWhere('position', 'LIKE', "%$searchTerm%")
            ->orWhereHas('team', function ($query) use ($searchTerm) {
                $query->where('team_name', 'LIKE', "%$searchTerm%");
            })
            ->get();

        return view('admin.pages.player.playerStat', compact('player'));
    }

    public function viewAllPlayer()
    {
        $player = Player::all();
        
        return view('admin.pages.player.viewAllPlayer', compact('player'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = session('teams');
        $team = Teams::all();
        return view('admin.pages.player.create', compact('team', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teams = session('teams');
        $teamId = $request->input('team_id');
        $clubNumber = $request->input('club_number');

        $existingPlayer = Player::where('team_id', $teamId)->where('club_number', $clubNumber)->first();

        if ($existingPlayer) {
            $teams = session('teams');
            return view('admin.pages.player.create', compact('teams'))->with('error', 'trung so ao');
        }else{
            
            $teams = session('teams');
            $players = $request->all();
            $players['team_id'] = $request->input('team_id');
            $players['slug'] = \Str::slug($request->title);
            $teamSlug = $teams->slug;

            if($request->hasFile('player_photo'))
            {
                $file = $request -> file('player_photo');
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

            $players['player_photo'] = $photoName;
            $players['nationality'] = $natName;

            Player::create($players);
            return redirect()->route('admin.player.viewTeamPlayer', ['slug' => $teamSlug]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $teams = session('teams');
        $team = Teams::all();
        return view('admin.pages.player.edit', compact('teams', 'team', 'player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $teams = session('teams');
        $teamId = $request->input('team_id');
        $clubNumber = $request->input('club_number');

        $existingPlayer = Player::where('team_id', $teamId)->where('club_number', $clubNumber)->first();

        if ($existingPlayer) {
            $teams = session('teams');
            return view('admin.pages.player.create', compact('teams'))->with('error', 'trung so ao');
        }else{
            
            $teams = session('teams');
            $players = $request->all();
            $players['team_id'] = $request->input('team_id');
            $players['slug'] = \Str::slug($request->title);
            $teamSlug = $teams->slug;

            if($request->hasFile('player_photo'))
            {
                $file = $request -> file('player_photo');
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
                $photoName = $player->player_photo;
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
                $natName = $player->nationality;
            }

            $players['player_photo'] = $photoName;
            $players['nationality'] = $natName;

            $player->update($players);
            return redirect()->route('admin.player.viewTeamPlayer', ['slug' => $teamSlug]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
