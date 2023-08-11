@extends('ui.layouts.app')
@section('title', 'Order Success')

@section('content')

    <div class="mt-5">
        <main class="mt-5 pt-4">
            <div class="container">

                @include('ui.pages.checkout.stepper')

                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card p-4 mb-4">

                            <div class="card-header py-1">
                                <h5 class="card-title fw-bold text-center">Order Success</h5>
                            </div>

                            <div class="card-body">

                                <p class="">Your order details: </p>

                                <div class="container mb-3">


                                    <p class="fw-bold">Shipping Detail</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <p>Name: {{ $shipping->shipping_name }}</p>
                                                <p>Address: {{ $shipping->shipping_address }}</p>
                                            </div>
                                            <div class="col">
                                                <p>District: {{ $shipping->shipping_district }}</p>
                                                <p>Province: {{ $shipping->shipping_province }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <p><span class="fw-bold">Payment Method:</span> {{ $payment_method }}</p>
                                </div>
                                <p>Thank you for shopping with us. Your order has been received and is currently being
                                    processed. We will send you a confirmation email with the details of your order shortly.
                                </p>
                                <hr class="mb-4">
                                <form method="POST" action="{{ route('ui.checkout.destroy') }}">
                                    @csrf
                                    <button class="btn btn-warning btn-lg btn-block" type="submit">
                                        Continue shopping
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="fw-bold list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Your Products Cart
                                    </li>
                                </ul>
                            </div>

                            @include('ui.pages.checkout.products')

                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
