<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->usersData() as $usersDatum) {
            User::create($usersDatum);
        }
    }

    /**
     * Return user data for seeding.
     *
     * @return array
     */
    private function usersData(): array
    {
        return [
            'root' => [
                'name'      =>  'Root',
                'email'     =>  'root@example.com',
                'password'  =>  bcrypt('root')
            ],
            'user_1' => [
                'name'      =>  'Ron',
                'email'     =>  'ron@example.com',
                'password'  =>  bcrypt('ron')
            ],
        ];
    }
}
