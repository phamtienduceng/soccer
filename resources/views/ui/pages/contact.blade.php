@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 mx-auto text-center">
                    <h1 class="text-white">Contact</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">

                    <form method="POST" action="{{ route('ui.getContactUs') }}">
                        <div class="form-group">
                            @csrf
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" placeholder="Name" name="name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject">
                            @error('subject')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="message" class="form-control" id="" cols="30" rows="10"
                                placeholder="Write something..." value="{{ old('message') }}"></textarea>
                            @error('message')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 ml-auto">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d346.42248377802827!2d106.66620410674304!3d10.786554805968628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23c80767d%3A0x5a981a5efee9fd7d!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1691596920623!5m2!1svi!2s"
                        width="460" height="443" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
