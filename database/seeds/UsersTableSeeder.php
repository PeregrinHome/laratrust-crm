<?php

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create('ru_RU');
        foreach(range(1, 100) as $index){
            User::create([
                'f_name' => $faker->firstNameMale,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'sex' => 'male',
                'password' => $faker->password,
                'l_name' => $faker->lastName,
            ]);
        }
        foreach(range(1, 100) as $index){
            User::create([
                'f_name' => $faker->firstNameFemale,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'sex' => 'female',
                'password' => $faker->password,
                'l_name' => $faker->lastName,
            ]);
        }
    }
}
