@extends('layouts.dashboard')

@section('content')
<div class="bg-green-100 border border-green-300 rounded-lg overflow-hidden">
    <h2 class="bg-green-300 p-4 text-center font-bold text-xl uppercase">Liste des voitures</h2>
    <table class="w-full text-left">
        <thead class="border-b bg-green-200">
            <tr>
                <th class="p-4">Modèle</th>
                <th class="p-4">Nb places</th>
                <th class="p-4 text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $v)
            <tr class="border-b hover:bg-green-50">
                <td class="p-4">{{ $v->modele }}</td>
                <td class="p-4">{{ $v->nb_places }}</td>
                <td class="p-4 text-right">
                    <a href="{{ route('voitures.show', $v->id) }}" class="bg-green-300 text-black px-4 py-2 rounded shadow">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
