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
                        <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Team</a></li>
                        <li class="breadcrumb-item" aria-current="page">Create</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="team_name">Team Name</label>
                                <input type="text" name="team_name" id="team_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tournament_id">Tournament</label>
                                <select name="tournament_id" id="tournament_id" class="form-control" required>
                                    <option value="">Select Tournament</option>
                                    @foreach($tournament as $tournament)
                                        <option value="{{ $tournament->tournament_id }}">{{ $tournament->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Team</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
