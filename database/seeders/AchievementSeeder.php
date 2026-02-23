<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;
use App\Models\User;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $achievementsData = [
            [
                'name' => 'Green Horn',
                'description' => 'Earn 15,000g',
                'image_path' => 'achievements/Greenhorn.jpg',
            ],
            [
                'name' => 'Cowpoke',
                'description' => 'Earn 50,000g',
                'image_path' => 'achievements/Cowpoke.jpg',
            ],
            [
                'name' => 'Homesteader',
                'description' => 'Earn 250,000g',
                'image_path' => 'achievements/Homesteader.jpg',
            ],
            [
                'name' => 'Millionaire',
                'description' => 'Earn 1,000,000g',
                'image_path' => 'achievements/Millionaire.jpg',
            ],
            [
                'name' => 'Legend',
                'description' => 'Earn 10,000,000g',
                'image_path' => 'achievements/Legend.jpg',
            ],
            [
                'name' => 'A Complete Collection',
                'description' => 'Complete the museum collection.',
                'image_path' => 'achievements/A_Complete_Collection.jpg',
            ],
            [
                'name' => 'A New Friend',
                'description' => 'Reach a 5-heart friend level with someone.',
                'image_path' => 'achievements/A_New_Friend.jpg',
            ],
            [
                'name' => 'Best Friends',
                'description' => 'Reach a 10-heart friend level with someone.',
                'image_path' => 'achievements/Best_Friends.jpg',
            ],
            [
                'name' => 'The Beloved Farmer',
                'description' => 'Reach a 10-heart friend level with 8 people.',
                'image_path' => 'achievements/The_Beloved_Farmer.jpg',
            ],
            [
                'name' => 'Cliques',
                'description' => 'Reach a 5-heart friend level with 4 people.',
                'image_path' => 'achievements/Cliques.jpg',
            ],
            [
                'name' => 'Networking',
                'description' => 'Reach a 5-heart friend level with 10 people.',
                'image_path' => 'achievements/Networking.jpg',
            ],
            [
                'name' => 'Popular',
                'description' => 'Reach a 5-heart friend level with 20 people.',
                'image_path' => 'achievements/Popular.jpg',
            ],
            [
                'name' => 'Cook',
                'description' => 'Cook 10 different recipes.',
                'image_path' => 'achievements/Cook.jpg',
            ],
            [
                'name' => 'Sous Chef',
                'description' => 'Cook 25 different recipes.',
                'image_path' => 'achievements/Sous_Chef.jpg',
            ],
            [
                'name' => 'Gourmet Chef',
                'description' => 'Cook every recipe.',
                'image_path' => 'achievements/Gourmet_Chef.jpg',
            ],
            [
                'name' => 'Moving Up',
                'description' => 'Upgrade your house.',
                'image_path' => 'achievements/Moving_Up.jpg',
            ],
            [
                'name' => 'Living Large',
                'description' => '	Upgrade your house to the maximum size. (2nd upgrade, not cellar)',
                'image_path' => 'achievements/Living_Large.jpg',
            ],
            [
                'name' => 'D.I.Y.',
                'description' => 'Craft 15 different items.',
                'image_path' => 'achievements/DIY.jpg',
            ],
            [
                'name' => 'Artisan',
                'description' => 'Craft 30 different items.',
                'image_path' => 'achievements/Artisan.jpg',
            ],
            [
                'name' => 'Craft Master',
                'description' => 'Craft every item.',
                'image_path' => 'achievements/Master_Craft.jpg',
            ],
            [
                'name' => 'Fisherman',
                'description' => 'Catch 10 different fish.',
                'image_path' => 'achievements/Fisherman.jpg',
            ],
            [
                'name' => 'Ol\' Mariner',
                'description' => 'Catch 24 different fish.',
                'image_path' => 'achievements/Ol_Mariner.jpg',
            ],
            [
                'name' => 'Master Angler',
                'description' => 'Catch every fish.',
                'image_path' => 'achievements/Master_Angler.jpg',
            ],
            [
                'name' => 'Mother Catch',
                'description' => 'Catch 100 fish.',
                'image_path' => 'achievements/Mother_Catch.jpg',
            ],
            [
                'name' => '	Treasure Trove',
                'description' => 'Donate 40 different items to the museum.',
                'image_path' => 'achievements/Treasure_Trove.jpg',
            ],
            [
                'name' => 'Gofer',
                'description' => 'Complete 10 \'Help Wanted\' requests.',
                'image_path' => 'achievements/Gofer.jpg',
            ],
            [
                'name' => 'A Big Help',
                'description' => 'Complete 40 \'Help Wanted\' requests.',
                'image_path' => 'achievements/A_Big_Help.jpg',
            ],
            [
                'name' => 'Polyculture',
                'description' => 'Ship 15 of each crop.',
                'image_path' => 'achievements/Polyculture.jpg',
            ],
            [
                'name' => 'Monoculture',
                'description' => 'Ship 300 of one crop.',
                'image_path' => 'achievements/Monoculture.jpg',
            ],
            [
                'name' => '	Full Shipment',
                'description' => '	Ship every item.',
                'image_path' => 'achievements/Full_Shipment.jpg',
            ],
            [
                'name' => '	Prarie King',
                'description' => 'Beat \'Journey of the Prairie King\'.',
                'image_path' => 'achievements/Prarie_King.jpg',
            ],
            [
                'name' => 'The Bottom',
                'description' => '	Reach the lowest level of the mines.',
                'image_path' => 'achievements/The_Bottom.jpg',
            ],
            [
                'name' => 'Local Legend',
                'description' => '	Restore the Pelican Town Community Center.',
                'image_path' => 'achievements/Local_Legend.jpg',
            ],
            [
                'name' => 'Joja Co. Member Of The Year',
                'description' => 'Purchase all Joja Community Development projects.',
                'image_path' => 'achievements/Joja_Co._Member_Of_The_Year.jpg',
            ],
            [
                'name' => 'Mystery Of The Stardrops',
                'description' => 'Find all 5 Stardrops.',
                'image_path' => 'achievements/Mystery_Of_The_Stardrops.jpg',
            ],
            [
                'name' => 'Full House',
                'description' => 'Get married and have two kids.',
                'image_path' => 'achievements/Full_House.jpg',
            ],
            [
                'name' => '	Singular Talent',
                'description' => 'Reach level 10 in a skill.',
                'image_path' => 'achievements/Singular_Talent.jpg',
            ],
            [
                'name' => 'Master Of The Five Ways',
                'description' => 'Reach level 10 in all skills.',
                'image_path' => 'achievements/Master_Of_The_Five_Ways.jpg',
            ],
            [
                'name' => 'Protector Of The Valley',
                'description' => 'Complete all of the Adventure Guild Monster Slayer goals.',
                'image_path' => 'achievements/Protector_Of_The_Valley.jpg',
            ],
            [
                'name' => 'Fector\'s Challenge',
                'description' => 'Beat \'Journey Of The Prairie King\' without dying.',
                'image_path' => 'achievements/Fector\'s_Challenge.jpg',
            ],
            [
                'name' => 'A Distant Shore',
                'description' => 'Reach Ginger Island.',
                'image_path' => 'achievements/A_Distant_Shore.jpg',
            ],
             [
                'name' => 'Well-Read',
                'description' => 'Read every book.',
                'image_path' => 'achievements/Well-Read.jpg',
            ],
            [
                'name' => 'Two Thumbs Up',
                'description' => 'See a movie.',
                'image_path' => 'achievements/Two_Thumbs_Up.jpg',
            ],
             [
                'name' => 'Blue Ribbon',
                'description' => 'Get 1st place in the Stardew Valley Fair competition.',
                'image_path' => 'achievements/Blue_Ribbon.jpg',
            ],
            [
                'name' => 'An Unforgettable Soup',
                'description' => 'Delight the Governor.',
                'image_path' => 'achievements/An_Unforgettable_Soup.jpg',
            ],
             [
                'name' => 'Good Neighbors',
                'description' => 'Help your forest neighbors grow their family.',
                'image_path' => 'achievements/Good_Neighbors.jpg',
            ],
            [
                'name' => 'Danger In The Deep',
                'description' => 'Reach the bottom of the \'dangerous\' mines.',
                'image_path' => 'achievements/Danger_In_The_Deep.jpg',
            ],
            [
                'name' => 'Infinite Power',
                'description' => 'Obtain the most powerful weapon.',
                'image_path' => 'achievements/Infinite_Power.jpg',
            ],
             [
                'name' => 'Perfection',
                'description' => 'Reach the summit.',
                'image_path' => 'achievements/Perfection.jpg',
            ],
            [
                'name' => 'Master Angler',
                'description' => 'Catch every fish.',
                'image_path' => 'achievements/Master_Angler.jpg',
            ]
            ];
            

        foreach ($users as $user) {
            foreach ($achievementsData as $data) {
                Achievement::firstOrCreate(
                    [
                        'user_id' => $user->id,
                        'name' => $data['name']
                    ],
                    [
                        'description' => $data['description'],
                        'image_path' => $data['image_path'],
                        'is_unlocked' => false,
                    ]
                );
            }
        }
    }
}