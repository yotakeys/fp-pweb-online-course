<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $json = file_get_contents(database_path('seeders/json/role.json'));
        $roles = json_decode($json, true);

        $payload = [];
        foreach ($roles as $role) {
            $payload[] = [
                'id' => $role['id'],
                'name' => $role['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('roles')->insert($payload);
    }
}
