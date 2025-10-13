<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Personnel extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'phone',
        'username',
        'password',
        'role',
        'statut',
        'firstlogin',
    ];

    protected $hidden = [
        'password'
    ];

    //generer un password
    public static function generatePersonnelPassword(){
        return Str::random(8);
    }
    //generate personnel username
    public static function generatePersonnelUsername($lastname, $firstname){
        $baseUsername = strtolower($lastname . '.' . explode(' ', $firstname)[0]);
        $username = $baseUsername . '001';
        $counter = 1;

        while(Personnel::where('username', $username)->first()){
            $counter ++;
            $username = $baseUsername . str_pad($counter, 3, '0', STR_PAD_LEFT);
        }

        return $username;
    }
}
