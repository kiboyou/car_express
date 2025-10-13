<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $primaryKey = 'matricule';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'matricule',
        'prixLocation',
        'anneeFabrication',
        'versionVehicule',
        'carburant',
        'disponibilite',
        'imageVehicule',
        'modele_id',
        'categorie_id',
        'transmission_id'
    ];
    public function modele()
    {
        return $this->belongsTo(Modele::class, 'modele_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }

    //display all name
    public function getVehiculeName(){
        return $this->modele->marque->name . ' ' . $this->modele->name . ' ' . $this->versionVehicule . ' ' . $this->anneeFabrication;
    }
}
