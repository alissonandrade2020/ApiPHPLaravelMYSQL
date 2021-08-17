<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use \Carbon\Carbon;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        $max_value = (env('MAX_CLIENTS') ? env('MAX_CLIENTS') : 100);

        foreach (range(1, $max_value) as $value) {
            $cpf = preg_replace('/[^0-9]/', '', $faker->unique()->cpf);

            $user = [
                'name' => $faker->name,
                'cpf' => $cpf,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            DB::table('clients')->insert($user);
        }
    }
}
