<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Character;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeCharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = Character::all();
        $episodes = Episode::all();
        
        foreach ($episodes as $episode) {
            $noOfCharacters = rand(1, $characters->count());
            
            $episodeCharacters = $characters->random($noOfCharacters);

            foreach ($episodeCharacters as $episodeCharacter) {
                $episode->characters()->attach($episodeCharacter->id);
            }
            
        }
    }
}
