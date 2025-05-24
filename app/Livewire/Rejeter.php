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

    public function mount()
    {
        // Récupérer uniquement les commandes avec Etat = 0
        $this->cmd = GestCommande::where('Etat', '2')->get();
    }

    public function render()
    {
        return view('livewire.rejeter');
    }
}
