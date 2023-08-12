@extends('ui.layouts.app')
@section('title', 'Blog')

@section('content')
<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto text-center">
                <h1 class="text-white">Blog Posts</h1>
                <p>SoccerTM</p>
            </div>
        </div>
    </div>
</div>



<div class="container site-section">
    <div class="row">
        <div class="col-6 title-section">
            <h2 class="heading">News</h2>
        </div>
    </div>
    <div class="row">
        @foreach($blogs as $i)
        <div class="col-lg-4 mb-4">
            <div class="custom-media d-block">
                <div class="img mb-4">
                    <a href="{{route('ui.blogDetail.index', $i->post_id)}}"><img src="{{ asset('/css/ui/images/'.$i->image)}}" alt="Image"
                            class="img-fluid"></a>
                </div>
                <div class="text">
                    <span class="meta">Author: {{$i->user->user_name}}</span>
                    <span class="meta">Date: {{$i->created_at->todatestring()}}</span>
                    <h3 class="mb-4"><a href="{{route('ui.blogDetail.index', $i->post_id)}}">{{$i->title}}</a></h3>
                    <p><a href="{{route('ui.blogDetail.index', $i->post_id)}}">Read more</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="custom-pagination">
                <a href="#">1</a>
                <span>2</span>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
            </div>
        </div>
    </div>
</div>
@endsection