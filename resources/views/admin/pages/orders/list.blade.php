@extends('admin.layouts.app')

@section('title', 'Order')

@section('header')
<div class="p-3">
    <h1 class="">Order</h1>
    <nav class="d-flex">
        <h6 class="">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.Dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </h6>
    </nav>
</div>
@endsection

@section('main')

<div class="card">
    <div class="card-body">
        <table class="table text-center" id="category-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <!-- Change from "user name" to "User Name" -->
                    <th>Order date</th>
                    <th>Total amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>
                        {{ $order->user_name ?? $order->shipping_full_name }} <!-- Change from "user_name" to "user_name" -->
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ number_format($order->order_total, 0, '.', ',') }}</td>
                    <td>
                        @if ($order->order_status == 'inactive')
                                    Order being processed
                                @elseif($order->order_status == 'active')
                                    Order confirmed
                                @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.order.detail', $order->order_id) }}"
                            class="btn btn-primary btn-sm">
                            View
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#deleteOrderModal{{ $order->order_id }}">
                            Delete
                        </button>
                        <div class="modal fade" id="deleteOrderModal{{ $order->order_id }}" tabindex="-1"
                            aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteOrderModalLabel">Delete Order</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this order?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <form id="deleteOrderForm{{ $order->order_id }}"
                                            action="{{ route('admin.order.destroy', $order->order_id) }}"
                                            method="post">
                                            @csrf
                                                    @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
