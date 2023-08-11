@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mx-auto text-center">
                    <h1 class="text-white">Matches</h1>
                </div>
            </div>
        </div>
    </div>
    @foreach ($randomMatch as $randomMatch)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex team-vs">
                        <span class="score">
                            {{ $randomMatch->home_goals }} - {{ $randomMatch->away_goals }}
                        </span>
                        <div class="team-1 w-50">
                            <div class="team-details w-100 text-center">
                                <img src="{{ asset('css/ui/images/'.$randomMatch->homeTeam->logo) }}" alt="Image" class="img-fluid mb-2">
                                <h3>{{ $randomMatch->homeTeam->team_name }}</h3>
                            </div>
                        </div>
                        <div class="team-2 w-50">
                            <div class="team-details w-100 text-center">
                                <img src="{{ asset('css/ui/images/'.$randomMatch->awayTeam->logo) }}" alt="Image" class="img-fluid mb-2">
                                <h3>{{ $randomMatch->awayTeam->team_name }}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="site-section bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 title-section">
                    <h2 class="heading">Ranking</h2>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="title-section">
                        <h2 class="heading">FA</h2>
                    </div>
                    <div class="widget-next-match">
                        <table class="table custom-table text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($FAstandings as $index => $team)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $team['team_name'] }}</td>
                                        <td>{{ $team['won_matches'] }}</td>
                                        <td>{{ $team['drawn_matches'] }}</td>
                                        <td>{{ $team['lost_matches'] }}</td>
                                        <td>{{ $team['points'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="title-section">
                        <h2 class="heading">Premier League</h2>
                    </div>
                    <div class="widget-next-match">
                        <table class="table custom-table text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($standings as $index => $team)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $team['team_name'] }}</td>
                                        <td>{{ $team['won_matches'] }}</td>
                                        <td>{{ $team['drawn_matches'] }}</td>
                                        <td>{{ $team['lost_matches'] }}</td>
                                        <td>{{ $team['points'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="widget-next-match">
                        <div class="widget-title">
                            <h3>Next Match</h3>
                        </div>
                        <div class="widget-body mb-3">
                            <div class="widget-vs">
                                <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                    <div class="team-1 text-center">
                                        <img src="{{ asset('css/ui/images/'.$nextMatch->homeTeam->logo) }}" alt="Image" class="img-fluid mb-2">
                                        <h3>{{ $nextMatch->homeTeam->team_name }}</h3>
                                    </div>
                                    <div>
                                        <span class="vs"><span>VS</span></span>
                                    </div>
                                    <div class="team-2 text-center">
                                        <img src="{{ asset('css/ui/images/'.$nextMatch->awayTeam->logo) }}" alt="Image" class="img-fluid mb-2">
                                        <h3>{{ $nextMatch->awayTeam->team_name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center widget-vs-contents mb-4">
                            <h4>{{ $nextMatch->league }}</h4>
                            <p class="mb-5">
                                @php
                                    $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nextMatch->date);
                                @endphp
                                <span class="d-block">{{ $carbonDate->format('d - m') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 title-section">
                    <h2 class="heading">Upcoming Match</h2>
                </div>
                @foreach ($nextMatches as $match)
                    <div class="col-lg-6 mb-4">
                        <div class="bg-light p-4 rounded">
                            <div class="widget-body">
                                <div class="widget-vs">
                                    <div
                                        class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                        <div class="team-1 text-center">
                                            <img src="{{ asset('css/ui/images/'.$match->homeTeam->logo) }}" alt="Image" class="img-fluid mb-2">
                                            <h3>{{ $match->homeTeam->team_name }}</h3>
                                        </div>
                                        <div>
                                            <span class="vs"><span>VS</span></span>
                                        </div>
                                        <div class="team-2 text-center">
                                            <img src="{{ asset('css/ui/images/'. $match->awayTeam->logo )}}" alt="Image" class="img-fluid mb-2">
                                            <h3>{{ $match->awayTeam->team_name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center widget-vs-contents mb-4">
                                <h4>{{ $match->league }}</h4>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
