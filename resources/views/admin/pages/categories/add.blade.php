@extends('admin.layouts.app')

@section('title', 'Categories')

@section('header')
    <div class="p-3">
        <h1 class="">Add Categories</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.list') }}">Categories</a></li>
                    <li class="breadcrumb-item active">Add Categories</li>
                </ol>
            </h6>
        </nav>
    </div>
@endsection

@section('main')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-check me-2"></i>
                <span>{{ session()->get('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

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
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="categories_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="categories_name" name="categories_name" required>
                </div>

                <div class="mb-3">
                    <label for="categories_thumbnails" class="form-label">Thumbnails</label>
                    <input type="file" class="form-control" id="categories_thumbnails" name="categories_thumbnails">
                </div>

                <div class="mb-3">
                    <label for="categories_status" class="form-label">Status</label>
                    <select class="form-control" id="categories_status" name="categories_status" required>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Add Category</button>
                </div>

            </form>
        </div>
    </div>
@endsection
