<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Cart;

class OrderController extends Controller
{

    public function list(Request $request)
    {
        $orders = DB::table('orders')
            ->leftJoin('users', 'orders.customer_id', '=', 'users.user_id') // Changed to 'users.user_id'
            ->leftJoin('shipping_details', 'orders.shipping_id', '=', 'shipping_details.shipping_id')
            ->select('orders.*', 'users.user_name as name', 'shipping_details.shipping_full_name') // Changed to 'users.user_name'
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.pages.orders.list', compact('orders'));
    }

    public function detail(Request $request, $id)
    {
        $order = DB::table('orders')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->join('shipping_details', 'orders.shipping_id', '=', 'shipping_details.shipping_id')
            ->leftJoin('users', 'orders.customer_id', '=', 'users.user_id') // Changed to 'users.user_id'
            ->join('payments', 'orders.payment_id', '=', 'payments.payment_id')
            ->select('orders.*', 'order_details.*', 'shipping_details.*', 'users.*', 'payments.*', 'orders.created_at') // Updated to include 'users.*'
            ->where('orders.order_id', $id)
            ->get();
    }

    public function update_status(Request $request, $id)
    {
        $newStatus = $request->input('order_status');
        DB::table('orders')
            ->where('order_id', $id)
            ->update(['order_status' => $request->order_status]);

        return redirect()->back();
    }

    public function destroy(Request $request, $orderId)
    {
        // Delete the order and its details
        DB::table('orders')->where('order_id', $orderId)->delete();
        DB::table('order_details')->where('order_id', $orderId)->delete();

        // Show success message and redirect to orders list
        return redirect()->route('admin.order.list')->with('success', 'Order deleted successfully.');
    }
}
