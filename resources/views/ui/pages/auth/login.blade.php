@extends('ui.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 mx-auto text-center">
                    <h1 class="text-white">Log in</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <section class="w-100 p-4 d-flex justify-content-center pb-4 mt-5">
            <div style="width: 26rem;">
                <div class="tab-content rounded-5 shadow-5-strong p-5">
                    <h4 class="fw-bold">Welcome back</h4>
                    <p class="mb-4 text-danger">To log in, please fill in these text fields with your
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
                            <input type="email" class="form-control" name="user_email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                    <hr class="bg-danger">
                    <div class="col d-flex justify-content-center">
                        <a href="{{ route('ui.AuthRegisterForm') }}">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
