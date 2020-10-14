<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(){
        $data =[
            [
                'name' => 'Спорт',
                'slug' => 'sport'
            ],
            [
                'name' => 'Политика',
                'slug' => 'politics'
            ],
            [
                'name' => 'Медицина',
                'slug' => 'medics'
            ],
        ];
        
        return $data;

    }
}
