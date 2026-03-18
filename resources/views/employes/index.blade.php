@extends('layouts.dashboard')

@section('content')
    <h3 style="text-align: center;">Liste des employés</h3>
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="border-bottom: 1px solid #ddd;">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px 0;">{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>
                        <a href="{{ route('employes.show', $employe->id) }}" style="background-color: #20b2aa; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection