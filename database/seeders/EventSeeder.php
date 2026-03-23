<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EventData = [
            [
                'name' => 'Egg Festival',
                'season' => 'spring',
                'day' => 13,
            ],
            [
                'name' => 'Desert Festival',
                'season' => 'spring',
                'day' => 15
            ],
            [
                'name' => 'Desert Festival',
                'season' => 'spring',
                'day' => 16
            ],
            [
                'name' => 'Desert Festival',
                'season' => 'spring',
                'day' => 17
            ],
            [
                'name' => 'Flower Dance',
                'season' => 'spring',
                'day' => 24,
            ],
            [
                'name' => 'Luau',
                'season' => 'Summer',
                'day' => 11,
            ],
            [
                'name' => 'Trout Derby',
                'season' => 'Summer',
                'day' => 20,
            ],
            [
                'name' => 'Trout Derby',
                'season' => 'Summer',
                'day' => 21,
            ],
            [
                'name' => 'Dance Of The Moodlight Jellies',
                'season' => 'Summer',
                'day' => 28,
            ],
            [
                'name' => 'Stardew Valley Fair',
                'season' => 'Fall',
                'day' => 16,
            ],
            [
                'name' => 'Spirit\'s Eve',
                'season' => 'Fall',
                'day' => 27,
            ],
            [
                'name' => 'Festival Of Ice',
                'season' => 'Winter',
                'day' => 8,
            ],
            [
                'name' => 'SquidFest',
                'season' => 'Winter',
                'day' => 12
            ],
            [
                'name' => 'SquidFest',
                'season' => 'Winter',
                'day' => 13
            ],
            [
                'name' => 'Night Market',
                'season' => 'Winter',
                'day' => 15,
            ],
            [
                'name' => 'Night Market',
                'season' => 'Winter',
                'day' => 16,
            ],
            [
                'name' => 'Night Market',
                'season' => 'Winter',
                'day' => 17,
            ],
            [
                'name' => 'Feast Of The Winter Star',
                'season' => 'Winter',
                'day' => 25,
            ],

        ];
        Event::insert($EventData);
    }
}
