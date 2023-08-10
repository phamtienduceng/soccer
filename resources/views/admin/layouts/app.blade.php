<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.png') }}" />
    @include('admin.layouts.include.styles')
  
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Include loader from the soccer layout -->
    @include('admin.layouts.include.loader')

    @include('admin.layouts.include.navigation')

    <!-- Sidebar: Merging the sidebars of both the templates -->
    @include('admin.layouts.include.sidebar')


    <main class="pc-container">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        @yield('header')
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <!-- Main content yield: You can decide which one to use or even merge both if required -->
                            @yield('content')
                            @yield('main')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Include scripts from both layouts -->
    @include('admin.layouts.include.scripts')


</body>
</html>
