<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $primarykey = 'id';

    protected $fillable = [
        'NomPrenom',
        'DateNaisseance',
        'Pays',
        'Ville',
        'Mail',
        'Sexe',
        'Telephone',
        'user',
    ];
}
