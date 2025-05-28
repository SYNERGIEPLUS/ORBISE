<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\GestCommande;
use App\Models\Carte;

use Livewire\Component;

class Valider extends Component
{
    public $cmd, $id_comm;

    public function mount()
    {
        // Récupérer uniquement les commandes avec Etat = 0
        $this->cmd = GestCommande::where('Etat', '1')->get();
    }

    public function showModalAnuller($id)
    {

        $this->commd = $id; // Stocker l'ID de la commande à annuler

        $commande = GestCommande::find($id);

          Carte::create([
                'id_comm' => $this->commd,
            ]);

        if ($commande) {
            $commande->Etat = '0';
            $commande->save();

            session()->flash('success', 'Commande annulée avec succès.');
        } else {
            session()->flash('error', 'Commande introuvable.');
        }

        // Rafraîchir la liste des commandes
        $this->cmd = GestCommande::where('Etat', '1')->get();
        
    }

    public function render()
    {
        return view('livewire.valider');
    }
}
