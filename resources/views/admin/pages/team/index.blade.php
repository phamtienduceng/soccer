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
                                    <td>{{ $team->logo }}</td>
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
                                        <a type="button" class="btn btn-link" data-mdb-toggle="modal"
                                            data-mdb-target="#update_team">
                                            <i class="fa-solid fa-gear text-primary"></i>
                                        </a>
                                        @include('admin.pages.team.update')
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
