<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\GestCommande;

use Livewire\Component;

class Rejeter extends Component
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

        $this->cmd = GestCommande::where('Etat', '2')->get();
    }

    public function mount()
    {
        //Récupérer uniquement les commandes Etat = 0
        $this->cmd = GestCommande::where('Etat', '2')->get();
    }

    public function render()
    {
        return view('livewire.rejeter');
    }
}
