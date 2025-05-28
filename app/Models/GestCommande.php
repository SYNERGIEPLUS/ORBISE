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
        'NatureCarte',
        'ServiceCommande',
        'DateLivraison',
        'TypeCartes',
        'Caracteristique',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user'); // 'user' est le nom de la colonne dans ta table
    }

    protected $casts = [
        'Caracteristique' => 'array',
    ];


}
