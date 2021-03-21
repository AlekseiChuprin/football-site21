<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'УПЛ',
                'slug' => 'upl'
            ],
            [
                'title' => 'Первая Лига',
                'slug' => 'first_league'
            ]
        ]);
    }
}
