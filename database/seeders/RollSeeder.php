<?php

namespace Database\Seeders;

use App\Models\RollComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $text_roll_type = \App\Models\RollType::where('type', 'text');

        \App\Models\Roll::factory(5)
            ->for($text_roll_type)
            ->hasRollComments(5)
            ->create();
    }
}
