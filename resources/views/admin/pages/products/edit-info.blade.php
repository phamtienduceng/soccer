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
            <form method="POST" action="{{ route('admin.product.update', $product->products_id) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
            
                <input type="hidden" name="products_id" value="{{ $product->products_id }}">
            
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="products_model" value="{{ $product->products_model }}" required>
                </div>
            
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="custom-select" id="categories_id" name="categories_id">
                            <option value="" selected disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->categories_id }}" {{ $product->categories_id == $category->categories_id ? 'selected' : '' }}>{{ $category->categories_name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="col-md-6">
                        <label for="products_status" class="form-label">Status</label>
                        <select class="form-control" id="products_status" name="products_status" required>
                            <option value="inactive" {{ $product->products_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ $product->products_status == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price" name="products_price" value="{{ $product->products_price }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="material" class="form-label">Material</label>
                        <input type="text" class="form-control" id="material" name="products_material" value="{{ $product->products_material }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="style" class="form-label">Style</label>
                        <input type="text" class="form-control" id="style" name="products_style" value="{{ $product->products_style }}" required>
                    </div>
               </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="products_size" value="{{ $product->products_size }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="max-load" class="form-label">Maximum Load</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="max-load" name="products_maxload" value="{{ $product->products_maxload }}" required>
                            <span class="input-group-text">kg</span>
                        </div>
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
                        <input type="file" class="form-control" id="gallery" name="products_gallery[]"
                            accept="image/*" multiple>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Update Product</button>
            
            </form>
        </div>
    </div>
@endsection
