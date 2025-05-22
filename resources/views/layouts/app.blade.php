<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-800 min-h-screen">

        <div class="flex">
            {{-- Sidebar --}}
            <aside class="w-64 bg-white shadow-md min-h-screen hidden md:block">
                <div class="p-4 text-xl font-bold border-b">MonDashboard</div>
                <nav class="p-4 space-y-2">
                    <a href="/dashboard" class="block px-2 py-1 hover:bg-gray-200 rounded">🏠 Dashboard</a>
                    <a href="/utilisateurs" class="block px-2 py-1 hover:bg-gray-200 rounded">👥 Utilisateurs</a>
                    <a href="/paiements" class="block px-2 py-1 hover:bg-gray-200 rounded">💰 Paiements</a>
                </nav>
            </aside>

            {{-- Content --}}
            <main class="flex-1">
                {{-- Topbar --}}
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">@yield('title', 'Dashboard')</h1>
                    <div>
                        <span class="mr-4">👤 {{ Auth::user()->name }}</span>
                        <form method="POST" action="#" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline">Déconnexion</button>
                        </form>
                    </div>
                </header>

                {{-- Main content --}}
                <div class="p-6">
                    @yield('content')
                </div>
            </main>
        </div>

        @livewireScripts
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
