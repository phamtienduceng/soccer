<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('admin.layouts.include.styles')

</head>

<body>
    @include('admin.layouts.include.loader')
    @include('admin.layouts.include.navigation')
    @include('admin.layouts.include.sidebar')
    <main class="pc-container">
        @yield('content')
    </main>
    @include('admin.layouts.include.scripts')
</body>

</html>
