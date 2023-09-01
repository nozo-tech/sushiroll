<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RollTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RollType::factory()->create([
            'type' => 'text',
            'name' => 'Text Roll'
        ]);

        \App\Models\RollType::factory()->create([
            'type' => 'video',
            'name' => 'Video Roll'
        ]);

        \App\Models\RollType::factory()->create([
            'type' => 'gallery',
            'name' => 'Image Gallery Roll'
        ]);

        \App\Models\RollType::factory()->create([
            'type' => 'live',
            'name' => 'Livestream Roll'
        ]);
    }
}
