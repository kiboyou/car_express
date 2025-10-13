<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;
    protected $primaryKey = 'codeclient';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codeclient',
        'lastname',
        'firstname',
        'email',
        'phone',
        'addresse',
        'numeroPermis',
        'password',
        'statut'
    ];

    protected $hidden = [
        'password'
    ];
    //generate code client
    public static function generateCodeClient()
    {
        do {
            $randomdigits = str_pad(rand(0,9999), 4, '0', STR_PAD_LEFT);
            $code = 'ABKM-' . $randomdigits;
            $exists = Customer::where('codeclient', $code)->exists();
        } while ($exists);

        return $code;
    }
}
