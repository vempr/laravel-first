<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav>
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
        <x-nav-link href="/jobs/create" :active="request()->is('jobs/create')">Create Job</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
        @guest
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
        @endguest
        @auth
            <form method="POST" action="/logout">
                @csrf

                <button type="submit">Log Out</button>
            </form>
        @endauth
    </nav>

    {{ $slot }}
</body>

</html>