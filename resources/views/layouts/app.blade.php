<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $heading ?? 'Bank' }}</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-600 to-black text-white antialiased">
    @yield('content')
</body>
</html>
