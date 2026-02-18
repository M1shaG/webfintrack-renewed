<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Finance Tracker</title>
</head>
<body class="min-h-screen bg-slate-50 dark:bg-black dark:text-white">
    <header class="bg-sky-700 text-white sticky top-0 z-10 mb-10">
        <section class="max-w-4xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text3x1 font-medium">
                Tracker
            </h1>

            <button id="mobile-open-button" class="text-3x1 sm:hidden focus:outline-none">
                &#9776;
            </button>

            <nav class="hidden sm:block space-x-8 text-x1" aria-label="main">
                <a href="{{ route('login') }}" class="hover:opacity-90">Login</a>
                <a href="{{ route('registration') }}" class="hover:opacity-90">Registration</a>
            </nav>
        </section>
    </header>


    <main class="max-w-4xl mx-auto">
        <section id="hero" class="flex flex-col-reverse justify-center sm:flex-row px-6 items-center gap-8 mb-12">
            <article class="sm:w-1/2">
                <h2 class="max-w-md text4x1 font-bold text-center sm:text-5xl sm:text-left text-slate-900:dark:text-white">
                    Your Finance Tracker
                </h2>
            </article>
        </section>
    </main>

</body>
</html>