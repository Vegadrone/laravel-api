<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.

     * @return void
     */
    public function run(Faker $faker)
    {
        $myUser = new User();
        $myUser->name = 'Gianni Piepolo';
        $myUser->email = 'piepogianni@gmail.com';
        $myUser->password = Hash::make('lallo1234!');
        $myUser->save();

        for ($i=0; $i <20 ; $i++) {
            $user = new User();
            $user->name = $faker->unique()->userName();
            $user->email = $faker->unique()->email();
            $user->password = Hash::make($faker->password());
            $user->save();
        }
    }
}
