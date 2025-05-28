<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    //
    protected $table = 'carte';
 
    protected $primarykey = 'id';

    protected $fillable = [
        'id_comm',
    ];

    public function commande()
    {
        return $this->belongsTo(GestCommande::class, 'id_comm', 'id');
    }
}
