<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Page')</title>

    <!-- Tailwind CSS CDN (you can replace this with Laravel Mix or Vite if needed) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

    <!-- Main Content -->
        @yield('content')

</html>
