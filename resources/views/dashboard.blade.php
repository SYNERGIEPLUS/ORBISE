@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')

@php
    use App\Models\User;
    use App\Models\Client;
    use App\Models\GestCommande;

    $totalCommandes = GestCommande::count();
    $totalUtilisateurs = User::count();
    $totalCl = Client::count();
    $totalClients = User::where('type', 'CLIENT')->count(); // adapte "CLIENT" selon ta logique
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-green-500 p-4 rounded shadow">
        <h2 class="text-lg text-white font-semibold mb-2">Total Commandes</h2>
        <p class="text-2xl font-bold text-white">{{ $totalCommandes }}</p>
    </div>
    <div class="bg-yellow-500 p-4 rounded shadow">
        <h2 class="text-lg text-white font-semibold mb-2">Utilisateurs</h2>
        <p class="text-2xl font-bold text-white">{{ $totalUtilisateurs }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Clients enregistrés</h2>
        <p class="text-2xl font-bold text-black-600">{{ $totalCl }}</p>
    </div>
</div>

    <div class="relative w-full ">
        <img src="{{ asset('favicon/photo1.png') }}" alt="Illustration de maison" class="w-full h-196 object-cover rounded-lg shadow-md">
       
    </div>

@endsection
