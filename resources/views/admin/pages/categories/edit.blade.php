@extends('admin.layouts.app')

@section('title', 'Category')

@section('header')
    <div class="p-3">
        <h1 class="">Category</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.list') }}">Category</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </h6>
        </nav>
    </div>
@endsection

@section('main')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category.update', $category->categories_id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please fix the following errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="categories_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="categories_name" name="categories_name" required
                        value="{{ $category->categories_name }}">
                </div>

                <div class="mb-3">
                    <label for="categories_thumbnails" class="form-label">Thumbnails</label>
                    <input type="file" class="form-control" id="categories_thumbnails" name="categories_thumbnails"
                        value="{{ $category->categories_thumbnails }}">
                </div>

                <div class="mb-3">
                    <label for="categories_status" class="form-label">Status</label>
                    <select class="form-control" id="categories_status" name="categories_status" required>
                        <option value="inactive" {{ $category->categories_status == 'inactive' ? 'selected' : '' }}>Inactive
                        </option>
                        <option value="active" {{ $category->categories_status == 'active' ? 'selected' : '' }}>Active
                        </option>
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Update Category</button>
                </div>

            </form>
        </div>
    </div>
@endsection
