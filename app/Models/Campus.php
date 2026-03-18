<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['description', 'adresse', 'type'];

    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'campus_employe');
    }

    public function trajetsDepart()
    {
        return $this->hasMany(Trajet::class, 'campus_depart_id');
    }

    public function trajetsArrivee()
    {
        return $this->hasMany(Trajet::class, 'campus_arrivee_id');
    }
}