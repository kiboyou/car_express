<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Received extends Model
{
    use HasFactory;

    protected $primaryKey = 'numreceived';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'numreceived',
        'facture_id',
        'montant_verse',
        'restant'
    ];

    public function facture(){
        return $this->belongsTo(Facture::class, 'facture_id');
    }
    //generate num received
    public static function generateNumReceived(){
        do {
            $randomdigits = str_pad(rand(0,9999), 4, '0', STR_PAD_LEFT);
            $code ='BILL-' . $randomdigits;

            $exists = Received::where('numreceived', $code)->exists();
        } while ($exists);

        return $code;
    }
}
