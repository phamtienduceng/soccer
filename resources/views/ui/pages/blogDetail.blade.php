@extends('ui.layouts.app')
@section('title', 'Blog')

@section('content')

    {{-- <style>
            .section-parallax-breadcrumb {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $url }}');
    }
    </style> --}}

    <section class="section-parallax section-parallax-breadcrumb bg-top">
        <div class="container">
            <h1 class="text-white py-5">
                {{--{{ $product->products_model }}--}}
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
                        {{ $blog->title }}
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
                                                <img src="{{ asset($blog->image) }}" class="d-block w-100"
                                                    alt="{{ $blog->title }}">
                                            </div>

                                            {{--@if ($product->products_gallery)
                                                    @foreach (json_decode($product->products_gallery) as $image)
                                                        <div class="carousel-item ">
                                                            <img src="{{ asset($image) }}" class="d-block w-100"
                                            alt="{{ $product->products_model }}">
                                        </div>
                                        @endforeach
                                        @endif--}}

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

                </div>
            </div>
        </div>
    </section>


</style>
<script src="https://kit.fontawesome.com/924836a647.js" crossorigin="anonymous"></script>
@endsection