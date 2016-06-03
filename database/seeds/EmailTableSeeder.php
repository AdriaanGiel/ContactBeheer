<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            'email' => 'a3aan_G@live.nl',
            'contact_id' => '1'
        ]);
    }
}
