<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('admin.pages.categories.list', compact('categories'));
    }

    public function add()
    {
        return view('admin.pages.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categories_name' => 'required|max:255',
            'categories_thumbnails' => 'nullable|image',
            'categories_status' => 'required|in:active,inactive',
        ]);

        $category = new Category();
        $category->categories_name = $request->input('categories_name');
        $category->categories_status = $request->input('categories_status');

        if ($request->hasFile('categories_thumbnails')) {
            $thumbnails = $request->file('categories_thumbnails');
            $thumbnailsName = $thumbnails->getClientOriginalName();
            $thumbnailsPath = $thumbnails->storeAs('public/images/products/' . $category->categories_name, $thumbnailsName);
            $category->categories_thumbnails = str_replace('public/', '', $thumbnailsPath);
        }

        if ($category->save()) {
            return redirect()->route('admin.category.add')->with('success', 'Category added successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to add category. Please try again.');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categories_name' => 'required|max:255',
            'categories_thumbnails' => 'image|max:2048',
            'categories_status' => 'required|in:active,inactive',
        ]);

        $category = Category::findOrFail($id);

        $category->categories_name = $request->input('categories_name');
        $category->categories_status = $request->input('categories_status');

        if ($request->hasFile('categories_thumbnails')) {
            $image = $request->file('categories_thumbnails');
            $imageName = $image->getClientOriginalName();
            $imagePath = 'images/products/' . $category->categories_name . '/' . $imageName;
            $image->storeAs('public/' . $imagePath);
            $category->categories_thumbnails = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.category.list')->with('success-update', 'Category has been updated successfully.');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.category.list')->with('success-del', 'Category deleted successfully!');
    }
}
