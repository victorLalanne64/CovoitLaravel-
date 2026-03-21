<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employe;
use App\Models\Campus;
use App\Models\Voiture;

class TestEmployeCampusSeeder extends Seeder
{
    public function run(): void
    {
        // Créer plusieurs campus
        $campusData = [
            [
                'description' => 'Campus Principal',
                'adresse' => '123 rue du Test',
                'type' => 'Université',
            ],
            [
                'description' => 'Campus Secondaire',
                'adresse' => '456 avenue du Test',
                'type' => 'École',
            ],
        ];
        $campuses = [];
        foreach ($campusData as $data) {
            $campuses[] = Campus::create($data);
        }

        // Créer plusieurs employés
        for ($i = 1; $i <= 5; $i++) {
            $employe = Employe::create([
                'nom' => 'Employe' . $i,
                'prenom' => 'Prenom' . $i,
                'email' => 'employe' . $i . '@example.com',
            ]);

            // Associer chaque employé à un campus (sauf le dernier pour tester le middleware)
            if ($i < 5) {
                $employe->campuses()->attach($campuses[$i % 2]->id);
            }

            // Créer une voiture pour chaque employé (sauf le 2e pour tester le middleware voiture)
            if ($i !== 2) {
                $voiture = Voiture::create([
                    'modele' => 'Modele ' . $i,
                    'nb_places' => 4 + $i,
                ]);
                $employe->voitures()->attach($voiture->id);
            }
        }
    }
}
