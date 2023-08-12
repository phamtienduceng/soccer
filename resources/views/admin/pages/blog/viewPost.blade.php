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
                    <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active">View Blog Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" readonly value="{{ $blog->title}}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content"rows="8" readonly >{{ $blog->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label> <br>
                <img src="{{ asset('/css/ui/images/'.$blog->image)}}" alt="{{ $blog->title }}" class=""
                    style="max-width: 200px; max-height: 200px;">
            </div>

            <!-- <input type="file" name="chooseFile" id="chooseFile"> -->

            <div class="form-group">
                <label for="category">Type</label>
                <input type="text" class="form-control" id="title" name="title" readonly value="{{ $blog->cate->name}}">
            </div>

            <div class="form-group">
                <label for="published">Publised: </label>
                <span id="statusText">{{$blog->published}}</span>
            </div>

            <div class="form-group">
                <label for="user_id">Author: </label>
                <span id="user_id">{{$blog->user->user_name}}</span>
            </div>
            
            <div class="form-group">
                <label for="created_at">Date: </label>
                <span id="created_at">{{$blog->created_at->todatestring()}}</span>
            </div>

            <div class="text-center">
            <a href="{{ route('admin.blog.index') }}"> <button class="btn btn-primary" type="submit">Back</button></a>
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