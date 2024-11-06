<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <h1>My Website</h1>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('projects.index') }}">View Projects</a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer Content -->
    </footer>
</body>

</html>
