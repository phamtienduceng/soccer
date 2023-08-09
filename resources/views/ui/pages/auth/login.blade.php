@extends('ui.layouts.app')

@section('title', 'Login')

@section('content')
    <section class="w-100 p-4 d-flex justify-content-center pb-4 mt-5">
        <div style="width: 26rem;">
            <div class="tab-content bg-white rounded-5 shadow-5-strong p-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="logo" style="width: 40%" class="mb-4">
                </div>
                <h4 class="fw-bold" style="color: #92aad0;">Welcome back</h4>
                <p class="mb-4" style="color: #45526e;">To log in, please fill in these text fields with your
                    e-mail address and password.</p>
                @if ($errors->has('auth_invalid'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('auth_invalid') }}
                    </div>
                @endif
                @if ($errors->has('status_invalid'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('status_invalid') }}
                    </div>
                @endif
                <form action="{{ route('ui.AuthPost') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" style="color: black" name="user_email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1"  class="form-label">Password</label>
                        <input type="password" class="form-control" style="color: black" name="user_password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="col d-flex justify-content-center">
                    <a href="" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Fogot your password?
                    </a>
                </div>
                {{-- @include('auth.pages.auth.options.forgot-password') --}}
                <hr>
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('ui.AuthRegisterForm') }}">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
