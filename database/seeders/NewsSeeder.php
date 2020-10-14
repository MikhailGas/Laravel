<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(){
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] =[
                'title' => $faker->realText(rand(20, 50)),
                'text' => $faker->realText(rand(200, 500)),
                'isPrivate' => $faker->boolean(),
                'category_id' => $faker->numberBetween(1, 3),
            ];
        }
        return $data;

    }
}