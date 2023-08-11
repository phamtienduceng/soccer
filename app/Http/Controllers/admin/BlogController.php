<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cate_blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $cate_blog_id = Cate_blog::all();
        $users = User::all();

        $mapCategory = $cate_blog_id->mapWithKeys(function ($item) {
          return [$item->cate_blog_id => $item->name];
        });
        $mapUser = $users->mapWithKeys(function ($item) {
            return [$item->user_id => $item->user_name];
          });

        //dd($map->get('1'));

        foreach ($blogs as $blog) {
            $blog->categoryName = $mapCategory->get($blog->category);
            $blog->author = $mapUser->get($blog->user_id);
        }
        // dd($blogs);
        // dd($cate_blog_id);
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
        if($request->hasFile('image'))
            {
                $file = $request -> file('image');
                $ext = $file->getClientOriginalExtension();
                if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
                {
                    $blogs = Blog::all();
                    return view('admin.pages.blog.create')
                        ->with('error', 'only jpg, png or jpeg');
                }
                $photoName = $file->getClientOriginalName();
                $file->move('css/ui/images', $photoName);
            }else
            {
                $photoName = null;
            }

            $blog['image'] = $photoName;

        Blog::create($blog);

        return redirect()->route('admin.blog.index');
    }

    public function viewPost($id)
    {
        $blog = Blog::find($id);
        $cate_blog_id = Cate_blog::all();

        return view('admin.pages.blog.viewPost', compact('blog', 'cate_blog_id'));
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        $cate_blog_id = Cate_blog::all();

        return view('admin.pages.blog.edit', compact('blog', 'cate_blog_id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|max:2048',
            'category' => 'required',
            'published' ,
        ]);

        $blog = Blog::findOrFail($id);
        $cate_blog_id = Cate_blog::all();

        $blog->title = $request->input('title');
        $blog->published = $request->input('published');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath =  $imageName;
            $image->storeAs('public/' . $imagePath);
            $blog->image = $imagePath;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success-update', 'Blog has been updated successfully.');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $cate_blog_id = Cate_blog::all();

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success-del', 'Blog deleted successfully!');
    }
}
