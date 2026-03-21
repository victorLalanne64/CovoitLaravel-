<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employe;
use App\Models\Voiture;

class EmployeSeeder extends Seeder
{
    public function run(): void
    {
        $employes = Employe::factory()->count(10)->create();

        foreach ($employes as $employe) {
            $nbVoitures = rand(0, 2);
            for ($i = 0; $i < $nbVoitures; $i++) {
                $voiture = Voiture::factory()->create();
                $voiture->proprietaires()->attach($employe->id);
            }
        }
    }
}