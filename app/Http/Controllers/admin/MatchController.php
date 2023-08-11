<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Matches;
use App\Models\Ranking;
use App\Models\Teams;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Matches::with(['homeTeam', 'awayTeam'])->orderBy('date', 'asc')
            ->get();
        return view('admin.pages.match.index', compact('matches'));
    }

    public function create()
    {
        $team = Teams::all();
        $team = Matches::all();

        return view('admin.pages.match.create', compact('team'));
    }

    public function createPLMatches()
    {
        $teamIds = Teams::where('isPremierLeague', 'Active')->get()->pluck('team_id')->toArray();

        shuffle($teamIds);

        $startDate = Carbon::parse('2023-08-01');
        $endDate = Carbon::parse('2023-12-31');

        $matches = [];

        for ($i = 0; $i < count($teamIds) - 1; $i++) {
            for ($j = $i + 1; $j < count($teamIds); $j++) {

                $randomDay = rand(1, 31);
                $randomMonth = rand(8, 12);
                $randomYear = rand($startDate->year, $endDate->year);

                $randomDate = Carbon::create($randomYear, $randomMonth, $randomDay);

                $matches[] = [
                    'home_team_id' => $teamIds[$i],
                    'away_team_id' => $teamIds[$j],
                    'date' => $randomDate,
                    'league' => 'PremierLeague'
                ];
            }
        }

        Matches::insert($matches);

        return back()->with('success', 'Random matches created successfully');
    }

    public function createFAMatches()
    {
        $teamIds = Teams::where('isFA', 'Active')->get()->pluck('team_id')->toArray();

        shuffle($teamIds);

        $startDate = Carbon::parse('2023-08-01');
        $endDate = Carbon::parse('2023-12-31');

        $matches = [];

        for ($i = 0; $i < count($teamIds) - 1; $i++) {
            for ($j = $i + 1; $j < count($teamIds); $j++) {

                $randomDay = rand(1, 31);
                $randomMonth = rand(8, 12);
                $randomYear = rand($startDate->year, $endDate->year);

                $randomDate = Carbon::create($randomYear, $randomMonth, $randomDay);

                $matches[] = [
                    'home_team_id' => $teamIds[$i],
                    'away_team_id' => $teamIds[$j],
                    'date' => $randomDate,
                    'league' => 'FA'
                ];
            }
        }

        Matches::insert($matches);

        return back()->with('success', 'Random matches created successfully');
    }
    public function updateScore(Request $request, $matchId)
    {
        $validated = $request->validate([
            'home_goals' => 'required|numeric',
            'away_goals' => 'required|numeric'
        ]);

        $match = Matches::where('match_id', $matchId)->first();

        if (!$match) {
            return back()->with('error', 'Premier League match not found');
        }

        $match->home_goals = $validated['home_goals'];
        $match->away_goals = $validated['away_goals'];

        if ($match->home_goals > $match->away_goals) {
            $match->result = 'Win'; // Đội nhà thắng
        } elseif ($match->home_goals < $match->away_goals) {
            $match->result = 'Lose'; // Đội nhà thua
        } else {
            $match->result = 'Draw'; // Hai đội hòa nhau
        }

        $match->save();

        return back()->with('success_score', 'Random matches created successfully');
    }

}
