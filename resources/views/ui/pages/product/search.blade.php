@extends('ui.layouts.app')
@section('title', 'Product')

@section('content')
    <main class="mt-5">


        <style>
            .section-parallax-breadcrumb {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ url('images/banners/Banner.png') }});
            }
        </style>

        <section class="section-parallax section-parallax-breadcrumb bg-top">
            <div class="container">
                <h1 class="text-white">Product</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-3">
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none" href=" {{ url('/') }}">
                                <i class="fa-solid fa-house"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none"
                                href="{{ route('product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            Search
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <section style="background-color: #eee;">
            <div class="container py-5">
                @if (count($products) > 0)
                    <p><small>Search results for <strong>"{{ $searchTerm }}"</strong>.</small></p>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="card">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="{{ asset($product->products_thumbnails) }}" class="card-img-top"
                                            alt="{{ $product->products_model }}">
                                        <a href="{{ route('product.show', ['id' => $product->products_model]) }}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                        </a>
                                    </div>

                                    <hr>
                                    <div class="card-body pb">
                                        <div class="d-flex justify-content-between">
                                            <p><a class="text-danger fw-bold">Model</a></p>
                                            <p class="text-dark">{{ $product->products_model }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p><a class="text-danger fw-bold">Price</a></p>
                                            <p class="text-dark">{{ number_format($product->products_price, 0, '.', ',') }}
                                                VND
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-evenly align-items-center pb-2 mb-1">
                                            <a href="{{ route('product.show', ['id' => $product->products_model]) }}"
                                                type="button" class="btn btn-primary btn-rounded">Details</a>
                                            <button type="button" class="btn btn-warning btn-rounded">Buy now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center">
                        <h4><strong>The requested content could not be found</strong></h4>
                        <p><strong>"{{ $searchTerm }}"</strong> not found . Please check spelling, use more general words and try again!</p>
                    </div>
                @endif
            </div>
        </section>

    </main>

@endsection
