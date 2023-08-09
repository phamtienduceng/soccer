<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teams;

class TeamController extends Controller
{
    public function index()
    {
        $team = Teams::all();
        
        return view('admin.pages.team.index', ['team' => $team]);
    }
}
