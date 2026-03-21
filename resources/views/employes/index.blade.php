@extends('layouts.dashboard')

@section('content')
<div class="bg-green-100 border border-green-300 rounded-lg overflow-hidden">
    <h2 class="bg-green-300 p-4 text-center font-bold text-xl uppercase">Liste des employés</h2>
    <table class="w-full text-left">
        <thead class="border-b bg-green-200">
            <tr>
                <th class="p-4">Nom</th> <th class="p-4">Prénom</th> <th class="p-4 text-center">Email</th> <th class="p-4 text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $e)
            <tr class="border-b hover:bg-green-50">
                <td class="p-4">{{ $e->nom }}</td>
                <td class="p-4">{{ $e->prenom }}</td>
                <td class="p-4 text-center text-gray-700">{{ $e->email }}</td>
                <td class="p-4 text-right">
                    <a href="{{ route('employes.show', $e->id) }}" class="bg-green-300 text-black px-4 py-2 rounded shadow">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection