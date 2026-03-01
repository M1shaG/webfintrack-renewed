<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Finance Tracker</title>
</head>

{{-- Header --}}
<body class="min-h-screen flex flex-col">
    <header>
        <nav class="bg-slate-950 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="container flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center gap-3">
                    <img src="{{ asset('favicon.svg') }}" class="invert h-6 sm:h-9 block " alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">WFT</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="{{ route('login') }}" class="text-gray-100 dark:text-gray-100 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 hover:opacity-90">Log in</a>
                  <a href="{{ route('registration') }}" class="text-gray-100 dark:text-gray-100 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 hover:opacity-90">Get started</a>
                </div>
            </div>
        </nav>
    </header>

    {{-- Hero --}}
    <section class="bg-slate-950 flex-1 flex items-center justify-center">
        <div class="text-center text-white">
             <div class="text-8xl font-bold">WebFinTracker</div>
             <div class="text-3xl opacity-80">Welcome to your finance tracker!</div>
        </div>
    </section>

    {{-- Footer --}}
    <footer>
        <nav class="bg-slate-950 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="container flex justify-between items-center mx-auto max-w-screen-xl">
                
                <a href="#" class="flex items-center gap-3">
                    <i class="fa-brands fa-github text-xl font-semibold text-slate-600"></i>
                    <span class="text-xl font-semibold text-slate-600">
                        Github
                    </span>
                </a>

                <div class="text-slate-600 text-sm">
                    Icon created by
                    <a href="https://www.svgrepo.com/svg/425585/money-banking-cash">Ryan Adryawan</a>
                </div>

            </div>
        </nav>
    </footer>
</body>
</html>