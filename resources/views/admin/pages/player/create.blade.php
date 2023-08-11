@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{$teams ->team_name}}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Team</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{$teams->team_name}}</li>
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
                        <form method="POST" action="{{ route('admin.player.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="player_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="player_photo">
                                </div>
                            </div>

                            <div class="row mb-3" hidden>
                                <label class="col-sm-2 col-form-label">Club</label>
                                <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="team_id" value="{{ $teams->team_id }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-10">
                                <select name="position" id="position" class="form-control">
                                    <option selected disabled>Position</option>
                                    <option value="Goalkeeper">Goalkeeper</option>
                                    <option value="Defend">Defend</option>
                                    <option value="Middlefield">Middlefield</option>
                                    <option value="Striker">Striker</option>
                                </select>                                
                            </div>
                                
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nationality</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="nationality">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="birthday">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Biography</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="biography">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Club's number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="club_number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Goals</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="goals">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Assists</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="assists">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Clean sheets</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="clean_sheets">
                                </div>
                            </div>
                            <hr>
                            <p class="card-title text-center">
                                <button type="submit" class="btn btn-link">Create</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
