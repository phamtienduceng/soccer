@extends('admin.layouts.app')

@section('title', 'Contact ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Contact Us</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Contact Us</li>
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
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Admin</h5>
                   

                    <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Search by name">
        <button type="submit">Search</button>
    </form>
                        <div class="table-responsive">
                            <table class="table text-center">
                            <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->subject}}</td>
                            <td>
                            <a href="{{ Route('ui.viewContactDetail', $item->id)}}" type="button" class="btn btn-link"
                           >
                            <input type="button" class="fa fa-eye text-primary" ></a>
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


