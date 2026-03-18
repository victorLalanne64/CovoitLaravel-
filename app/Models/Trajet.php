<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $fillable = ['date_time_depart', 'date_time_arrivee', 'voiture_id', 'campus_depart_id', 'campus_arrivee_id'];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function campusDepart()
    {
        return $this->belongsTo(Campus::class, 'campus_depart_id');
    }

    public function campusArrivee()
    {
        return $this->belongsTo(Campus::class, 'campus_arrivee_id');
    }

    public function passagers()
    {
        return $this->belongsToMany(Employe::class, 'employe_trajet')->withPivot('date_inscription');
    }
}