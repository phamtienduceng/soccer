@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Team</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">
                            New team?
                            <span>
                                <a href="{{ route('admin.team.add') }}">
                                    <span class="pc-micon"><i class="ti ti-circle-plus"></i></span>
                                    <span class="pc-mtext">Create now</span>
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Premier League</h5>
                    </div>
                    <div class="card-body">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    @if ($team->tournament_id == '2')
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $team->team_name }}</td>
                                            <td>{{ $team->win }}</td>
                                            <td>{{ $team->draw }}</td>
                                            <td>{{ $team->lose }}</td>
                                            <td>{{ $team->points }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="fw-bold">FA</h5>
                    </div>
                    <div class="card-body">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    @if ($team->tournament_id == '1')
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $team->team_name }}</td>
                                            <td>{{ $team->win }}</td>
                                            <td>{{ $team->draw }}</td>
                                            <td>{{ $team->lose }}</td>
                                            <td>{{ $team->points }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
