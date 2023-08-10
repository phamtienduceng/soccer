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
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Club</th>
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
                                        photo here
                                    </td>
                                    <td>
                                        {{$tp->team_id}}
                                    </td>
                                    <td>
                                        {{$tp->position}}
                                    </td>
                                    <td>
                                        {{$tp->nationality}}
                                    </td>
                                    <td>
                                        {{$tp->birthday}}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-link" data-mdb-toggle="modal"
                                            data-mdb-target="#update_team">
                                            <i class="fa-solid fa-gear text-primary"></i>
                                        </a>
                                   
                                        <a type="button" class="btn btn-link" data-mdb-toggle="modal"
                                            data-mdb-target="#del">
                                            <i class="fa-solid fa-trash text-danger"></i>
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
