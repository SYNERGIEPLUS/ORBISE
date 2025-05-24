<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class LogoutButton extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.logout-button');
    }
}
