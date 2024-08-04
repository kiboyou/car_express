<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'numreservation';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'numreservation',
        'debutlocation',
        'finlocation',
        'customer_id',
        'vehicule_id',
        'paiement',
        'statut_reservation'
    ] ;

    public function vehicule(){
        return $this->belongsTo(Vehicule::class,'vehicule_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function facture(){
        return $this->hasOne(Facture::class, 'reservation_id');
    }
    public static function generateNumReservation(){
        do {
            $randomdigits = str_pad(rand(0,9999), 4, '0', STR_PAD_LEFT);
            $code ='RES-' . $randomdigits;

            $exists = Reservation::where('numreservation', $code)->exists();
        } while ($exists);

        return $code;
    }
}
