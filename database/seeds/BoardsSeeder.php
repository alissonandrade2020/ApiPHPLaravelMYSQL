<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class BoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_value = (env('MAX_BOARDS') ? env('MAX_BOARDS') : 10);

        foreach (range(1, $max_value) as $value) {

            DB::table('boards')->insert([
                'number' => $value,
                'description' => 'Mesa nº ' . $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
