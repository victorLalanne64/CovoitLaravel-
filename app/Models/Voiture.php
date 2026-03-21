<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['modele', 'nb_places'];

    // Relation plusieurs propriétaires (ManyToMany)
    public function proprietaires()
    {
        return $this->belongsToMany(Employe::class, 'employe_voiture', 'voiture_id', 'employe_id');
    }


    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }
}