<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#133d34">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Money Maze — Paving Your Financial Path')</title>
    <meta name="description" content="Personal finance, investments, taxation and financial organisation with Mitali Mehta, CA, CFP® and Lawyer.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>
    <x-site-nav :nav-links="$navLinks ?? []" :sc="$sc ?? []" />
    <main id="main-content">
        @if (session('success'))
            <div class="flash-message" role="status">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
    <x-site-footer :regulatory-note="$regulatoryNote ?? null" :nav-links="$navLinks ?? []" :sc="$sc ?? []" />
    @stack('scripts')
</body>
</html>
