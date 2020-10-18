<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData(){
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] =[
                'name' => $faker->firstName($gender = null),
                'email' => $faker->freeEmail(),
                'isAdmin' => false,
                'password' => Hash::make('123'),
            ];
        }
        return $data;
    }
}
