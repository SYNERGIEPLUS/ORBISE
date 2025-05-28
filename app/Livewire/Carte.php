<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Carte as CarteModel;

class Carte extends Component
{
    public $cartes;

    public function mount()
    {
        // Récupérer uniquement les commandes avec Etat = 0 
        $this->cartes = CarteModel::all();
    }

    public function render()
    {
        return view('livewire.carte');
    }
}