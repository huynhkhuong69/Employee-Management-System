<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Anime',
                'description' => 'Artworks related to anime',
                'slug' => 'anime',
                'type' => 'artwork',
                'image_url' => 'images/categories/anime.svg',
            ],
            [
                'name' => 'Animals',
                'description' => 'Artworks related to animals',
                'slug' => 'animals',
                'type' => 'artwork',
                'image_url' => 'images/categories/animals.svg',
            ],
            [
                'name' => 'Cars',
                'description' => 'Artworks related to cars',
                'slug' => 'cars',
                'type' => 'artwork',
                'image_url' => 'images/categories/cars.svg',
            ],
            [
                'name' => 'Cartoons',
                'description' => 'Artworks related to cartoons',
                'slug' => 'cartoons',
                'type' => 'artwork',
                'image_url' => 'images/categories/cartoons.svg',
            ],
            [
                'name' => 'City',
                'description' => 'Artworks related to city',
                'slug' => 'city',
                'type' => 'artwork',
                'image_url' => 'images/categories/city.svg',
            ], [
                'name' => 'Fantasy',
                'description' => 'Artworks related to fantasy',
                'slug' => 'fantasy',
                'type' => 'artwork',
                'image_url' => 'images/categories/fantasy.svg',
            ], [
                'name' => 'Food',
                'description' => 'Artworks related to food',
                'slug' => 'food',
                'type' => 'artwork',
                'image_url' => 'images/categories/food.svg',
            ],
            [
                'name' => 'Nature',
                'description' => 'Artworks related to nature',
                'slug' => 'nature',
                'type' => 'artwork',
                'image_url' => 'images/categories/nature.svg',
            ],
            [
                'name' => 'People',
                'description' => 'Artworks related to people',
                'slug' => 'people',
                'type' => 'artwork',
                'image_url' => 'images/categories/people.svg',
            ],
            [
                'name' => 'Landscapes',
                'description' => 'Artworks related to landscapes',
                'slug' => 'landscapes',
                'type' => 'artwork',
                'image_url' => 'images/categories/landscapes.svg',
            ],
            [
                'name' => 'Other',
                'description' => 'Artworks related to other',
                'slug' => 'other',
                'type' => 'artwork',
                'image_url' => 'images/categories/other.svg',
            ],
        ];
        Category::insert($categories);
    }
}
