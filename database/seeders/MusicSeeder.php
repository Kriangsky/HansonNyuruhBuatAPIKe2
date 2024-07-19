<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Music::create([
            'Title' => 'Pudar',
            'Image' => '-',
            'Link' => 'https://www.youtube.com/watch?v=1Ny9z6cHTZc',
            'artistId' => 1,
            'categoryId' => 1,
        ]);
    }
}
