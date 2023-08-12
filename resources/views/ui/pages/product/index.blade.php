@extends('ui.layouts.app')
@section('title', 'Product')

@section('content')
    <div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 ml-auto">
                    <h1 class="text-white">Product</h1>

                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('ui.product.search') }}" method="GET">
        <div class="search-container">
            <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search" />
        </div>
    </form>
    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row row-cols-1 row-cols-md-4 g-4">

                @foreach ($products as $product)
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ $product->products_thumbnails }}" class="card-img-top"
                                    alt="{{ $product->products_model }}">
                                <a href="{{ route('ui.product.show', ['id' => $product->products_model]) }}">
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
                                    <p class="text-dark">{{ number_format($product->products_price, 0, '.', ',') }} VND
                                    </p>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="d-flex justify-content-evenly align-items-center pb-2 mb-1">
                                    <a href="{{ route('ui.product.show', ['id' => $product->products_model]) }}"
                                        type="button" class="btn btn-primary btn-rounded">Details</a>

                                    <form action="{{ route('ui.cart.add', $product->products_id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-rounded">
                                            Add to cart
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
