@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('header')
    <div class="p-3">
        <h1 class="">Order Details</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.order.list') }}">Order</a></li>
                    <li class="breadcrumb-item active">Order Details</li>
                </ol>
            </h6>
        </nav>
    </div>
@endsection

@section('main')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Infomation</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            @if (count($order) != 0)
                                <tr>
                                    <th>Order ID</th>
                                    <td>{{ $order[0]->order_id }}</td>
                                </tr>

                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order[0]->created_at }}</td>
                                </tr>

                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $order[0]->payment_method }}</td>
                                </tr>

                                <tr>
                                    <th>Order Status</th>
                                    <td>
                                        <form action="{{ route('admin.order.update_status', $order[0]->order_id) }}"
                                            method="POST">

                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <select class="form-control" id="order_status" name="order_status"
                                                        required>
                                                        <option value="inactive"
                                                            {{ $order[0]->order_status == 'inactive' ? 'selected' : '' }}>
                                                            Order being processed
                                                        </option>
                                                        <option value="active"
                                                            {{ $order[0]->order_status == 'active' ? 'selected' : '' }}>
                                                            Order confirmed
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipping Information</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            @if (count($order) != 0)
                                <tr>
                                    <th>Name</th>
                                    @if (!is_null($order[0]->user_id))
                                        <td>
                                            {{ $order[0]->user_name }}
                                        </td>
                                    @else
                                        <td>
                                            {{ $order[0]->shipping_full_name }}
                                        </td>
                                    @endif

                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $order[0]->shipping_province }}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{ $order[0]->shipping_district }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $order[0]->shipping_phone_number }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products Details</h3>
        </div>
        <div class="card-body">
            @if (count($order) != 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Model</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->products_model }}</td>
                                    <td>{{ $item->products_quantity }}</td>
                                    <td>{{ number_format($item->products_price, 0, '.', ',') }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="2"></td>
                                <th>Order Total</th>
                                <td>{{ $order[0]->order_total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        @endif
    </div>
    </div>
@endsection
