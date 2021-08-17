<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use \Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '512M');    // Allocate memory
        DB::disableQueryLog();                          // Disable log

        $faker = Faker::create('pt_BR');

        $max_clients = (env('MAX_CLIENTS') ? env('MAX_CLIENTS') : 100);
        $max_boards = (env('MAX_BOARDS') ? env('MAX_BOARDS') : 10);
        $max_dishes = (env('MAX_DISHES') ? env('MAX_DISHES') : 50);
        $max_users = (env('MAX_USERS') ? env('MAX_USERS') : 10);

        $max_orders = (env('MAX_ORDERS') ? env('MAX_ORDERS') : 100);
        foreach (range(1, $max_orders) as $value) {

            $rangeDates = $faker->dateTimeBetween('-30 days', '+0 days');
            $startDate = Carbon::createFromTimeStamp($rangeDates->getTimestamp());
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();

            DB::table('orders')->insert([
                'board_id' => rand(1, $max_boards),
                'dish_id' => rand(1, $max_dishes),
                'client_id' => rand(1, $max_clients),
                'user_id' => rand(6, $max_users),
                'status_id' => rand(1, 4),
                'created_at' => $startDate,
                'updated_at' => $endDate
            ]);
        }
    }
}
