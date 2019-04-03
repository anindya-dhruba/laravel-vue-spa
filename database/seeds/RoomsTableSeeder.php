<?php

use Illuminate\Database\Seeder;
use \App\Room;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'title'      =>  'room 1'
        ]);
    }
}
