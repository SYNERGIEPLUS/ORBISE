@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <div class="mt-6">
        @livewire('livrer') {{-- Exemple de composant Livewire --}}
    </div>
@endsection