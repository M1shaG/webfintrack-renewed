<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Finance Tracker</title>
</head>
<body>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div>xDdsfdsf</div>
        </nav>
    </header>
    <a href="{{ route('login') }}" class="hover:opacity-90">Login</a>
    <a href="{{ route('registration') }}" class="hover:opacity-90">Registration</a>
</body>
</html>