<?php

use Illuminate\Database\Seeder;

class GrainesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      // factory(App\User::class,10)->create();

      //  factory(App\Plant::class,10)->create();

        //  factory(App\weather::class,10)->create();

        DB::table('graines')->insert(
            [
                'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                'plant_id' => Plant::select('id')->orderByRaw("RAND()")->first()->id,

            ]
        );
    }
}
