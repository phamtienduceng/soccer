<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function shipping(Request $request)
    {
        $user_id = $request->session()->get('user_id');

        if (session('user_id')) {
            $user = user::findOrFail($user_id);
            $user_name = $user->user_name;
            $user_email = $user->user_email;
            $user_phone = $user->user_phone;

            $content = Cart::content();
            return view('ui.pages.checkout.shipping', compact('content'), [
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_phone' => $user_phone,
            ]);
        }

        $content = Cart::content();
        return view('ui.pages.checkout.shipping', compact('content'));
    }

    public function confirmShipping(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_full_name' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone_number' => 'required|digits:10',
            'shipping_province' => 'required|string|max:255',
            'shipping_district' => 'required|string|max:255',
        ]);

        // Create a new shipping record
        $shipping_id = DB::table('shipping_details')->insertGetId([
            'shipping_full_name' => $validatedData['shipping_full_name'],
            'shipping_email' => $validatedData['shipping_email'],
            'shipping_phone_number' => $validatedData['shipping_phone_number'],
            'shipping_province' => $validatedData['shipping_province'],
            'shipping_district' => $validatedData['shipping_district'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Lưu shipping_id vào session
        $request->session()->put('shipping_id', $shipping_id);

        return redirect()->route('ui.checkout.payment');
    }

    public function payment()
    {
        $content = Cart::content();
        return view('ui.pages.checkout.payment', compact('content'));
    }

    public function confirmPayment(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required|string|max:255',
            'payment_status' => 'nullable|in:active,inactive',
        ]);
        // Get user ID and shipping ID from session
        $userId = $request->session()->get('user_id');

        // Check if user ID is set
        if (!$userId) {
            // Handle the error, e.g., redirect back with an error message
            return redirect()->back()->with('error', 'user ID is missing. Please login again.');
        }

        $shippingId = $request->session()->get('shipping_id');

        // Insert the payment and order data into the database and get the IDs
        $paymentId = DB::table('payments')->insertGetId($validatedData);
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $userId,
            'shipping_id' => $shippingId,
            'payment_id' => $paymentId,
            'order_total' => str_replace(',', '', Cart::total()),
            'order_status' => 'inactive',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Get cart items
        $cartItems = Cart::Content();

        // Insert order details for each cart item
        foreach ($cartItems as $item) {
            $orderDetailsData = [
                'order_id' => $orderId,
                'products_id' => $item->id,
                'products_model' => $item->name,
                'products_quantity' => $item->qty,
                'products_price' => $item->price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('order_details')->insert($orderDetailsData);
        }

        $request->session()->put('payment_method', $validatedData['payment_method']);

        return redirect()->route('ui.checkout.complete');
    }

    public function complete()
    {
        $shipping = DB::table('shipping_details')
            ->orderBy('shipping_id', 'DESC')
            ->select('shipping_full_name as shipping_name', 'shipping_province', 'shipping_district')
            ->first();

        $payment_method = DB::table('payments')
            ->orderBy('payment_id', 'DESC')
            ->value('payment_method');

        $order_id = DB::table('orders')
            ->select('order_id')->first();

        $content = Cart::content();
        return view('ui.pages.checkout.complete', compact('content', 'shipping', 'payment_method', 'order_id'));
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('ui.index');
    }

    public function viewOrders(Request $request)
    {
        // Lấy user_id từ session
        $userId = $request->session()->get('user_id');

        if (session('user_id')) {
            $orders = DB::table('orders')
                ->leftJoin('shipping_details', 'orders.shipping_id', '=', 'shipping_details.shipping_id')
                ->leftJoin('payments', 'orders.payment_id', '=', 'payments.payment_id')
                ->where('orders.user_id', '=', $userId)
                ->get(['orders.order_id', 'orders.order_total', 'orders.order_status', 'orders.created_at', 'shipping_details.shipping_full_name', 'shipping_details.shipping_province', 'shipping_details.shipping_district', 'payments.payment_method', 'payments.payment_status']);

            return view('ui.pages.checkout.order', compact('orders'));
        }
        return redirect()->route('ui.index');
    }
}
