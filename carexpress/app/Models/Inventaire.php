<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'numinventaire',
        'debutinventaire',
        'fininventaire',
        'nbrevehicule',
        'idpersonnel'
    ];
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'idpersonnel');
    }

    public static function generateUniqueInventaireNumber()
    {
        $year = date('Y');
        do {
            $number = 'INRES-' . $year . '-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        } while (Inventaire::where('numinventaire', $number)->exists());

        return $number;
    }
}
