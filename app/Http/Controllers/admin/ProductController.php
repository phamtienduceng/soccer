<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.pages.products.list', compact('products', 'categories'));
    }

    public function gallery()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.pages.products.gallery', compact('products', 'categories'));
    }

    public function add()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('admin.pages.products.add', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'products_model' => 'required',
            'categories_id' => 'required|integer',
            'products_price' => 'required|numeric',
            'products_material' => 'required',
            'products_style' => 'required',
            'products_size' => 'required',
            'products_maxload' => 'required|numeric',
            'products_thumbnails' => 'image|max:2048',
            'products_gallery.*' => 'image|max:2048',
            // validate each image in the array
            'products_status' => 'required',
        ]);

        // Create a new product
        $product = new Product();
        $product->products_model = $validatedData['products_model'];
        $product->categories_id = $validatedData['categories_id'];
        $product->products_price = $validatedData['products_price'];
        $product->products_material = $validatedData['products_material'];
        $product->products_style = $validatedData['products_style'];
        $product->products_size = $validatedData['products_size'];
        $product->products_maxload = $validatedData['products_maxload'];
        $product->products_status = $request->input('products_status', 'inactive');

        // Handle product thumbnail
        if ($request->hasFile('products_thumbnails')) {
            $thumbnail = $request->file('products_thumbnails');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnailPath = 'public/images/products/' . $product->category->categories_name . '/' . $product->products_model . '/';
            $thumbnail->storeAs($thumbnailPath, $thumbnailName);
            $product->products_thumbnails = 'images/products/' . $product->category->categories_name . '/' . $product->products_model . '/' . $thumbnailName;
        }


        // Handle product gallery
        if ($request->hasFile('products_gallery')) {
            $gallery = $request->file('products_gallery');
            $galleryPath = 'public/images/products/' . $product->category->categories_name . '/' . $product->products_model . '/';
            $galleryArray = [];
            foreach ($gallery as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs($galleryPath, $imageName);
                $galleryArray[] = 'images/products/' . $product->category->categories_name . '/' . $product->products_model . '/' . $imageName;
            }
            $product->products_gallery = json_encode($galleryArray); // convert the array to a JSON string
        }

        // Save the product to the database
        $product->save();

        // Redirect the user back to the product list page
        return redirect()->route('admin.product.list')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.pages.products.edit-info', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'products_model' => 'required',
            'categories_id' => 'required|integer',
            'products_price' => 'required|numeric',
            'products_material' => 'required',
            'products_style' => 'required',
            'products_size' => 'required',
            'products_maxload' => 'required|numeric',
            'products_status' => 'required',
        ]);

        $product->products_model = $validatedData['products_model'];
        $product->categories_id = $validatedData['categories_id'];
        $product->products_price = $validatedData['products_price'];
        $product->products_material = $validatedData['products_material'];
        $product->products_style = $validatedData['products_style'];
        $product->products_size = $validatedData['products_size'];
        $product->products_maxload = $validatedData['products_maxload'];
        $product->products_status = $request->input('products_status', 'inactive');

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'Product updated successfully');
    }

    public function edit_gallery($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.pages.products.edit-gallery', compact('product', 'categories'));
    }

    public function update_gallery(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'products_thumbnails' => 'image|max:2048',
            'products_gallery.*' => 'image|max:2048', // validate each image in the array
        ]);

        // Handle product thumbnail
        if ($request->hasFile('products_thumbnails')) {
            $thumbnail = $request->file('products_thumbnails');
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnailPath = 'public/images/products/' . $product->category->categories_name . '/' . $product->products_model . '/';
            $thumbnail->storeAs($thumbnailPath, $thumbnailName);
            $product->products_thumbnails = 'images/products/' . $product->category->categories_name . '/' . $product->products_model . '/' . $thumbnailName;
        }

        // Handle product gallery
        if ($request->hasFile('products_gallery')) {
            $gallery = $request->file('products_gallery');
            $galleryPath = 'public/images/products/' . $product->category->categories_name . '/' . $product->products_model . '/';
            $galleryArray = [];
            foreach ($gallery as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs($galleryPath, $imageName);
                $galleryArray[] = 'images/products/' . $product->category->categories_name . '/' . $product->products_model . '/' . $imageName;
            }
            $product->products_gallery = $galleryArray;
        }

        // Save the product to the database
        $product->save();

        // Redirect the user back to the product list page
        return redirect()->route('admin.product.gallery')->with('success', 'Product gallery updated successfully');
    }

    public function delete($id)
    {
        $Product = Product::findOrFail($id);

        $Product->delete();

        return redirect()->route('admin.product.list')->with('success-del', 'Product deleted successfully!');
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::where('products_status', 'active')->get();
        return view('ui.pages.product.index', compact('categories', 'products'));
    }

    // Trang chi tiết sản phẩm
    public function show($id)
    {
        $categories = Category::all();
        try {
            $product = Product::where('products_model', $id)->firstOrFail();
            $category = Category::findOrFail($product->categories_id);

            $url = asset($category->categories_thumbnails);
            $related_products = Product::where('categories_id', $product->categories_id)
                ->where('products_id', '!=', $product->products_id)
                ->where('products_status', 'active')
                ->inRandomOrder()
                ->take(4)
                ->get();
            $product_manage = view('ui.pages.product.show', compact('product', 'category', 'categories', 'related_products', 'url'));

            return view('ui.layouts.app', ['content' => $product_manage]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // C:\xampp\htdocs\soccer\App\resources\views\admin\pages\products\list.blade.php
            return redirect()->route('product.index')->with('error', 'Không tìm thấy sản phẩm hoặc danh mục!');

        }
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $searchTerm = $request->input('searchTerm');
        $products = Product::where('products_model', 'LIKE', $searchTerm . '%')
            ->where('products_status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('ui.pages.product.search', compact('categories', 'products', 'searchTerm'));
    }
}
