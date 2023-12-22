<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $json = file_get_contents(database_path('seeders/json/user.json'));
        $users = json_decode($json, true);

        $payload = [];
        foreach ($users as $user) {
            $payload[] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'role_id' => $user['role_id'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }
        DB::table('users')->insert($payload);

        User::factory()
            ->count(10)
            ->create();
    }
}
