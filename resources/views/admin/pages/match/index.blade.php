@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Match</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Match</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <form action="{{ route('admin.match.createPLMatches') }}" method="GET">
                                <button type="submit" class="btn btn-primary pc-mtext">Generate PL Matches</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <form action="{{ route('admin.match.createFAMatches') }}" method="GET">
                                <button type="submit" class="btn btn-primary pc-mtext">Generate FA Matches</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion accordion-borderless" id="accordionFlushExampleX">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOneX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#flush-collapseOneX" aria-expanded="true" aria-controls="flush-collapseOneX">
                        Premier League
                    </button>
                </h2>
                <div id="flush-collapseOneX" class="accordion-collapse collapse" aria-labelledby="flush-headingOneX"
                    data-mdb-parent="#accordionFlushExampleX">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($matches as $match)
                                @if ($match->league == 'PremierLeague')
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-around mb-3">
                                                    <div class="p-2 bd-highlight text-center">
                                                        <p>{{ $match->homeTeam->team_name }}</p>
                                                        <p>{{ $match->home_goals }}</p>
                                                    </div>
                                                    <div class="p-2 bd-highlight">vs</div>
                                                    <div class="p-2 bd-highlight text-center">
                                                        <p> {{ $match->awayTeam->team_name }}</p>
                                                        <p> {{ $match->away_goals }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p>Date: {{ $match->date }}</p>
                                                    <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                                        data-mdb-target="#modal{{ $match->match_id }}">
                                                        Update score
                                                    </button>
                                                    @include('admin.pages.match.update')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwoX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#flush-collapseTwoX" aria-expanded="false" aria-controls="flush-collapseTwoX">
                        FA
                    </button>
                </h2>
                <div id="flush-collapseTwoX" class="accordion-collapse collapse" aria-labelledby="flush-headingTwoX"
                    data-mdb-parent="#accordionFlushExampleX">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($matches as $match)
                                @if ($match->league == 'FA')
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-around mb-3">
                                                    <div class="p-2 bd-highlight text-center">
                                                        <p>{{ $match->homeTeam->team_name }}</p>
                                                        <p>{{ $match->home_goals }}</p>
                                                    </div>
                                                    <div class="p-2 bd-highlight">vs</div>
                                                    <div class="p-2 bd-highlight text-center">
                                                        <p> {{ $match->awayTeam->team_name }}</p>
                                                        <p> {{ $match->away_goals }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <p>Date: {{ $match->date }}</p>
                                                    <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                                        data-mdb-target="#modal{{ $match->match_id }}">
                                                        Update score
                                                    </button>
                                                    @include('admin.pages.match.update')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
