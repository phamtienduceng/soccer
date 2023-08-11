@extends('admin.layouts.app')

@section('title', 'Blog ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Blog</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">
                            New post?
                            <span>
                                <a href="{{ route('admin.blog.addPost') }}">
                                    <span class="pc-micon"><i class="ti ti-circle-plus"></i></span>
                                    <span class="pc-mtext">Create now</span>
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection