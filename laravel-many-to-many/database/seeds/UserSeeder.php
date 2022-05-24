<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        User::create([
                
            'email'     => 'camilla@yahoo.com',
            'name'      => 'camilla',
            'password'  => Hash::make('camillapalombi')

        ]);


        for ($i=0; $i < 15; $i++) {
            User::create([
                
                'email'     => $faker->email(),
                'name'      => $faker->name(),
                'password'  => Hash::make('buongiornissimo')

            ]);
        }
    }
}
