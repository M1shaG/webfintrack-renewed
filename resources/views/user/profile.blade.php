<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile</title>
</head>

<body class="min-h-screen flex flex-col">
    <header>
        <nav class="bg-slate-950 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="container flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <div href="#" class="flex items-center gap-3 text-white">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ Auth::user()->name }} {{ $userBalance / 100 }}$</span>
                </div>
                <div class="flex items-center lg:order-2">
                    <div class="text-gray-100 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 hover:opacity-90">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-slate-950 text-white flex-1 flex">
    
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="{{ route('finance') }}" method="POST">
            @csrf
            <h1>Registration</h1>
            <div>
                <label class="block text-sm/6 font-medium text-gray-100" for="money">Money:</label>
                <div class="mt-2"><input type="number" name="money" step="0.01" min="0" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-slate-600 sm:text-sm/6" required></div>
            </div>
            
            <label for="description">Description:</label>
            <input type="text" name="description">

            <input type="radio" name="choice" value="+" required>+<br>
            <input type="radio" name="choice" value="-" required>-<br>

            <button type="submit">Submit</button>
        </form>
    </div>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Money</th>
                    <th>Description</th>
                    <th>Delete</th>
                </tr>
        @foreach ($history->all() as $h)
            <tr>
                <td>{{$h['date']}}</td>
                <td>{{$h['finance'] / 100}}</td>
                <td>{{$h['description']}}</td>
                <td>                
                    <form action=" {{ route('delete', $h['id']) }}" method="POST">
                    @csrf
                    <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    </section>
</body>
</html>
