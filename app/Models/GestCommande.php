<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestCommande extends Model
{
    //
    protected $table = 'commande';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_client',
        'ID_Carte',
        'DateCommande',
        'DateLivraison',
        'TypeCarte',
        'PaysCommande',
        'VilleCommande',
        'Etat',
        'Mail',
        'Telephone',
        'Quantite',
        'user',

    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
