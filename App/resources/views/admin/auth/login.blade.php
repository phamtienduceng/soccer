@extends('admin.layouts.auth-base')

@section('title', 'Login ')

@section('content')
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <a href="#" class="d-flex justify-content-center">
                        <img src="{{ asset('css/admin/images/logo-dark.svg') }}" />
                    </a>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="auth-header">
                                <h2 class="text-secondary mt-5"><b>Hi, Welcome Back</b></h2>
                                <p class="f-16 mt-2">Enter your credentials to continue</p>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('auth_invalid'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('auth_invalid') }}
                        </div>
                    @endif
                    @if ($errors->has('role_invalid'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('role_invalid') }}
                        </div>
                    @endif
                    <h5 class="my-4 d-flex justify-content-center">Sign in with Email address</h5>

                    <form action="{{ route('admin.AuthPost') }}" method="post">

                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg" name="user_email" autocomplete="off">
                            <label for="floatingInput">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-lg" name="user_password" type="password"
                                autocomplete="off">
                            <label for="floatingInput">Password</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Sign In</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
