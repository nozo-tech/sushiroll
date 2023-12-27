<?php

namespace Database\Seeders;

use App\Models\Roll;
use App\Models\RollType;
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
        Roll::factory(5)
            ->for(RollType::where('type', 'text')->get()->first())
            ->has(
                RollComment::factory(4)
                    ->has(
                        RollComment::factory(3)
                            ->hasRollComments(2)
                    )
            )
            ->create();

        Roll::factory(5)
            ->for(RollType::where('type', 'video')->get()->first())
            ->has(
                RollComment::factory(4)
                    ->has(
                        RollComment::factory(3)
                            ->hasRollComments(2)
                    )
            )
            ->create();

        Roll::factory(5)
            ->for(RollType::where('type', 'gallery')->get()->first())
            ->has(
                RollComment::factory(4)
                    ->has(
                        RollComment::factory(3)
                            ->hasRollComments(2)
                    )
            )
            ->create();
    }
}
