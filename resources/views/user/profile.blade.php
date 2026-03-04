<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>Profile</title>
</head>
<body class="min-h-screen flex flex-col bg-slate-950">

{{-- HEADER --}}
<header>
    <nav class="bg-slate-900 border-b border-slate-800 px-4 lg:px-6 py-3">
        <div class="container flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <span class="text-white text-xl font-semibold">
                {{ Auth::user()->name }}
                <span class="text-slate-400 text-base font-normal ml-2">${{ $userBalance / 100 }}</span>
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-300 hover:text-white hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Log out
                </button>
            </form>
        </div>
    </nav>
</header>

{{-- MAIN SECTION --}}
<section class="flex-1 flex flex-col text-white px-4 py-8">
    <div class="container mx-auto max-w-screen-xl flex flex-col flex-1 gap-8">

        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
            <h2 class="text-lg font-semibold mb-4 text-slate-200">Add Transaction</h2>
            <form action="{{ route('finance') }}" method="POST">
                @csrf
                <div class="flex flex-wrap gap-3 items-end">
                    <div class="flex flex-col gap-1 min-w-[140px]">
                        <label class="text-xs font-medium text-slate-400" for="money">Amount ($)</label>
                        <input type="number" name="money" step="0.01" min="0" required
                            class="rounded-md bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-500">
                    </div>
                    <div class="flex flex-col gap-1 flex-1 min-w-[200px]">
                        <label class="text-xs font-medium text-slate-400" for="description">Description</label>
                        <input type="text" name="description"
                            class="rounded-md bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-500">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-medium text-slate-400">Type</label>
                        <div class="flex gap-1 h-[38px]">
                            <label class="flex items-center gap-1.5 px-3 py-2 rounded-md bg-slate-800 border border-slate-700 cursor-pointer has-[:checked]:bg-green-700 has-[:checked]:border-green-600 text-sm transition-colors">
                                <input type="radio" name="choice" value="+" required class="accent-green-400"> +
                            </label>
                            <label class="flex items-center gap-1.5 px-3 py-2 rounded-md bg-slate-800 border border-slate-700 cursor-pointer has-[:checked]:bg-red-700 has-[:checked]:border-red-600 text-sm transition-colors">
                                <input type="radio" name="choice" value="-" required class="accent-red-400"> −
                            </label>
                        </div>
                    </div>
                    <button type="submit"
                        class="h-[38px] px-5 rounded-md bg-slate-600 hover:bg-slate-500 text-sm font-semibold text-white transition-colors whitespace-nowrap">
                        Submit
                    </button>
                </div>
            </form>

            @if ($errors->any())
                <ul class="mt-3 text-red-400 text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- TABLE --}}
        <div class="bg-slate-900 border border-slate-800 rounded-xl flex-1 overflow-hidden flex flex-col">
            <div class="overflow-auto flex-1">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left px-6 py-3">Date</th>
                            <th class="text-left px-6 py-3">Amount</th>
                            <th class="text-left px-6 py-3">Description</th>
                            <th class="text-left px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach ($history->all() as $h)
                        <tr class="hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-3 text-slate-300">{{ $h['date'] }}</td>
                            <td class="px-6 py-3 font-medium {{ $h['finance'] > 0 ? 'text-green-400' : 'text-red-400' }}">
                                {{ $h['finance'] > 0 ? '+' : '' }}{{ $h['finance'] / 100 }}$
                            </td>
                            <td class="px-6 py-3 text-slate-300">{{ $h['description'] }}</td>
                            <td class="px-6 py-3">
                                <form action="{{ route('delete', $h['id']) }}" method="POST">
                                    @csrf
                                    <button class="text-slate-500 hover:text-red-400 text-xs transition-colors">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $history->links() }}
            </div>
        </div>
    </div>
</section>

</body>
</html>