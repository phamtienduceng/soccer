@extends('admin.layouts.app')

@section('title', 'User ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">User</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">User</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        @if (session('success_update'))
            <div class="alert alert-dismissible fade show alert-success text-center" role="alert" data-mdb-color="warning"
                id="customxD">
                <i class="fas fa-check-circle me-3"></i>{{ session('success_update') }}
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success_del'))
            <div class="alert alert-dismissible fade show alert-success text-center" role="alert" data-mdb-color="warning"
                id="customxD">
                <i class="fas fa-check-circle me-3"></i>{{ session('success_del') }}
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Admin</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->user_role == 'Admin')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->user_email }}</td>
                                                <td>{{ $user->user_phone }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Member</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->user_role == 'Member')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->user_email }}</td>
                                                <td>{{ $user->user_phone }}</td>
                                                <td>{{ $user->user_status }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-link" data-mdb-toggle="modal"
                                                        data-mdb-target="#update">
                                                        <i class="fa-solid fa-gear text-primary"></i>
                                                    </a>
                                                    @include('admin.pages.user.update')
                                                    <a type="button" class="btn btn-link" data-mdb-toggle="modal"
                                                        data-mdb-target="#del">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                    @include('admin.pages.user.del')
                                                </td>
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
    </div>
@endsection
