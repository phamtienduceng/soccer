<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Cate_blog;

class uiBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $cate_blog_id = Cate_blog::all();

        return view('ui.pages.blogs', compact('blogs', 'cate_blog_id'));
    }
    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        $cate_blog_id = Cate_blog::all();

        return view('ui.pages.blogDetail', compact('blog', 'cate_blog_id'));
    }
}
