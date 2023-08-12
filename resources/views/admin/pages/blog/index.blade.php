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
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center">
                            New post?
                            <span>
                                <a href="{{ route('admin.blog.addPost') }}">
                                    <span class="pc-micon"><i class="ti ti-circle-plus"></i></span>
                                    <span class="pc-mtext">Create now</span>
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if (session()->has('success-update') || session()->has('success-del'))
        <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-check me-2"></i>
                <span>{{ session()->get('success-update') ?: session()->get('success-del') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <span>{{ session()->get('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table text-center" id="category-table">
                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Author</th>
                        <th scope="col">Create Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $b)
                        <tr>
                            <td>
                                {{ $b->post_id  }}
                            </td>

                            <td>
                                {{ $b->title }}
                            </td>

                            <td>
                                @if ($b->image)
                                    <img src="{{ asset('/css/ui/images/'.$b->image)}}"
                                        alt="{{ $b->title }}" class=""
                                        style="max-width: 100px; max-height: 100px;">
                                @else
                                    N/A
                                @endif
                            </td>
                                
                            <td>
                                {{$b->categoryName}}
                            </td>

                            <td>
                                {{$b->author}}

                            </td>

                            <td>
                                {{ $b->created_at->todatestring()}}                                
                            </td>

                            <td>
                                {{ ucfirst($b->published) }} 
                            </td>

                            <td>
                                
                                <a href="{{ route('admin.blog.viewPost', $b->post_id) }}"
                                    class=" btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <a href="{{ route('admin.blog.edit', $b->post_id) }}"
                                    class=" btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('admin.blog.delete', $b->post_id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm border-0" 
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="fas fa-trash-alt" style = "color:red;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection