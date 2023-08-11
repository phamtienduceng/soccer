@extends('admin.layouts.app')

@section('title', 'Category')

@section('header')
    <div class="p-3">
        <h1 class="">Category</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a>
</li>
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
            <form method="POST" action="{{ route('admin.product.update_gallery', $product->products_id) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="products_id" value="{{ $product->products_id }}">

                <div class="mb-3">

                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="products_model"
                            value="{{ $product->products_model }}" readonly>

                    </div>

                    <div class="col-md-6">
                        <label for="categories" class="form-label">Categories</label>
                        @foreach ($categories as $category)
                            <input class="form-control" type="text" name="categories_id"
                                id="category_{{ $category->categories_id }}" value="{{ $category->categories_name }}"
                                {{ $product->categories_id == $category->categories_id ? 'checked' : '' }} readonly>
                        @endforeach
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" id="thumbnail" name="products_thumbnails"
                            accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="gallery" class="form-label">Gallery Images</label>
                        <input type="file" class="form-control" id="gallery" name="products_gallery[]" accept="image/*"
                            multiple>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>

            </form>
        </div>
    </div>
@endsection
