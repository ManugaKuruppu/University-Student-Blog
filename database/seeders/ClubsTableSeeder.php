<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = [
            ['club_name' => 'FCS - Fullstack Computer Society'],
            ['club_name' => 'SAC - Student Activity Club'],
            ['club_name' => 'Resolvers Club'],
            ['club_name' => 'Rotract Apiit'],
            // Add more clubs if needed
        ];

        foreach ($clubs as $club) {
            Club::create($club);
        }
    }
}
