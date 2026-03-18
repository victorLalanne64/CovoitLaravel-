@extends('layouts.dashboard')

@section('content')
    <p>Employé / Voitures / Trajets / Campus</p>
    <h3>Profil Employé</h3>
    
    <div style="border: 1px dashed #000; padding: 10px; margin-bottom: 20px;">
        <h4>Informations principales de M. {{ $employe->nom }}</h4>
        <table style="width: 100%;">
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px;"><b>Nom</b></td>
                <td style="border: 1px solid #ddd; padding: 5px;">{{ $employe->nom }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px;"><b>Prénom</b></td>
                <td style="border: 1px solid #ddd; padding: 5px;">{{ $employe->prenom }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px;"><b>Email</b></td>
                <td style="border: 1px solid #ddd; padding: 5px;">{{ $employe->email }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px;"><b>NbVoiture</b></td>
                <td style="border: 1px solid #ddd; padding: 5px;">{{ $nbVoitures }}</td>
            </tr>
        </table>
    </div>

    <h4>Activité</h4>
    <p><b>Statut :</b> {{ $statut }}</p>

    <form action="{{ route('employes.verifier', $employe->id) }}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <b>Voiture</b> 
        <input type="text" name="modele" placeholder="Modèle à chercher">
        <button type="submit" style="background-color: #f5deb3; border: 1px solid #ccc; padding: 5px 10px;">Verifier</button>
        @if(session('result'))
            <b>{{ session('result') }}</b>
        @endif
    </form>

    @foreach($employe->voitures as $index => $voiture)
        <p><b>Voiture {{ $index + 1 }}</b> <a href="{{ route('vehicules.show', $voiture->id) }}" style="background-color: #20b2aa; color: white; padding: 3px 8px; text-decoration: none; border-radius: 3px;">Voir</a></p>
    @endforeach
@endsection