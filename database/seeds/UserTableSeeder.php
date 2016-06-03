<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@live.nl',
            'password' => bcrypt('admin1'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Tester',
            'email' => 'a3aan_G@live.nl',
            'password' => bcrypt('test1'),
            'role_id' => 2
        ]);


    }
}
