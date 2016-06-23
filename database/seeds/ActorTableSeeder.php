<?php

use Illuminate\Database\Seeder;

class ActorTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        factory('App\Actor', 200)->create();
    }
}
