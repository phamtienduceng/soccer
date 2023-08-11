@extends('admin.layouts.app')

@section('title', 'Blog ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Blog</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.blog.post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Type</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="" selected disabled hidden>Select type</option>
                                    @foreach($cate_blog_id as $cate_blog_id)
                                        <option value="{{ $cate_blog_id->cate_blog_id }}">{{ $cate_blog_id->name }}</option>
                                    @endforeach
                                </select>
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
                            {{--
                            <div class="form-group">
                                <label for="user_id">Author</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" required
                                value="{{session()->get('user_id')}}">
                            </div>--}}


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Team</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <SCript>
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
    </SCript>
@endsection