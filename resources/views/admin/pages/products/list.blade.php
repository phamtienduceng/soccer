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
                        <th scope="col">Price</th>
                        <th scope="col">Material</th>
                        <th scope="col">Size</th>
                        <th scope="col">Style</th>
                        <th scope="col">Maximum Load</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->category->categories_name }}</td>
                            <td>{{ $product->products_model }}</td>
                            <td>{{ number_format($product->products_price, 0, '.', ',') }}</td>
                            <td>{{ $product->products_material }}</td>
                            <td>{{ $product->products_size }}</td>
                            <td>{{ $product->products_style }}</td>
                            <td>{{ $product->products_maxload }}</td>
                            <td>{{ ucfirst($product->products_status) }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.product.edit', $product->products_id) }}"
                                        class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteProductModal{{ $product->products_id }}"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                                <!-- Delete Product Modal -->
                                <div class="modal fade" id="deleteProductModal{{ $product->products_id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteProductModal{{ $product->products_id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="deleteProductModal{{ $product->products_id }}Label">Delete Product
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this product?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.product.delete', $product->products_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
