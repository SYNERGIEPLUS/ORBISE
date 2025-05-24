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
        ['name' => 'commande.view', 'label' => 'Voir les commandes'],
        ['name' => 'utilisateur.view', 'label' => 'Voir les utilisateurs'],
        ['name' => 'amendement.manage', 'label' => 'Gérer les amendements'],
        ['name' => 'cmd.valide.access', 'label' => 'Voir commandes validées'],
        ['name' => 'cmd.rejete.access', 'label' => 'Voir commandes rejetées'],
        ['name' => 'type.manage', 'label' => 'Gérer les types'],
    ];

    foreach ($permissions as $perm) {
        Permission::firstOrCreate($perm);
    }
    }
}
