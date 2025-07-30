<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Just Eat')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

    <header>
        @include('layouts.navbar')
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    @stack('scripts')
    @stack('styles')
</body>
</html>