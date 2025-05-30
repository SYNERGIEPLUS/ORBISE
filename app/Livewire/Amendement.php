<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\GestCommande;
use App\Models\Carte;

use Livewire\Component;

class Amendement extends Component
{
    public $cmd, $commandeId ;

    public $showModalValidation = false;
    public $showModalRejetection = false;

    public function mount()
    {
        // Récupérer uniquement les commandes avec Etat = 0 -
        $this->cmd = GestCommande::where('Etat', '0')->get();
    }

    public function closeNotification()
    {
        session()->forget('message'); // Supprime le message de session
        session()->forget('error'); // Supprime l'erreur de session
    }
    public function showModalValider($id)
    {
        $this->showModalValidation = true;
        $this->commandeId = $id; // Stocker l'ID de la commande à valider
    }

    public function showModalRejeter($id)
    {
        $this->showModalRejetection = true; 
        $this->commandeId = $id; // Stocker l'ID de la commande à rejeter
    }

    public function closeModalRejeter()
    {
        $this->showModalRejetection = false;
    }

    public function rejeter()
    {
        $commande = GestCommande::find($this->commandeId);

        if ($commande) {
            $commande->Etat = '2';
            $commande->save();

            session()->flash('success', 'Commande rejetée avec succès.');
        } else {
            session()->flash('error', 'Commande introuvable.');
        }

        $this->showModalRejetection = false;
        $this->cmd = GestCommande::where('Etat', '0')->get();
    }

    public function closeModalValider()
    {
        $this->showModalValidation = false;
    }

    public function valider()
    {
        $commande = GestCommande::find($this->commandeId);

          Carte::create([
                'id_comm' => $this->commandeId,
            ]);
            session()->flash('success', 'Une carte a été générée.');

        if ($commande) {
            $commande->Etat = '1';
            $commande->save();

            session()->flash('success', 'Commande validée avec succès.');
        } else {
            session()->flash('error', 'Commande introuvable.');
        }

        $this->showModalValidation = false;
        $this->cmd = GestCommande::where('Etat', '0')->get();
    }


    public function render()
    {
        return view('livewire.amendement');
    }
}
