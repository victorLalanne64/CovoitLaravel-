<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email'];

    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_employe');
    }

    public function trajetsPassager()
    {
        return $this->belongsToMany(Trajet::class, 'employe_trajet')->withPivot('date_inscription');
    }
}