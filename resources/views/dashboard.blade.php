<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')

    {{-- HERO SECTION --}}
    <section class="py-16 bg-gradient-to-br from-blue-900 via-gray-900 to-gray-800 text-white rounded-b-3xl shadow-xl border-b-4 border-blue-700">
        <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-10">
            {{-- Text --}}
            <div class="flex-1 space-y-6">
                <span class="inline-block px-4 py-1 bg-blue-700 rounded-full text-xs uppercase tracking-widest">Welcome</span>
                <h1 class="text-4xl md:text-5xl font-extrabold">
                    Hello, <span class="bg-gradient-to-r from-yellow-400 via-blue-400 to-blue-700 bg-clip-text text-transparent">
                        {{ Auth::user()->name ?? 'User' }}
                    </span>!
                </h1>
                <p class="text-lg text-gray-300 max-w-xl">
                    Manage your account, track stats, and start your crypto gaming adventure!
                </p>

                <div class="flex flex-wrap gap-4">
                    <x-button-link href="/play-loto" class="from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500">Play Game</x-button-link>
                    <x-button-link href="/stats" class="from-green-600 to-green-400 hover:from-green-700 hover:to-green-500">View Stats</x-button-link>
                    <x-button-link href="/leaderboard" class="from-yellow-500 to-yellow-300 text-gray-900 hover:from-yellow-600 hover:to-yellow-400">Leaderboard</x-button-link>
                </div>

                <div class="flex flex-col md:flex-row gap-6 pt-4">
                    <x-dashboard-card label="Email" :value="Auth::user()->email ?? 'N/A'" />
                    <x-dashboard-card label="Member Since" :value="Auth::user()->created_at ? Auth::user()->created_at->format('F Y') : 'N/A'" />
                </div>
            </div>

            {{-- Bitcoin Bubble --}}
            <div class="flex-1 flex justify-center items-center">
                <div class="relative w-64 h-64 rounded-3xl bg-gradient-to-tr from-blue-700 via-blue-400 to-yellow-400 shadow-2xl border-4 border-blue-800 flex items-center justify-center text-7xl">
                    ₿
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center animate-bounce text-yellow-300 text-3xl opacity-70">₿</div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK ACTIONS --}}
    <section class="py-16 bg-gray-100 dark:bg-gray-900 border-t-4 border-blue-700">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Quick Actions</h2>
                <p class="text-gray-500 dark:text-gray-300">Access your core features instantly</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => '🎮', 'title' => 'Play Loto', 'desc' => 'Try your luck now!', 'url' => '/play-loto', 'color' => 'blue'],
                    ['icon' => '📊', 'title' => 'Your Stats', 'desc' => 'Track performance over time.', 'url' => '/stats', 'color' => 'green'],
                    ['icon' => '🏆', 'title' => 'Leaderboard', 'desc' => 'Rank among top players.', 'url' => '/leaderboard', 'color' => 'yellow']
                ] as $action)
                <div class="bg-white dark:bg-gray-800 border dark:border-{{ $action['color'] }}-900 border-{{ $action['color'] }}-200 rounded-2xl p-8 shadow hover:shadow-2xl text-center transition">
                    <div class="text-4xl mb-4 text-{{ $action['color'] }}-600">{{ $action['icon'] }}</div>
                    <h3 class="text-xl font-semibold mb-2">{{ $action['title'] }}</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">{{ $action['desc'] }}</p>
                    <a href="{{ $action['url'] }}" class="inline-block px-5 py-2 rounded-md font-bold bg-gradient-to-r from-{{ $action['color'] }}-600 to-{{ $action['color'] }}-400 text-white hover:from-{{ $action['color'] }}-700 hover:to-{{ $action['color'] }}-500 transition">Go</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-gradient-to-r from-blue-700 via-blue-500 to-yellow-400 rounded-t-3xl shadow-xl border-t-4 border-blue-700">
        <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-10 text-white">
            <div class="flex-1 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Ready to Play and Win?</h2>
                <p class="text-lg">Start your next game or explore your performance insights. Let’s go!</p>
                <div class="flex gap-4">
                    <x-button-link href="/play-loto" class="from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500">Play Now</x-button-link>
                    <x-button-link href="/stats" class="from-green-600 to-green-400 hover:from-green-700 hover:to-green-500">View Stats</x-button-link>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <img src="https://hustlebtc.com/img/hustle8.png" alt="Dashboard Visual" class="w-64 h-64 object-contain rounded-2xl shadow-2xl border-4 border-blue-800" />
            </div>
        </div>
    </section>

    @endsection
</x-app-layout>
