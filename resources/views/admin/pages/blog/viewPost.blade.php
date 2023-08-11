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
                <input type="text" class="form-control" id="title" name="title" required value="{{ $blog->title }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" id="content" name="content" required
                    value="{{ $blog->content }}" height="100px">
                    <!-- <textarea class="form-control" name="content" id="content" rows="8" >{{ $blog->content }}</textarea> -->
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Old Image</label> <br>
                <img src="{{ asset('/css/ui/images/'.$blog->image)}}" alt="{{ $blog->title }}" class=""
                    style="max-width: 200px; max-height: 200px;">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">New Image</label> <br>
                <input type="file" class="form-control" id="image" name="image" width="100px">
            </div>

            <!-- <input type="file" name="chooseFile" id="chooseFile"> -->
            
            <div class="form-group">
                <label for="category">Type</label>
                <select name="category" id="category" class="form-control" required>
                    @foreach($cate_blog_id as $cate_blog_id)
                    <option value="{{ $cate_blog_id->cate_blog_id }}"
                        {{ $blog->category == $cate_blog_id->cate_blog_id ? 'selected' : ' ' }}>
                        {{ $cate_blog_id->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="published">Publised</label>
                <div class="form-group">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="published" id="statusCheckbox" checked
                            value="Inactive">
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