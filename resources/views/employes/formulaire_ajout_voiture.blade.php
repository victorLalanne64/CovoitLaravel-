@extends('layouts.dashboard')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Ajouter une voiture pour {{ $employe->prenom }} {{ $employe->nom }}</h2>
    <form method="POST" action="{{ route('employes.ajouter_voiture', $employe->id) }}">
        @csrf
        <div class="mb-4">
            <label for="modele" class="block font-semibold mb-1">Modèle</label>
            <input type="text" name="modele" id="modele" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="nb_places" class="block font-semibold mb-1">Nombre de places</label>
            <input type="number" name="nb_places" id="nb_places" class="w-full border rounded px-3 py-2" min="1" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter la voiture</button>
    </form>
</div>
@endsection
