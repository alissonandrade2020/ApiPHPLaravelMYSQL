<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(BoardsSeeder::class);
        $this->call(DishesSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(OrdersSeeder::class);
    }
}
