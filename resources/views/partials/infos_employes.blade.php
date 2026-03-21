<div class="bg-white border-2 border-gray-400 p-4 rounded-lg my-4">
    <h3 class="font-bold mb-2 uppercase text-gray-700">Informations principales de M. {{ $employe->nom }}</h3>
    <table class="w-full text-left bg-white border">
        <tr class="border-b"> <td class="p-2 font-bold">Nom</td> <td class="p-2">{{ $employe->nom }}</td> </tr>
        <tr class="border-b"> <td class="p-2 font-bold">Prénom</td> <td class="p-2">{{ $employe->prenom }}</td> </tr>
        <tr class="border-b"> <td class="p-2 font-bold">Email</td> <td class="p-2">{{ $employe->email }}</td> </tr>
        <tr> <td class="p-2 font-bold">NbVoiture</td> <td class="p-2">{{ $employe->voitures_count ?? 'NbVoiture' }}</td> </tr>
    </table>
</div>