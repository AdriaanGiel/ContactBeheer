<?php

use Illuminate\Database\Seeder;

class ContactUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_user')->insert([
            'contact_id' => '1',
            'user_id' => '1'
        ]);
    }
}
