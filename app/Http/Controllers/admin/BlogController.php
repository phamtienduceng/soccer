<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cate_blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $cate_blog_id = Cate_blog::all();

        return view('admin.pages.blog.index', compact('blogs', 'cate_blog_id'));
    }

    public function addPost()
    {
        $blogs = Blog::all();
        $cate_blog_id = Cate_blog::all();

        return view('admin.pages.blog.create', compact('blogs', 'cate_blog_id'));
    }

    public function post(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required',
            'published',
        ]);
        $blog = $request->all();
        if ($request->session()->has('user_id'))
        {
            $blog['user_id'] = $request->session()->get('user_id');
        }
        Blog::create($blog);

        return redirect()->route('admin.blog.index');
    }

}
