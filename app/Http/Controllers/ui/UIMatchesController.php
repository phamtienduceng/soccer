<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use App\Models\Matches;
use App\Models\Teams;
use Illuminate\Http\Request;

class UIMatchesController extends Controller
{
    public function index()
    {
        $matches = Matches::with(['homeTeam', 'awayTeam'])->orderBy('date', 'asc')
            ->get();

        $randomMatch = Matches::where('result', '!=', 'Not Started')
            ->take(1)->inRandomOrder()->with(['homeTeam', 'awayTeam'])->get();
        $standings = $this->getPremierLeagueStandings();
        $FAstandings = $this->getFAStandings();
        $nextMatch = Matches::where('date', '>=', date('Y-m-d'))
            ->where('result', 'Not Started')
            ->orderBy('date', 'asc')
            ->first();
        $nextMatches = Matches::where('date', '>', $nextMatch->date)
            ->where('result', 'Not Started')
            ->orderBy('date', 'asc')
            ->take(4)
            ->get();
        return view('ui.pages.match.index', compact('matches', 'randomMatch', 'standings', 'FAstandings', 'nextMatch', 'nextMatches'));
    }

    function getPremierLeagueStandings()
    {
        $teams = Teams::where('isPremierLeague', 'Active')->get();

        $standings = [];

        foreach ($teams as $team) {
            $playedMatches = Matches::where('league', 'PremierLeague')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->orWhere('away_team_id', $team->team_id);
                })
                ->where('result', '<>', 'Not Started')
                ->count();

            $wonMatches = Matches::where('league', 'PremierLeague')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->where('result', 'Win');
                })
                ->orWhere(function ($query) use ($team) {
                    $query->where('away_team_id', $team->team_id)
                        ->where('result', 'Lose');
                })
                ->count();

            $drawnMatches = Matches::where('league', 'PremierLeague')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->orWhere('away_team_id', $team->team_id);
                })
                ->where('result', 'Draw')
                ->count();

            $lostMatches = $playedMatches - $wonMatches - $drawnMatches;

            $points = $wonMatches * 3 + $drawnMatches;

            $standings[] = [
                'team_name' => $team->team_name,
                'played_matches' => $playedMatches,
                'won_matches' => $wonMatches,
                'drawn_matches' => $drawnMatches,
                'lost_matches' => $lostMatches,
                'points' => $points,
            ];
        }

        usort($standings, function ($a, $b) {
            return $b['points'] - $a['points'];
        });

        return $standings;
    }

    public function getFAStandings()
    {
        $teams = Teams::where('isFA', 'Active')->get();

        $standings = [];

        foreach ($teams as $team) {
            $playedMatches = Matches::where('league', 'FA')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->orWhere('away_team_id', $team->team_id);
                })
                ->where('result', '<>', 'Not Started')
                ->count();

            $wonMatches = Matches::where('league', 'FA')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->where('result', 'Win');
                })
                ->orWhere(function ($query) use ($team) {
                    $query->where('away_team_id', $team->team_id)
                        ->where('result', 'Lose');
                })
                ->count();

            $drawnMatches = Matches::where('league', 'FA')
                ->where(function ($query) use ($team) {
                    $query->where('home_team_id', $team->team_id)
                        ->orWhere('away_team_id', $team->team_id);
                })
                ->where('result', 'Draw')
                ->count();

            $lostMatches = $playedMatches - $wonMatches - $drawnMatches;

            $points = $wonMatches * 3 + $drawnMatches;

            $standings[] = [
                'team_name' => $team->team_name,
                'played_matches' => $playedMatches,
                'won_matches' => $wonMatches,
                'drawn_matches' => $drawnMatches,
                'lost_matches' => $lostMatches,
                'points' => $points,
            ];
        }

        // Sắp xếp bảng xếp hạng theo điểm số giảm dần
        usort($standings, function ($a, $b) {
            return $b['points'] - $a['points'];
        });

        return $standings;
    }
}
