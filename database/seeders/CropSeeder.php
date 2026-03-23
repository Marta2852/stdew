<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crops;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $CropData = [
            [
                'name' => 'Blue Jazz',
                'season' => 'Spring',
                'growth_time' => 7,
                'image_path' => 'Blue_Jazz.png'
            ],
            [
                'name' => 'Carrot',
                'season' => 'Spring',
                'growth_time' => 3,
                'image_path' => 'Carrot.png'
            ],
            [
                'name' => 'Cauliflower',
                'season' => 'Spring',
                'growth_time' => 12,
                'image_path' => 'Cauliflower.png'
            ],
            [
                'name' => 'Coffee Bean',
                'season' => 'Spring, Summer',
                'growth_time' => 10,
                'image_path' => 'Coffee_Bean.png'
            ],
            [
                'name' => 'Garlic',
                'season' => 'Spring',
                'growth_time' => 4,
                'image_path' => 'Garlic.png'
            ],
            [
                'name' => 'Green Bean',
                'season' => 'Spring',
                'growth_time' => 10,
                'image_path' => 'Green_Bean.png'
            ],
            [
                'name' => 'Kale',
                'season' => 'Spring',
                'growth_time' => 6,
                'image_path' => 'Kale.png'
            ],
            [
                'name' => 'Parsnip',
                'season' => 'Spring',
                'growth_time' => 4,
                'image_path' => 'Parsnip.png'
            ],
            [
                'name' => 'Potato',
                'season' => 'Spring',
                'growth_time' => 6,
                'image_path' => 'Potato.png'
            ],
            [
                'name' => 'Rhubarb',
                'season' => 'Spring',
                'growth_time' => 13,
                'image_path' => 'Rhubarb.png'
            ],
            [
                'name' => 'Strawberry',
                'season' => 'Spring',
                'growth_time' => 8,
                'image_path' => 'Strawberry.png'
            ],
            [
                'name' => 'Tulip',
                'season' => 'Spring',
                'growth_time' => 6,
                'image_path' => 'Tulip.png'
            ],
            [
                'name' => 'Unmilled Rice',
                'season' => 'Spring',
                'growth_time' => 8,
                'image_path' => 'Unmilled_Rice.png'
            ],
            [
                'name' => 'Blueberry',
                'season' => 'Summer',
                'growth_time' => 13,
                'image_path' => 'Blueberry.png'
            ],
            [
                'name' => 'Corn',
                'season' => 'Summer, Fall',
                'growth_time' => 14,
                'image_path' => 'Corn.png'
            ],
            [
                'name' => 'Hops',
                'season' => 'Summer',
                'growth_time' => 11,
                'image_path' => 'Hops.png'
            ],
            [
                'name' => 'Hot Pepper',
                'season' => 'Summer',
                'growth_time' => 5,
                'image_path' => 'Hot_Pepper.png'
            ],
            [
                'name' => 'Melon',
                'season' => 'Summer',
                'growth_time' => 12,
                'image_path' => 'Melon.png'
            ],
            [
                'name' => 'Poppy',
                'season' => 'Summer',
                'growth_time' => 7,
                'image_path' => 'Poppy.png'
            ],
            [
                'name' => 'Radish',
                'season' => 'Summer',
                'growth_time' => 6,
                'image_path' => 'Radish.png'
            ],
            [
                'name' => 'Red Cabbage',
                'season' => 'Summer',
                'growth_time' => 9,
                'image_path' => 'Red_Cabbage.png'
            ],
            [
                'name' => 'Starfruit',
                'season' => 'Summer',
                'growth_time' => 13,
                'image_path' => 'Starfruit.png'
            ],
            [
                'name' => 'Summer Spangle',
                'season' => 'Summer',
                'growth_time' => 8,
                'image_path' => 'Summer_Spangle.png'
            ],
            [
                'name' => 'Summer Squash',
                'season' => 'Summer',
                'growth_time' => 6,
                'image_path' => 'Summer_Squash.png'
            ],
            [
                'name' => 'Sunflower',
                'season' => 'Summer, Fall',
                'growth_time' => 8,
                'image_path' => 'Sunflower.png'
            ],
            [
                'name' => 'Tomato',
                'season' => 'Summer',
                'growth_time' => 11,
                'image_path' => 'Tomato.png'
            ],
            [
                'name' => 'Wheat',
                'season' => 'Summer, Fall',
                'growth_time' => 4,
                'image_path' => 'Wheat.png'
            ],
            [
                'name' => 'Amaranth',
                'season' => 'Fall',
                'growth_time' => 7,
                'image_path' => 'Amaranth.png'
            ],
            [
                'name' => 'Artichoke',
                'season' => 'Fall',
                'growth_time' => 8,
                'image_path' => 'Artichoke.png  '
            ],
            [
                'name' => 'Beet',
                'season' => 'Fall',
                'growth_time' => 6,
                'image_path' => 'Beet.png'
            ],
            [
                'name' => 'Bok Choy',
                'season' => 'Fall',
                'growth_time' => 4,
                'image_path' => 'Bok_Choy.png'
            ],
            [
                'name' => 'Broccoli',
                'season' => 'Fall',
                'growth_time' => 4,
                'image_path' => 'Broccoli.png'
            ],
            [
                'name' => 'Cranberries',
                'season' => 'Fall',
                'growth_time' => 7,
                'image_path' => 'Cranberries.png'
            ],
            [
                'name' => 'Eggplant',
                'season' => 'Fall',
                'growth_time' => 5,
                'image_path' => 'Eggplant.png'
            ],
            [
                'name' => 'Fairy Rose',
                'season' => 'Fall',
                'growth_time' => 12,
                'image_path' => 'Fairy_Rose.png'
            ],
            [
                'name' => 'Grape',
                'season' => 'Fall',
                'growth_time' => 10,
                'image_path' => 'Grape.png'
            ],
            [
                'name' => 'Pumpkin',
                'season' => 'Fall',
                'growth_time' => 13,
                'image_path' => 'Pumpkin.png'
            ],
            [
                'name' => 'Yam',
                'season' => 'Fall',
                'growth_time' => 10,
                'image_path' => 'Yam.png'
            ],
            [
                'name' => 'Powdermelon',
                'season' => 'Winter',
                'growth_time' => 7,
                'image_path' => 'Powdermelon.png'
            ],
            [
                'name' => 'Ancient Fruit',
                'season' => 'Spring, Summer, Fall',
                'growth_time' => 28,
                'image_path' => 'Ancient_Fruit.png'
            ],
            [
                'name' => 'Pineapple',
                'season' => 'Summer',
                'growth_time' => 14,
                'image_path' => 'Pineapple.png'
            ],
            [
                'name' => 'Taro Root',
                'season' => 'Summer',
                'growth_time' => 10,
                'image_path' => 'Taro_Root.png'
            ],
            [
                'name' => 'Sweet Gem Berry',
                'season' => 'Fall',
                'growth_time' => 24,
                'image_path' => 'Sweet_Gem_Berry.png'
            ],



        ];

        Crops::insert($CropData);
    }
}
