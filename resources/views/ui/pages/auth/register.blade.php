@extends('ui.layouts.app')

@section('title', 'Register')

@section('content')<div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 mx-auto text-center">
                    <h1 class="text-white">Register</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <section class="w-100 p-4 d-flex justify-content-center pb-4 mt-5">
            <div style="width: 26rem;">
                <div class="tab-content rounded-5 shadow-5-strong p-5">
                    <h4 class="fw-bold">Join us today!</h4>
                    <p class="mb-4" style="color: #45526e;">Create an account by filling in your information below.</p>
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('ui.AuthRegister') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="user_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone number (optional)</label>
                            <input type="text" class="form-control" name="user_phone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="user_password_confirmation">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <hr>
                    <div class="col d-flex justify-content-center">
                        <a href="{{ route('ui.AuthRegisterForm') }}" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                            Fogot your password?
                        </a>
                    </div>
                    {{-- @include('auth.pages.auth.options.forgot-password') --}}
                </div>
            </div>
        </section>
    </div>
@endsection
