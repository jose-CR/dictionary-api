@extends('layouts.app-main')

@section('content')

<h1 class="text-3xl font-bold text-white mb-4 pt-4 text-center">Dictionary</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
    <!-- Tarjeta primera columna -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <livewire:components.ui.card />
    </div>

    <!-- Tarjeta segunda columna -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <livewire:components.ui.card />
    </div>
</div>

@endsection
