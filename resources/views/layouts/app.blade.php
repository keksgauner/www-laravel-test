<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    <header class="bg-gray-800 text-white p-4 fixed w-full top-0">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl">My Website</a>
            <nav>
                <a href="{{ route('home') }}"
                    class="mr-4 hover:text-gray-400 {{ request()->routeIs('home') ? 'text-blue-500' : '' }}">Home</a>
                <a href="{{ route('calculator') }}"
                    class="mr-4 hover:text-gray-400 {{ request()->routeIs('calculator') ? 'text-blue-500' : '' }}">Calculator</a>
                <a href="{{ route('projects.index') }}"
                    class="mr-4 hover:text-gray-400 {{ request()->routeIs('projects.index') ? 'text-blue-500' : '' }}">View
                    Projects</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow pt-16">
        <h1 class="mx-auto text-center text-3xl">@yield('title', 'Default Title')</h1>
        <div class="container mx-auto p-4">
            @yield('content')
        </div>
        @yield('scripts')
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-auto">
        <div class="container mx-auto text-center">
            &copy; 2024 My Website
        </div>
    </footer>
</body>

</html>
