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
            
            if ($nbVoitures > 0) {
                Voiture::factory()->count($nbVoitures)->create([
                    'employe_id' => $employe->id
                ]);
            }
        }
    }
}