@extends('admin.layouts.app')

@section('title', 'Category')

@section('header')
    <div class="p-3">
        <h1 class="">Category</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </h6>
        </nav>
    </div>
@endsection

@section('main')

    @if (session()->has('success-update') || session()->has('success-del'))
        <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-check me-2"></i>
                <span>{{ session()->get('success-update') ?: session()->get('success-del') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <span>{{ session()->get('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table text-center" id="category-table">
                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Thumbnails</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>

                            <td>
                                {{ $category->categories_name }}
                            </td>

                            <td>
                                @if ($category->categories_thumbnails)
                                    <img src="{{ asset($category->categories_thumbnails) }}"
                                        alt="{{ $category->categories_name }}" class=""
                                        style="max-width: 100px; max-height: 100px;">
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>
                                {{ ucfirst($category->categories_status) }}
                            </td>

                            <td>
                                <a href="{{ route('admin.category.edit', $category->categories_id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.category.delete', $category->categories_id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
