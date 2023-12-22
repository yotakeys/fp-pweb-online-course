<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('statuses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $json = file_get_contents(database_path('seeders/json/status.json'));
        $statuss = json_decode($json, true);

        $payload = [];
        foreach ($statuss as $status) {
            $payload[] = [
                'id' => $status['id'],
                'name' => $status['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('statuses')->insert($payload);
    }
}
