@extends('layouts.dashboard')

@section('content')
<div class="bg-green-100 border border-green-300 rounded-lg p-4">
    @if(session('bus_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('bus_error') }}
        </div>
    @endif
    <h2 class="font-bold text-lg mb-2">Profil Employé</h2>
    @include('partials.infos_employes', ['employe' => $employe])

    <div class="mt-4">
        <h4 class="font-bold mb-2">Activité</h4>
        <p class="mb-4"><strong>Statut :</strong> Conducteur</p>

        <form action="{{ route('employes.verify', $employe->id) }}" method="POST" class="flex items-center gap-4 mb-6">
            @csrf
            <label>Voiture</label>
            <input type="text" name="modele" placeholder="Modèle à chercher" class="border p-1">
            <button type="submit" class="bg-yellow-100 border border-yellow-400 px-4 py-1">Vérifier</button>
            <span class="font-bold {{ session('result') == 'YES' ? 'text-green-600' : 'text-red-600' }}">
                {{ session('result') ?? 'YES/NO' }}
            </span>
        </form>

        <div class="flex flex-col gap-2">
            @foreach($employe->voitures as $index => $v)
                <div>
                    <span class="font-semibold">Voiture {{ $index + 1 }}</span>
                    <a href="{{ route('voitures.show', $v->id) }}" class="ml-2 bg-green-200 border border-green-400 px-2 py-1 rounded text-xs">Voir</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection