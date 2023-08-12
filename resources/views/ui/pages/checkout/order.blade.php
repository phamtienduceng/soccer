@extends('ui.layouts.app')
@section('title', 'Order Details')

@section('content')



    <div class="mt-5">
        <main class="mt-5 pt-4">

            <section class="h-100" style="background: #eee">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center ">
                        <div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-center">Order History</h5>
                                    <div class="row justify-content-center table-responsive-sm">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Order Total</th>
                                                        <th>Order Status</th>
                                                        <th>Shipping Name</th>
                                                        <th>Address</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->order_total }}</td>
                                                            <td>
                                                                @if ($order->order_status == 'inactive')
                                                                    Order being processed
                                                                @elseif($order->order_status == 'active')
                                                                    Order confirmed
                                                                @endif
                                                            </td>
                                                            <td>{{ $order->shipping_full_name }}</td>
                                                            <td>
                                                                {{ $order->shipping_province }},
                                                                {{ $order->shipping_district }}</td>
                                                            <td>{{ $order->payment_method }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>
    </main>

    </div>
@endsection
