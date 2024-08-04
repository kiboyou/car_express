<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $primaryKey = 'numfacture';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'numfacture',
        'nombre_jour',
        'montant',
        'taxes',
        'montant_total',
        'reservation_id'
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
    public static function generateNumFacture(){
        do {
            $randomdigits = str_pad(rand(0,9999), 4, '0', STR_PAD_LEFT);
            $code ='INV-' . $randomdigits;

            $exists = Facture::where('numfacture', $code)->exists();
        } while ($exists);

        return $code;
    }
}
