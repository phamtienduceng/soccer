@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">

                        <h5 class="m-b-10">{{$team->team_name}}</h5>

                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Player</li>
                        <li class="breadcrumb-item" aria-current="page">{{$team->team_name}}</li>
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
                            Add new player
                            <span>
                                <a href="{{ route('admin.player.create') }}">
                                    <span class="pc-micon"><i class="ti ti-circle-plus"></i></span>
                                    <span class="pc-mtext">Add now</span>
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Number</th>
                                <th>Position</th>
                                <th>Nationality</th>
                                <th>Birthday</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamPlayers as $tp)
                                <tr>
                                    <td>
                                        {{$tp->player_name}}
                                    </td>
                                    <td>
                                        @if($tp->player_photo != null)
                                            <img src="{{ asset('/css/ui/images/'.$tp->player_photo)}}" alt="" style="width:50px; height:auto;">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $tp->club_number }}
                                    </td>
                                    <td class="@if ($tp->position === 'Goalkeeper') text-yellow @elseif ($tp->position === 'Defend') text-blue @elseif ($tp->position === 'Middlefield') text-green @elseif ($tp->position === 'Striker') text-red @endif">
                                        {{ $tp->position }}
                                    </td>
                                    <td>
                                        @if($tp->nationality != null)
                                            <img src="{{ asset('/css/ui/images/'.$tp->nationality)}}" alt="" style="width:50px; height:auto;">
                                        @endif
                                    </td>
                                    <td>
                                        {{$tp->birthday}}
                                    </td>
                                    <td>
                                        <a href="{{ Route('admin.player.edit', $tp->player_id)}}" class="action-item btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
