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
                        <li class="breadcrumb-item" aria-current="page">User Details</li>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->user_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->user_email }}</td>
                                            <td>{{ $user->user_phone }}</td>
                                            <td>{{ $user->user_address }}</td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Role</label>
                                    <select name="user_role" id="user_role" class="form-control">
                                        <option value="Admin" {{ $user->user_role == 'Admin' ? 'selected' : '' }}>
                                            Admin</option>
                                        <option value="Moderator" {{ $user->user_role == 'Moderator' ? 'selected' : '' }}>
                                            Moderator</option>
                                        <option value="Member" {{ $user->user_role == 'Member' ? 'selected' : '' }}>
                                            Member</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Status</label>
                                    <select name="user_status" id="user_status" class="form-control">
                                        <option value="Active" {{ $user->user_status == 'Active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="Inactive" {{ $user->user_status == 'Inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                        <option value="Banned" {{ $user->user_status == 'Banned' ? 'selected' : '' }}>
                                            Banned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-link"
                                    data-mdb-ripple-color="dark">Back</a>
                                <button type="submit" class="btn btn-link" data-mdb-ripple-color="dark">Save change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
