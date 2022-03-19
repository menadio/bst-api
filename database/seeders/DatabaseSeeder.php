<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Status::factory(3)->create();
        $this->call([
            StatusSeeder::class,
        ]);
        
        \App\Models\Episode::factory(10)->create();
        \App\Models\Location::factory(5)->create();
        \App\Models\Character::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Comment::factory(15)->create();

        $this->call([
            EpisodeCharacterSeeder::class
        ]);
    }
}
