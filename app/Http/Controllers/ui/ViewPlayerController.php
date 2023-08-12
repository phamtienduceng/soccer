<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Player;

class ViewPlayerController extends Controller
{
    public function index()
{
$team = Teams::all();
$players = Player::inRandomOrder()->get();
$positions = Player::pluck('position')->unique();
return view('ui.pages.players', compact('players', 'team', 'positions'));
}
    
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $positions = Player::pluck('position')->unique();
        $team = Teams::all();
        $players = Player::where('player_name', 'like', '%' . $searchTerm . '%')->get();
    
        // Lưu giá trị search vào session
        $request->session()->put('searchTerm', $searchTerm);
    
        return view('ui.pages.players', compact('players', 'searchTerm', 'team', 'positions'));
    }

    
    public function sort(Request $request)
{
    $sortBy = $request->input('sort_by');
    $positions = Player::pluck('position')->unique();
    $team = Teams::all();

    // Lấy các giá trị đã lọc từ session
    $selectedClubs = $request->session()->get('selectedClubs');
    $selectedPositions = $request->session()->get('selectedPositions');

    $playersQuery = Player::query();

    if ($selectedClubs) {
        $playersQuery->whereIn('team_id', $selectedClubs);
    }

    if ($selectedPositions) {
        $playersQuery->whereIn('position', $selectedPositions);
    }

    if ($sortBy === 'name') {
        $playersQuery->orderBy('player_name');
    } elseif ($sortBy === 'goals') {
        $playersQuery->orderBy('goals', 'desc');
    } elseif ($sortBy === 'assists') {
        $playersQuery->orderBy('assists', 'desc');
    }

    $players = $playersQuery->get();

    // Lưu giá trị sort_by vào session
    $request->session()->put('sortBy', $sortBy);

    return view('ui.pages.players', compact('players', 'team', 'positions'));
}
    
    public function filter(Request $request)
    {
        $team = Teams::all();
    
        $selectedClubs = $request->input('club');
        $selectedPositions = $request->input('position');
    
        $positions = Player::pluck('position')->unique(); // Lấy danh sách các vị trí từ cơ sở dữ liệu
    
        $playersQuery = Player::query();
    
        if ($selectedClubs) {
            $playersQuery->whereIn('team_id', $selectedClubs);
        }
    
        if ($selectedPositions) {
            $playersQuery->whereIn('position', $selectedPositions);
        }
    
        $players = $playersQuery->get();
    
        // Lưu các giá trị club và position vào session
        $request->session()->put('selectedClubs', $selectedClubs);
        $request->session()->put('selectedPositions', $selectedPositions);
    
        return view('ui.pages.players', compact('players', 'team', 'positions'));
    }

    public function detailPlayer($id){
        $player = Player::where('player_id', $id)->first();

        return view('ui.pages.detailPlayer', compact('player'));
    }
}
