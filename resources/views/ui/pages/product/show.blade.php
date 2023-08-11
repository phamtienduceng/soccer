@extends('ui.layouts.app')
@section('title', $product->products_model)

@section('content')
    <main class="mt-5">

        <style>
            .section-parallax-breadcrumb {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $url }}');
            }
        </style>

        <section class="section-parallax section-parallax-breadcrumb bg-top">
            <div class="container">
                <h1 class="text-white py-5">
                <!--{{ $product->products_model }}-->
                </h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-3">
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none" href="{{ url('/') }}">
                                <i class="fa-solid fa-house"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none"
                                href="{{ route('ui.product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            {{ $product->products_model }}
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card shopping-cart" style="border-radius: 15px;">
                            <div class="card-body text-black">
                                <div class="row">

                                    <div class="col-lg-6 px-5 py-4">
                                        <div id="product_gallery" class="carousel slide" data-mdb-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ asset($product->products_thumbnails) }}"
                                                        class="d-block w-100" alt="{{ $product->products_model }}">
                                                </div>

                                                @if ($product->products_gallery)
                                                    @foreach (json_decode($product->products_gallery) as $image)
                                                        <div class="carousel-item ">
                                                            <img src="{{ asset($image) }}" class="d-block w-100"
                                                                alt="{{ $product->products_model }}">
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-mdb-target="#product_gallery" data-mdb-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-mdb-target="#product_gallery" data-mdb-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 px-5 py-4">

                                        <form action="{{ route('ui.cart.add', $product->products_id) }}" method="post">
                                            @csrf

                                            <div class="card-header">
                                                <h3 class="pt-2 text-center fw-bold text-uppercase text-black">
                                                    {{ $product->products_model }}
                                                </h3>
                                            </div>

                                            <div class="row">
                                                <section class="mb-2">
                                                    <div class="row gx-lg-5">
                                                        <div class="col-lg-6 mb-3 mt-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="fw-bold mb-1 text-danger">Selling price
                                                                    </p>
                                                                    <h4 class="text-primary mb-1 fw-bold">
                                                                        {{ number_format($product->products_price, 0, '.', ',') }}
                                                                        VND</p>
                                                                        </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row gx-lg-5">
                                                        <div class="col-lg-6 mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="fw-bold mb-1">Material</p>
                                                                    <h6 class="text-muted mb-1">
                                                                        {{ $product->products_material }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="fw-bold mb-1">Style</p>
                                                                    <h6 class="text-muted mb-1">
                                                                        {{ $product->products_style }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="fw-bold mb-1">Size</p>
                                                                    <h6 class="text-muted mb-1">
                                                                        {{ $product->products_size }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="fw-bold mb-1">Maximum Load</p>
                                                                    <h6 class="text-muted mb-1">
                                                                        {{ $product->products_maxload }} kg
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1 ms-4">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold ">About</span> 
                                                                        <a href="{{route('ui.agentSystem')}}">Agent system</a>.
                                                                    </p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>

                                            <div class="text-center">
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-warning mb-5">
                                                        <i class="fas fa-cart-plus"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <h5 class="fw-bold mt-5">
                                                    <a href="{{ asset('product') }}">
                                                        <i class="fas fa-angle-left"></i>
                                                        Back to shopping
                                                    </a>
                                                </h5>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <h2 class="text-center fw-bold text-black">Related products</h2>
                    <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2 g-4 justify-content-center">
                        @foreach ($related_products as $product)
                            <div class="col">
                                <div class="card">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="{{ asset($product->products_thumbnails) }}" class="card-img-top"
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
                                            <p class="text-dark">
                                                {{ number_format($product->products_price, 0, '.', ',') }} VND
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-evenly align-items-center pb-2 mb-1">
                                            <a href="{{ route('ui.product.show', ['id' => $product->products_id]) }}"
                                                type="button" class="btn btn-primary btn-sm btn-rounded">Details</a>
                                            <button type="button" class="btn btn-warning btn-sm btn-rounded">Buy
                                                now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            outline: black;
        }

        .carousel-control-next-icon:after {
            color: black;
        }

        .carousel-control-prev-icon:after {
            color: black;
        }
    </style>
<script src="https://kit.fontawesome.com/924836a647.js" crossorigin="anonymous"></script>
@endsection
