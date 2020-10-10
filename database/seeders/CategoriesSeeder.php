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
        $faker = Factory::create('ru_RU');
        $faker_eng = Factory::create('en_EN');
        $data = [];
        for($i = 0; $i < 9; $i++){
            $data[] =[
                'name' => $faker->realText(20),
                'slug' => $faker_eng->word()
            ];
        }
        return $data;

    }
}
