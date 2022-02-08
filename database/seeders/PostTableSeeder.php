<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Привет, Js.',
                'image' => 'https://picsum.photos/id/60/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Привет, Js.','-'),
                'category_id' => '1',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Посадка на WordPress.',
                'image' => 'https://picsum.photos/id/59/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Посадка на WordPress.','-'),
                'category_id' => '2',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Блог на Laravel.',
                'image' => 'https://picsum.photos/id/58/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Блог на Laravel.','-'),
                'category_id' => '3',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Замыкания.',
                'image' => 'https://picsum.photos/id/57/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Замыкания.','-'),
                'category_id' => '1',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'SPA.',
                'image' => 'https://picsum.photos/id/56/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('SPA.','-'),
                'category_id' => '4',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Блочные элементы.',
                'image' => 'https://picsum.photos/id/55/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Блочные элементы.','-'),
                'category_id' => '5',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Строчные элементы.',
                'image' => 'https://picsum.photos/id/54/600/600',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'slug' => Str::slug('Строчные элементы.','-'),
                'category_id' => '5',
                'user_id' => '1',
                'published_at' => Carbon::now(),
            ]


        ]
        );

    }
}
