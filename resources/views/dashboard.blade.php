@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')

@php
    use App\Models\User;
    use App\Models\GestCommande;

    $totalCommandes = GestCommande::count();
    $totalUtilisateurs = User::count();
    $totalClients = User::where('type', 'CLIENT')->count(); // adapte "CLIENT" selon ta logique
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Total Commandes</h2>
        <p class="text-2xl font-bold text-green-600">{{ $totalCommandes }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Utilisateurs</h2>
        <p class="text-2xl font-bold text-blue-600">{{ $totalUtilisateurs }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Clients enregistrés</h2>
        <p class="text-2xl font-bold text-black-600">{{ $totalClients }}</p>
    </div>
</div>

    <div class="relative w-full ">
        <img src="{{ asset('favicon/photo1.jpeg') }}" alt="Illustration de maison" class="w-full h-96 object-cover rounded-lg shadow-md">
        <h2 class="absolute top-1/2 left-4 transform -translate-y-1/2 font-bold text-9xl text-blue drop-shadow-md bg-white rounded px-2">
            {{-- {{ __('ETAT DES PAIEMENTS') }} --}}
            {{ __('ORBIS') }}
        </h2>
    </div>

@endsection
