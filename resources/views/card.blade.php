@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <div class="mt-6">
        @livewire('carte') {{-- Exemple de composant Livewire --}}
    </div>
@endsection
