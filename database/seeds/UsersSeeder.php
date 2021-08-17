<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;
Use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1,10) as $value) {
            $role = $value <= 5 ? 'Cooker' : 'Waiter';

            if ($value === 1)
                $role = 'Administrator';

            $user = User::create([
                'name' => $faker->name,
                'email' => strtolower( ($value === 1 ? $role : $role . $value) . '@myapp.com'),
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $user->assignRole($role);
        }
    }
}
