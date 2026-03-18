@extends('layouts.dashboard')

@section('content')
    <p>Employés / Voitures / Trajets / Campus</p>
    <h3>Voiture</h3>
    
    <table style="width: 50%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="border: 1px solid #ddd; padding: 5px; background-color: #c1e1c1;">Modèle</th>
            <th style="border: 1px solid #ddd; padding: 5px; background-color: #c1e1c1;">Nb Place</th>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 5px;">{{ $voiture->modele }}</td>
            <td style="border: 1px solid #ddd; padding: 5px;">{{ $voiture->nb_places }}</td>
        </tr>
    </table>

    <h3>Propriétaires</h3>
    <div style="border: 1px dashed #000; padding: 10px; background-color: #f0f8ff;">
        <h4>Informations principales de M. {{ $voiture->employe->nom }}</h4>
        <table style="width: 100%;">
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;"><b>Nom</b></td>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;">{{ $voiture->employe->nom }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;"><b>Prénom</b></td>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;">{{ $voiture->employe->prenom }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;"><b>Email</b></td>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;">{{ $voiture->employe->email }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;"><b>NbVoiture</b></td>
                <td style="border: 1px solid #ddd; padding: 5px; background-color: white;">{{ $nbVoitureEmploye }}</td>
            </tr>
        </table>
    </div>
@endsection