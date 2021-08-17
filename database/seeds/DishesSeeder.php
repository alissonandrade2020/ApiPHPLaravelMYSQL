<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use FakerRestaurant\Provider\pt_BR\Restaurant as Restaurant;
use Illuminate\Support\Facades\DB;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new Restaurant($faker));

        foreach (range(1,50) as $value) {
            DB::table('dishes')->insert([
                'name' => $faker->foodName(),
                'price' => $faker->randomDigit + 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
