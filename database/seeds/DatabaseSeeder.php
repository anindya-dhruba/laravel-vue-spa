<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChatsTableSeeder::class);
        $this->call(fakeusers_table_seeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
