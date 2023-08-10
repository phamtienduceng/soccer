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
            <div class="col-sm-6">
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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Premier League</th>
                                <th>FA</th>
                                <th>Community Shield</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($team->logo) }}">
                                    </td>
                                    <td>{{ $team->team_name }}</td>
                                    <td>
                                        @if ($team->isPremierLeague == 'Active')
                                            <i class="ti ti-circle-check" style="font-size: 25px"></i>
                                        @else
                                            <i class="ti ti-circle-x" style="font-size: 25px"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($team->isFA == 'Active')
                                            <i class="ti ti-circle-check" style="font-size: 25px"></i>
                                        @else
                                            <i class="ti ti-circle-x" style="font-size: 25px"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($team->isCommunityShield == 'Active')
                                            <i class="ti ti-circle-check" style="font-size: 25px"></i>
                                        @else
                                            <i class="ti ti-circle-x" style="font-size: 25px"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a type="button" href="{{ route('admin.team.show', $team->team_id) }}"
                                            class="btn btn-link">
                                            <i class="fa-solid fa-gear text-primary"></i>
                                        </a>
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
