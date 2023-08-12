@extends('admin.layouts.app')

@section('title', 'Contact ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Contact Us</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Contact Us</li>
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
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Admin</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <form method="POST"  action="{{ route('ui.send.email') }}">
                        @csrf
                        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
                        <div class="form-group" >
                          <input type="hidden" class="form-control" placeholder="Name" name="name" value="Soccer" >
                           @error('name')
						   <span style="color: red">{{$message}}</span>
							@enderror
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                            @error('email')
							<span style="color: red">{{$message}}</span>
							@enderror
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" placeholder="Subject" name="subject"value="Soccer">
                            @error('subject')
							 <span style="color: red">{{$message}}</span>
							@enderror
                        </div>
                        <div class="form-group">
                          <textarea name="message"  class="form-control" id="" cols="30" rows="10" placeholder="Write something..." value="{{ old('message') }}"></textarea>
                            @error('message')
							  <span style="color: red">{{$message}}</span>
							@enderror
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary py-3 px-5">
                             Send
                            </button>
                        </div>
                          </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


