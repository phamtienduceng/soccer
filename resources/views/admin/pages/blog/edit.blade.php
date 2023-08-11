@extends('admin.layouts.app')

@section('title', 'Blog')

@section('header')
    <div class="p-3">
        <h1 class="">Blog</h1>
        <nav class="d-flex">
            <h6 class="">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active">Edit Blog</li>
                </ol>
            </h6>
        </nav>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.blog.update', $blog->post_id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please fix the following errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="{{ $blog->title }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" class="form-control" id="content" name="content" required
                        value="{{ $blog->content }}">
                </div>

                <div class="form-group">
                    <label for="category">Type</label>
                    <select name="category" id="category" class="form-control" required>
                        @foreach($cate_blog_id as $cate_blog_id)
                            <option value="{{ $cate_blog_id->cate_blog_id }}" {{ $blog->category == $cate_blog_id->cate_blog_id ? 'selected' : ' ' }}>{{ $cate_blog_id->name }}</option>
                        @endforeach
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image"
                        src="{{ asset('/css/ui/images/'.$blog->image)}}">
                </div>

                <div class="form-group">
                    <label for="published">Publised</label>
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="published"
                                id="statusCheckbox" checked value="Inactive">
                            <span id="statusText">Active</span>
                        </div>
                    </div>
                 </div>

                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        const checkbox = document.getElementById('statusCheckbox');
const statusText = document.getElementById('statusText');
checkbox.addEventListener('change', function() {
    if (this.checked) {
        checkbox.value = 'Active';
        statusText.innerText = 'Active';
    } else {
        checkbox.value = 'Inactive';
        statusText.innerText = 'Inactive';
    }
});
    </script>
@endsection