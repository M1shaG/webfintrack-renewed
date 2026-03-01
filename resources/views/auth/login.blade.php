<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Sign up for tracker - WFT</title>
</head>
<body class="h-full">
    
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="{{ asset('favicon.svg') }}" alt="WFT" class="invert mx-auto h-16 w-auto" />
        <h2 class="mt-1 text-center text-2xl/9 font-bold tracking-tight text-white">Sign up to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-100">Email:</label>
                <div class="mt-2">
                    <input 
                        type="text"
                        name="email"
                        required
                        value="{{  old('email') }}"
                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-slate-500 sm:text-sm/6"    
                        >
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm/6 font-medium text-gray-100">Password:</label>
                <div class="mt-2">
                    <input 
                        type="password"
                        name="password"
                        required
                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-slate-500 sm:text-sm/6"
                        >
                </div>
            </div>

            <button type="submit" class="flex w-full justify-center rounded-md bg-slate-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-slate-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-500">Sign in</button>
        </form>

    <p class="mt-10 text-center text-sm/6 text-gray-400">
        New to WFT?
        <a href="{{ route('registration') }}" class="font-semibold text-slate-400 hover:text-slate-300">Create an account</a>
    </p>
    
    <div class="mt-10 text-center text-sm/6 text-red-400">
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    
    </div>
</div>

</body>
</html>
