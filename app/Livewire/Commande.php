<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\GestCommande;

use Livewire\Component;

class Commande extends Component
{
    public $cmd ;

    public array $Caracteristique = [];

    public $showConfirmationModal = false;
    public $showDetail = false;

    public $ID_Carte, $DateCommande, $selectedCmd, $NatureCarte, $ServiceCommande, $DateLivraison, $TypeCartes, $PaysCommande, $VilleCommande, $Etat, $Mail, $Telephone, $Quantite, $user_id;
    public $CmdIdToDelete;

    public $isModalOpen = false;

    public function mount()
        {
            // Récupérer lors de l'initialisation du composant
            $this->cmd = GestCommande::all();
        }

    public function showModal()
    {
        $this->resetFields();
        $this->isModalOpen = true;
    }

    public function details($id)
    {
        $this->selectedCmd = GestCommande::where('id', $id)->first();

        if (!$this->selectedCmd) {
            $this->dispatchBrowserEvent('alert', ['message' => 'Commande introuvable !']);
            return;
        }
        $this->showDetail = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->DateCommande = '';
        $this->DateLivraison = '';
        $this->TypeCartes = '';
        $this->Caracteristique = [];
        $this->NatureCarte = '';
        $this->ServiceCommande = '';
        $this->PaysCommande = '';
        $this->VilleCommande = '';
        $this->Etat = '';
        $this->Mail = '';
        $this->Telephone = '';
        $this->Quantite = '';
    }

    public function store()
    {
        $this->validate([
            'DateCommande' => 'required|date',
            'NatureCarte' => 'required|string',
            'ServiceCommande' => 'required|string',
            'Caracteristique' => 'required|array|min:1',
            'DateLivraison' => 'required|date',
            'TypeCartes' => 'required|string',
            'PaysCommande' => 'required|string',
            'VilleCommande' => 'required|string',
            'Etat' => 'required|string',
            'Mail' => 'required|email',
            'Telephone' => 'required|string',
            'Quantite' => 'required|integer',
        ]);

        GestCommande::create([
            'DateCommande' => $this->DateCommande,
            'NatureCarte' => $this->NatureCarte,
            'Caracteristique' => json_encode($this->Caracteristique),
            'ServiceCommande' => $this->ServiceCommande,
            'DateLivraison' => $this->DateLivraison,
            'TypeCartes' => $this->TypeCartes,
            'PaysCommande' => $this->PaysCommande,
            'VilleCommande' => $this->VilleCommande,
            'Etat' => $this->Etat,
            'Mail' => $this->Mail,
            'Telephone' => $this->Telephone,
            'Quantite' => $this->Quantite,
            'user' => Auth::id(),
        ]);

        $this->cmd = GestCommande::all();
        $this->isModalOpen = false;
        session()->flash('message', 'Carte ajoutée avec succès.');
    }

    public function confirmDelete($id)
    {
        $this->showConfirmationModal = true;
        $this->CmdIdToDelete = $id; // On stocke l'ID de la maison à supprimer
    }

    public function delete()
    {
            // Fermer le modal après la suppression
            $this->showConfirmationModal = false;

            if ($this->CmdIdToDelete) {
            // Supprimer la maison en utilisant l'ID
            GestCommande::find($this->CmdIdToDelete)->delete();
            $this->cmd = GestCommande::all();
        }
        session()->flash('success', 'Maison supprimée avec succès.');
    }

    public function render()
    {
        $cmd = GestCommande::with('user')->latest()->get();
        $utilisateurs = User::all();
        return view('livewire.commande', compact('cmd', 'utilisateurs'));
    }
}
