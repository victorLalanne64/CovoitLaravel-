@extends('layouts.dashboard')

@section('content')
<div class="bg-green-100 border border-green-300 rounded-lg p-4">
    <h2 class="font-bold text-lg mb-2">Voiture</h2>
    <div class="grid grid-cols-2 gap-4 mb-8">
        @include('partials.keys_values', ['key' => 'Modèle', 'value' => $voiture->modele])
        @include('partials.keys_values', ['key' => 'Nb Place', 'value' => $voiture->nb_places])
    </div>
    <h2 class="font-bold text-lg mb-2">Propriétaires</h2>
    @foreach($voiture->proprietaires as $proprio)
        @include('partials.infos_employes', ['employe' => $proprio])
    @endforeach
</div>
@endsection