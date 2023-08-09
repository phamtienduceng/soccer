@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="hero overlay" style="background-image: url('{{ asset('css/ui/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 ml-auto">
                    <h1 class="text-white">Heo Hong Dang Yeu</h1>
                     
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex team-vs">
                    <span class="score">4-1</span>
                    <div class="team-1 w-50">
                        <div class="team-details w-100 text-center">
                            <img src="images/logo_1.png" alt="Image" class="img-fluid">
                            <h3>LA LEGA <span>(win)</span></h3>
                            <ul class="list-unstyled">
                                <li>Anja Landry (7)</li>
                                <li>Eadie Salinas (12)</li>
                                <li>Ashton Allen (10)</li>
                                <li>Baxter Metcalfe (5)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-2 w-50">
                        <div class="team-details w-100 text-center">
                            <img src="images/logo_2.png" alt="Image" class="img-fluid">
                            <h3>JUVENDU <span>(loss)</span></h3>
                            <ul class="list-unstyled">
                                <li>Macauly Green (3)</li>
                                <li>Arham Stark (8)</li>
                                <li>Stephan Murillo (9)</li>
                                <li>Ned Ritter (5)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-12 title-section">
                    <h2 class="heading">Latest News</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="post-entry">
                        <a href="#">
                            <img src="{{asset('css/ui/images/img_1.jpg')}}" alt="Image" class="img-fluid">
                        </a>
                        <div class="caption">
                            <div class="caption-inner">
                                <h3 class="mb-3">Romolu to stay at Real Nadrid?</h3>
                                <div class="author d-flex align-items-center">
                                    <div class="img mb-2 mr-3">
                                        <img src="{{asset('css/ui/images/person_1.jpg')}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-entry">
                        <a href="#">
                            <img src="{{asset('css/ui/images/img_3.jpg')}}" alt="Image" class="img-fluid">
                        </a>
                        <div class="caption">
                            <div class="caption-inner">
                                <h3 class="mb-3">Kai Nets Double To Secure Comfortable Away Win</h3>
                                <div class="author d-flex align-items-center">
                                    <div class="img mb-2 mr-3">
                                        <img src="{{asset('css/ui/images/person_2.jpg')}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-entry">
                        <a href="#">
                            <img src="{{asset('css/ui/images/img_2.jpg')}}" alt="Image" class="img-fluid">
                        </a>
                        <div class="caption">
                            <div class="caption-inner">
                                <h3 class="mb-3">Dogba set for Juvendu return?</h3>
                                <div class="author d-flex align-items-center">
                                    <div class="img mb-2 mr-3">
                                        <img src="{{asset('css/ui/images/person_2.jpg')}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="widget-next-match">
                        <div class="widget-title">
                            <h3>Next Match</h3>
                        </div>
                        <div class="widget-body mb-3">
                            <div class="widget-vs">
                                <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                    <div class="team-1 text-center">
                                        <img src="{{ asset('css/ui/images/logo_1.png') }}" alt="Image">
                                        <h3>Football League</h3>
                                    </div>
                                    <div>
                                        <span class="vs"><span>VS</span></span>
                                    </div>
                                    <div class="team-2 text-center">
                                        <img src="{{ asset('css/ui/images/logo_2.png') }}" alt="Image">
                                        <h3>Soccer</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center widget-vs-contents mb-4">
                            <h4>Start at</h4>
                            <p class="mb-5">
                                <span class="d-block">December 20th, 2020</span>
                                <span class="d-block">9:30 AM GMT+0</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="widget-next-match">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- list team --}}
                                <tr>
                                    <td>1</td>
                                    <td><strong class="text-white">MC</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- .site-section -->

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-6 title-section">
                    <h2 class="heading">Videos</h2>
                </div>
                <div class="col-6 text-right">
                    <div class="custom-nav">
                        <a href="#" class="js-custom-prev-v2"><span class="icon-keyboard_arrow_left"></span></a>
                        <span></span>
                        <a href="#" class="js-custom-next-v2"><span class="icon-keyboard_arrow_right"></span></a>
                    </div>
                </div>
            </div>


            <div class="owl-4-slider owl-carousel">
                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Dogba set for Juvendu return?</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Dogba set for Juvendu return?</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="video-media">
                        <img src="{{ asset('css/ui/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                            <span class="icon mr-3">
                                <span class="icon-play"></span>
                            </span>
                            <div class="caption">
                                <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container site-section">
        <div class="row">
            <div class="col-6 title-section">
                <h2 class="heading">Our Blog</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="custom-media d-flex">
                    <div class="img mr-4">
                        <img src="{{ asset('css/ui/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="text">
                        <span class="meta">May 20, 2020</span>
                        <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora
                            dolorem.</p>
                        <p><a href="#" class="text-danger">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="custom-media d-flex">
                    <div class="img mr-4">
                        <img src="{{ asset('css/ui/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="text">
                        <span class="meta">May 20, 2020</span>
                        <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora
                            dolorem.</p>
                        <p><a href="#" class="text-danger">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
