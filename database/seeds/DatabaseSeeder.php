<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        $faker = Faker::create();

        // $this->call(UsersTableSeeder::class);
      // factory(App\User::class,10)->create();

        //factory(App\Plant::class,10)->create();

        //  factory(App\weather::class,10)->create();
        /*foreach(range(1, 50) as $index)
        {
            DB::table('graines')->insert([
                'plant_id' =>  \App\Plant::select('id')->orderByRaw("RAND()")->first()->id,
                'user_id' => \App\User::select('id')->orderByRaw("RAND()")->first()->id,
                'position' => $faker->randomElement(array('AO','A1','A2')),
            ]);
        }*/

        foreach(range(1, 20) as $index)
        {
            DB::table('planted')->insert([
                'plant_id' =>  \App\Plant::select('id')->orderByRaw("RAND()")->first()->id,
                'user_id' => \App\User::select('id')->orderByRaw("RAND()")->first()->id,
                'X' => $faker->randomElement(array('1','2','3')),
            'Y' => $faker->randomElement(array('1','2','3','4','5','6')),

            ]);
        }

    }
}
