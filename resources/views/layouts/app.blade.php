<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('favicon/photo3.ico') }}" type="image/x-icon">
        <!-- ou pour un PNG -->
        <link rel="icon" href="{{ asset('favicon/photo3.png') }}" type="image/png">


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
            <!-- Ajoute ce CDN dans le <head> si ce n’est pas déjà fait -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

            @php
                $current = request()->route()->getName();
            @endphp

            <aside class="w-64 bg-green-500 shadow-md min-h-screen hidden md:block">
                <div class="p-4 text-2xl font-extrabold border-b text-gray-700 flex items-center space-x-2">
                        <img src="{{ asset('favicon/photo3.png') }}" alt="icone igb" class="w-16 h-26 object-cover rounded-lg shadow-md">
                    <span>ORBIS</span>
                </div>

                @php
                    $user = Auth::user();
                @endphp

                
                <nav class="p-4 space-y-2 text-base font-medium text-black">
                    <a href="{{ route('dashboard') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'dashboard' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-chart-line text-xl w-6 mr-3"></i> Tableau de bord
                    </a>
                    @if($user && $user->hasPermission('utilisateur'))
                    <a href="{{ route('users') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'users' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-users text-xl w-6 mr-3"></i> Utilisateurs
                    </a>
                    @endif
                    @if($user && $user->hasPermission('commande'))
                        <a href="{{ route('cmd') }}" 
                        class="flex items-center px-3 py-2 rounded {{ $current == 'cmd' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                            <i class="fas fa-file-invoice-dollar text-xl w-6 mr-3"></i> Commandes
                        </a>
                    @endif
                    @if($user && $user->hasPermission('amendement'))
                    <a href="{{ route('amender') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'amender' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-pen-nib text-xl w-6 mr-3"></i> Amendements
                    </a>
                    @endif
                    @if($user && $user->hasPermission('cmd_valide'))
                    <a href="{{ route('validate') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'validate' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-check-circle text-xl w-6 mr-3"></i> Cmd validées
                    </a>
                    @endif
                    @if($user && $user->hasPermission('cmd_rejete'))
                    <a href="{{ route('dismiss') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'dismiss' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-times-circle text-xl w-6 mr-3"></i> Cmd rejetées
                    </a>
                    @endif
                    <a href="{{ route('card') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'card' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-map text-xl w-6 mr-3"></i> Les Cartes
                    </a>
                    <a href="{{ route('people') }}" 
                    class="flex items-center px-3 py-2 rounded {{ $current == 'people' ? 'bg-gray-200 text-indigo-700 font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-user-friends text-xl w-6 mr-3"></i> Les Clients
                    </a>
                </nav>
            </aside>

            {{-- Mobile sidebar --}}

            {{-- Content --}}
            <main class="flex-1">
                {{-- Topbar --}}
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">@yield('title', 'Dashboard')</h1>
                    <div class="inline">
                        <a href="{{ route('profile') }}" class="text-black hover:underline">
                            👤 {{ Auth::user()->name }}
                        </a>
                        @livewire('logout-button')
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
