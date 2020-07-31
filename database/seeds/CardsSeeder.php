<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = [];

        $faker = Faker::create();
        for($i = 0; $i < 9; $i++){
            $data[] = [
                "image" => 'https://source.unsplash.com/random',
                "title" => $faker->word,
                "subtitle" => $faker->word,
                "description" => $faker->sentence(2),
            ];
        }

        \DB::table('cards')->insert($data);
    }
}
