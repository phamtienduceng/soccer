<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teams;
use App\Models\Tournaments;

class Player extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view('admin.pages.team.index', compact('teams', ));
    }
}
