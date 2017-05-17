<?php

use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       factory(App\Plant::class,10)->create();

    }
}
