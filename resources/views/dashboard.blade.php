@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Total Paiements</h2>
            <p class="text-2xl font-bold text-green-600">125 000 F CFA</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Utilisateurs</h2>
            <p class="text-2xl font-bold text-blue-600">54</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Maisons publiées</h2>
            <p class="text-2xl font-bold text-yellow-600">12</p>
        </div>
    </div>

    <div class="mt-6">
        @livewire('board') {{-- Exemple de composant Livewire --}}
    </div>
@endsection
