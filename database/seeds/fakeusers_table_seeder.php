<?php

use App\User;
use Illuminate\Database\Seeder;

class fakeusers_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// We create some fake users to have some dummy messages
        $users = factory(App\User::class, 3)->create();
    }
}
