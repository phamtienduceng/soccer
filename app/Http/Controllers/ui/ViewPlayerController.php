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
        $players = Player::inRandomOrder()->get();

        return view('ui.pages.players', compact('players'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $players = Player::where('player_name', 'like', '%' . $searchTerm . '%')->get();

        return view('ui.pages.players', compact('players', 'searchTerm'));
    }

    public function sortByGoals()
    {
        $players = Player::orderBy('goals', 'desc')->get();

        return view('ui.pages.players', compact('players'));
    }

    public function sortByAssists()
    {
        $players = Player::orderBy('assists', 'desc')->get();

        return view('ui.pages.players', compact('players'));
    }

    public function sortByName()
    {
        $players = Player::orderBy('name')->get();

        return view('ui.pages.players', compact('players'));
    }
}
