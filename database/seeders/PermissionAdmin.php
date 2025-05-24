<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // L'utilisateur 1 a les permissions : commande, utilisateur, cmd_valide
        DB::table('permission_user')->insert([
            ['user_id' => 1, 'permission_id' => 1], // commande
            ['user_id' => 1, 'permission_id' => 2], // utilisateur
            ['user_id' => 1, 'permission_id' => 3], //
            ['user_id' => 1, 'permission_id' => 4], // cmd_valide
        ]);
    }
}
