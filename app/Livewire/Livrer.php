<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GestCommande;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Livrer extends Component
{
     public $cmd;

    public function showModalAnuller($id)
    {
        $commande = GestCommande::find($id);

        if ($commande) {
            $commande->Etat = '0';
            $commande->save();

            session()->flash('success', 'Commande annulée avec succès.');
        } else {
            session()->flash('error', 'Commande introuvable.');
        }

        $this->cmd = GestCommande::where('Etat', '3')->get();
    }

    public function mount()
    {
        //Récupérer uniquement les commandes Etat = 0
        $this->cmd = GestCommande::where('Etat', '3')->get();
    }

    public function render()
    {
        return view('livewire.livrer');
    }
}
