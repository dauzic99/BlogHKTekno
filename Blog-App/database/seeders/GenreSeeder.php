<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'genre_name' => 'News',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'genre_name' => 'LifeStyle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'genre_name' => 'Sport',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'genre_name' => 'Food',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'genre_name' => 'Film',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'genre_name' => 'Culture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
