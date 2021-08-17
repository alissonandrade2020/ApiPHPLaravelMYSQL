<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array (
            array (
                'name' => 'In queue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array (
                'name' => 'In progress',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array (
                'name' => 'Finished',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array (
                'name' => 'Cancelled',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ));
    }
}
