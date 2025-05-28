<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Carte;
// Importer le modèle Carte pour interagir avec la base de données
use App\Models\Client;

class Clients extends Component
{

    public $cmd = [];
    public $isModalOpenClient = false;
    public $showConfirmationModalClient = false;
    public $showDetailClient = false;

    public $selectedClientId = null;
    public $selectedCmd = null;

    protected $rules = [
        'NomPrenom' => 'required|string|max:255',
        'Pays' => 'nullable|string|max:100',
        'Ville' => 'nullable|string|max:100',
        'Mail' => 'nullable|email|max:255',
        'Telephone' => 'nullable|string|max:20',
        'Sexe' => 'nullable|string|max:10',
    ];

    // Champs formulaire
    public $NomPrenom, $Pays, $Ville, $Mail, $Telephone, $Sexe;

    public function showModal()
    {
        $this->resetInputFields();
        $this->isModalOpenClient = true;
    }

    public function closeModalClient()
    {
        $this->isModalOpenClient = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->NomPrenom = '';
        $this->Pays = '';
        $this->Ville = '';
        $this->Mail = '';
        $this->Telephone = '';
        $this->Sexe = '';
        $this->selectedClientId = null;
    }

    public function store()
    {
        $this->validate();

        if ($this->selectedClientId) {
            // Update
            $client = Client::find($this->selectedClientId);
            $client->update([
                'NomPrenom' => $this->NomPrenom,
                'Pays' => $this->Pays,
                'Ville' => $this->Ville,
                'Mail' => $this->Mail,
                'Telephone' => $this->Telephone,
                'Sexe' => $this->Sexe,
            ]);
        } else {
            // Create
            Client::create([
                'NomPrenom' => $this->NomPrenom,
                'Pays' => $this->Pays,
                'Ville' => $this->Ville,
                'Mail' => $this->Mail,
                'Telephone' => $this->Telephone,
                'Sexe' => $this->Sexe,
            ]);
        }

        $this->closeModal();
        session()->flash('message', 'Client enregistré avec succès.');
    }

    public function confirmDelete($id)
    {
        $this->selectedClientId = $id;
        $this->showConfirmationModalClient = true;
    }

    public function delete()
    {
        if ($this->selectedClientId) {
            Client::find($this->selectedClientId)->delete();
            $this->showConfirmationModalClient = false;
            session()->flash('message', 'Client supprimé avec succès.');
            $this->selectedClientId = null;
        }
    }

    public function details($id)
    {
        $this->selectedCmd = Client::find($id);
        $this->showDetailClient = true;
    }

    public function closeDetail()
    {
        $this->showDetailClient = false;
        $this->selectedCmd = null;
    }


    public function render()
    {
        $this->cmd = Client::orderBy('created_at', 'desc')->get();
        return view('livewire.clients');
    }
}
