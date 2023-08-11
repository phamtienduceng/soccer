@extends('ui.layouts.app')
@section('title', 'Product')

@section('content')
    <div class="mt-5">
        <style>
            .section-parallax-breadcrumb {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('images/banners/Banner_3.png') }});
            }
        </style>

        <section class="section-parallax section-parallax-breadcrumb bg-top">
            <div class="container">
                <h1 class="text-white">Cart</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-3">
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none" href=" {{ url('/') }}">
                                <i class="fa-solid fa-house"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-white link-body-emphasis text-decoration-none" href=" {{ url('/product') }}">
                                Product
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            Cart
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="h-100" style="background: #eee">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-0"><b>Your product cart</b></h5>

                                <div class="row">
                                    @if (Cart::count() > 0)
                                        @foreach ($content as $contents)
                                            <hr class="my-4">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                    <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                        data-mdb-ripple-color="light">
                                                        <img src="{{ asset($contents->options->image) }}" class="w-100"
                                                            alt="{{ $contents->name }}">
                                                        <a href="#!">
                                                            <div class="mask"
                                                                style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                    <!-- Data -->
                                                    <p><strong>Category: </strong>{{ $contents->options->categories }}
                                                    </p>
                                                    <p><strong>Model: </strong>{{ $contents->name }}</p>
                                                    <p><strong>Price:
                                                        </strong>{{ number_format($contents->price, 0, '.', ',') }} VND</p>
                                                    <div class="d-flex">
                                                        <form action="{{ route('ui.product.show', $contents->name) }}"
                                                            method="GET" class="me-2">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm"
                                                                data-mdb-toggle="tooltip" title="Update quantity">
                                                                <i class="fa-solid fa-circle-info"
                                                                    style="color: #ffffff;"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('ui.cart.remove', $contents->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                data-mdb-toggle="tooltip" title="Remove item">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                    <!-- Data -->
                                                </div>

                                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                    <!-- Quantity -->
                                                    <p>Quantity</p>
                                                    <div class="d-flex mb-4" style="max-width: 300px">
                                                        <form action="{{ route('ui.cart.update', $contents->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-warning px-3 me-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                <i class="fas fa-minus"></i>
                                                            </button>

                                                            <input type="number" name="qty"
                                                                value="{{ $contents->qty }}" min="1"
                                                                style="width: 60px;" readonly class="text-center" />

                                                            <button class="btn btn-warning px-3 ms-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                    <p class="text-start text-md-center">
                                                        <strong>Total price:</strong>
                                                        {{ number_format($contents->price * $contents->qty, 0, '.', ',') }}
                                                        VND
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <hr class="my-4" />
                                        <div class="row text-center">
                                            <p>Your cart is currently empty.</p>
                                            <p>Start shopping now and discover our latest products!</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Products
                                        @php
                                           $subtotal = Cart::subtotal();
                                           $tax = Cart::tax();
                                        @endphp
                                        <span>{{ $subtotal ? number_format((float)str_replace(',', '', $subtotal), 0, ',', '.') : '0' }} ₫</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Tax
                                        <span>{{ $tax ? number_format((float)str_replace(',', '', $tax), 0, ',', '.') : '0' }} ₫</span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">

                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                            <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong>
                                        </div>
                                        <span>
                                            <strong> {{ number_format((float)str_replace(',', '', Cart::total()), 0, '.', ',') }} VND </strong>


                                        </span>
                                    </li>
                                </ul>

                                <a href="{{ route('ui.checkout.shipping') }}" type="button"
                                    class="btn btn-warning btn-lg btn-block {{ Cart::count() > 0 ? '' : 'disabled' }}">
                                    Go to checkout
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
