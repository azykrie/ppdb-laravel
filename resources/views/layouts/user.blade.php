<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title', 'Aplikasi Laravel')</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        @include('layouts.user-pages.sidebar')

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

    </div>
    @stack('scripts')
</body>

</html>
