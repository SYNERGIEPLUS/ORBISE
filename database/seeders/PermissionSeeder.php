<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            ['name' => 'commande', 'label' => 'Voir les commandes'],
            ['name' => 'utilisateur', 'label' => 'Voir les utilisateurs'],
            ['name' => 'amendement', 'label' => 'Gérer les amendements'],
            ['name' => 'cmd_valide', 'label' => 'Voir commandes validées'],
            ['name' => 'cmd_rejete', 'label' => 'Voir commandes rejetées'],
            ['name' => 'cmd_livrer', 'label' => 'Voir commandes livrées'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate($perm);
        }
    }
}
