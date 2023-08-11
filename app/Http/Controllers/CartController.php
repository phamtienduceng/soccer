<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $content = Cart::content();

        return view('ui.pages.cart.index', compact('content'));
    }
    public function add($id, Product $product)
    {
        $product = $product->find($id);

        $data = [
            'id' => $product->products_id,
            'qty' => 1,
            'name' => $product->products_model,
            'price' => $product->products_price,
            'options' => [
                'image' => $product->products_thumbnails,
                'categories' => $product->category->categories_name,
                'size' => $product->products_size,
                'style' => $product->products_style,
                'maxload' => $product->products_maxload,
            ],
        ];

        Cart::add($data);

        return redirect()->route('ui.cart.index');
    }

    public function remove($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function destroy()
    {
        Cart::destroy();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
