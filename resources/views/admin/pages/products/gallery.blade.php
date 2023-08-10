@extends('admin.layouts.app')

@section('title', 'Product')

@section('header')
    <div class="p-3">
        <h1 class="">Product</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
        <div class="card-body table-responsive">
            <table class="table table-hover text-center ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Model</th>
                        <th scope="col">Thumbnails</th>
                        <th scope="col">Gallery</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->category->categories_name }}</td>
                            <td>{{ $product->products_model }}</td>
                            <td>
                                <img src="{{ asset($product->products_thumbnails) }}" alt="{{ $product->products_model }}"
                                    width="50">
                            </td>

                            <td>
                                @if ($product->products_gallery)
                                    <div class="gallery-thumbnails">
                                        @foreach (json_decode($product->products_gallery) as $image)
                                            <img src="{{ asset($image) }}" alt="{{ $product->products_model }}"
                                                width="50">
                                        @endforeach
                                    </div>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.product.edit_gallery', $product->products_id) }}"
                                    class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
