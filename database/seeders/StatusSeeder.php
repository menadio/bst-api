<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'active', 'description' => 'active status'],
            ['name' => 'dead', 'description' => 'dead status'],
            ['name' => 'unknown', 'description' => 'unknown status']
        ];

        foreach ($statuses as $status) {
            Status::updateOrCreate([ 
                'name' => $status['name']
            ],[
                'description' => $status['description'],
            ]);
        }
    }
}
