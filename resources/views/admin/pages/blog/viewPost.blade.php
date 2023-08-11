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
                <input type="text" class="form-control" id="title" name="title" required value="">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" id="content" name="content" required
                    value="" height="100px">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Old Image</label> <br>
                <img src="" alt="" class=""
                    style="max-width: 200px; max-height: 200px;">
            </div>

            <!-- <input type="file" name="chooseFile" id="chooseFile"> -->

            <div class="form-group">
                <label for="category">Type</label>
                
            </div>

            <div class="form-group">
                <label for="published">Publised</label>
                <div class="form-group">
                    <div class="form-check form-switch">
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