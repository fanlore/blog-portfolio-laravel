<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PortfolioCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_categories')->insert([
            [
                'name' => 'Веб-дизайн',
                'slug' => Str::slug('Веб-дизайн','-'),
            ],
            [
                'name' => 'Веб-разработка',
                'slug' => Str::slug('Веб-разработка','-'),
            ],

        ]);
    }
}
