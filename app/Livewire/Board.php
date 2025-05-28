<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\GestCommande;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class Board extends Component
{
    public $totalCommandes;
    public $totalUtilisateurs;
    public $totalClients;
    public $totalCl;

    public function mount()
        {
            $this->totalCommandes = GestCommande::count();
            $this->totalUtilisateurs = User::count();
            $this->totalCl = Client::count();
            $this->totalClients = User::where('type', 'ADMIN')->count();
            // Récupérer les utilisateur lors de l'initialisation du composant
        }

    public function render()
    {
        return view('livewire.board');
    }
}
