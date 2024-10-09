@extends('layouts.app-main')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
    <!-- Tarjeta primera columna -->
    <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
        <livewire:components.ui.card />
    </div>

    <!-- Tarjeta segunda columna -->
    <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
        <livewire:components.ui.card />
    </div>
</div>
@endsection