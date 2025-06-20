<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Bioskop App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navbar')
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</body>

</html>