<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['modele', 'nb_places', 'employe_id'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }
}