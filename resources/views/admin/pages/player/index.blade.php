@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Player</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Player</li>
                        <li class="breadcrumb-item" aria-current="page">Player</li>
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
                        <p class="card-title text-center">
                            <a href="{{ Route('admin.player.playerStat')}}">
                                View player stats
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">
                            <a href="{{ Route('admin.player.viewAllPlayer')}}">
                                Or view all player
                            </a>
                        </p>
                    </div>
</div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table text-center">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams->take(4) as $team)
                                        <tr>
                                            <td>
                                                @if($team->logo != null)
                                                    <img src="{{ asset('/css/ui/images/'.$team->logo)}}" alt="" style="width:50px; height:50px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.player.viewTeamPlayer', $team->slug) }}" style="margin-top: -20px">{{ $team->team_name }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table text-center">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams->skip(4)->take(4) as $team)
                                    <tr>
                                        <td>
                                            @if($team->logo != null)
                                                <img src="{{ asset('/css/ui/images/'.$team->logo)}}" alt="" style="width:50px; height:50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.player.viewTeamPlayer', $team->slug) }}" style="margin-top: -20px">{{ $team->team_name }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    
</div>
    </div>
@endsection
